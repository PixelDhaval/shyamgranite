/**
 * Desktop mega navigation (disclosure pattern) and the mobile menu dialog.
 *
 * Desktop: click or keyboard toggles a panel; pointer hover opens it with
 * a short intent delay. Escape, an outside click or tabbing out closes it.
 * Panels glide in with GSAP and their link columns stagger after them.
 * Mobile: native <dialog> opened with showModal(); menu rows stagger in.
 */
import { gsap } from 'gsap';
import { prefersReducedMotion } from './motion';

const HOVER_OPEN_DELAY = 120;
const HOVER_CLOSE_DELAY = 220;

function showPanel(panel) {
    const surface = panel.firstElementChild;
    const columns = panel.querySelectorAll('[data-nav-column]');

    gsap.killTweensOf([surface, columns]);
    panel.hidden = false;

    if (prefersReducedMotion()) {
        gsap.set([surface, columns], { clearProps: 'all' });

        return;
    }

    gsap.fromTo(surface, { autoAlpha: 0, y: -10 }, { autoAlpha: 1, y: 0, duration: 0.4, ease: 'power3.out' });

    if (columns.length) {
        gsap.fromTo(columns, { autoAlpha: 0, y: 12 }, { autoAlpha: 1, y: 0, duration: 0.5, ease: 'power3.out', stagger: 0.05, delay: 0.06 });
    }
}

function hidePanel(panel, { instant = false } = {}) {
    const surface = panel.firstElementChild;

    gsap.killTweensOf([surface, panel.querySelectorAll('[data-nav-column]')]);

    if (instant || prefersReducedMotion()) {
        panel.hidden = true;

        return;
    }

    gsap.to(surface, {
        autoAlpha: 0,
        y: -6,
        duration: 0.18,
        ease: 'power2.in',
        onComplete: () => {
            panel.hidden = true;
        },
    });
}

export function initDesktopNavigation() {
    const nav = document.querySelector('[data-nav]');

    if (!nav) {
        return;
    }

    const items = [...nav.querySelectorAll('[data-nav-item]')].filter((item) => item.querySelector('[data-nav-trigger]'));
    let openItem = null;
    let hoverTimer = null;

    const triggerOf = (item) => item.querySelector('[data-nav-trigger]');
    const panelOf = (item) => item.querySelector('[data-nav-panel]');

    const close = (item, { focusTrigger = false, instant = false } = {}) => {
        if (!item) {
            return;
        }

        triggerOf(item).setAttribute('aria-expanded', 'false');
        hidePanel(panelOf(item), { instant });

        if (focusTrigger) {
            triggerOf(item).focus();
        }

        if (openItem === item) {
            openItem = null;
        }
    };

    const open = (item) => {
        if (openItem === item) {
            return;
        }

        // Switching between panels swaps instantly so they never stack.
        if (openItem) {
            close(openItem, { instant: true });
        }

        triggerOf(item).setAttribute('aria-expanded', 'true');
        showPanel(panelOf(item));
        openItem = item;
    };

    items.forEach((item) => {
        const trigger = triggerOf(item);

        trigger.addEventListener('click', () => {
            clearTimeout(hoverTimer);
            openItem === item ? close(item) : open(item);
        });

        item.addEventListener('pointerenter', (event) => {
            if (event.pointerType !== 'mouse') {
                return;
            }

            clearTimeout(hoverTimer);
            hoverTimer = setTimeout(() => open(item), openItem ? 0 : HOVER_OPEN_DELAY);
        });

        item.addEventListener('pointerleave', (event) => {
            if (event.pointerType !== 'mouse') {
                return;
            }

            clearTimeout(hoverTimer);
            hoverTimer = setTimeout(() => close(item), HOVER_CLOSE_DELAY);
        });

        item.addEventListener('focusout', (event) => {
            if (!item.contains(event.relatedTarget)) {
                close(item);
            }
        });
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && openItem) {
            close(openItem, { focusTrigger: true });
        }
    });

    document.addEventListener('click', (event) => {
        if (openItem && !openItem.contains(event.target)) {
            close(openItem);
        }
    });

    // Close any open panel if the viewport drops below the desktop breakpoint.
    window.matchMedia('(min-width: 80rem)').addEventListener('change', (query) => {
        if (!query.matches) {
            close(openItem, { instant: true });
        }
    });
}

export function initMobileMenu() {
    const dialog = document.querySelector('[data-mobile-menu]');
    const openButtons = document.querySelectorAll('[data-mobile-menu-open]');

    if (!dialog) {
        return;
    }

    const rows = dialog.querySelectorAll('[data-menu-row]');

    const setExpanded = (expanded) => {
        openButtons.forEach((button) => button.setAttribute('aria-expanded', String(expanded)));
    };

    openButtons.forEach((button) => {
        button.addEventListener('click', () => {
            dialog.showModal();
            setExpanded(true);

            if (!prefersReducedMotion()) {
                gsap.fromTo(rows, { autoAlpha: 0, x: 24 }, { autoAlpha: 1, x: 0, duration: 0.6, ease: 'power3.out', stagger: 0.045, delay: 0.1 });
            }
        });
    });

    dialog.querySelectorAll('[data-mobile-menu-close]').forEach((button) => {
        button.addEventListener('click', () => dialog.close());
    });

    // Clicking the backdrop (the dialog element itself) closes the menu.
    dialog.addEventListener('click', (event) => {
        if (event.target === dialog) {
            dialog.close();
        }
    });

    // Following an in-page link should also close the menu.
    dialog.querySelectorAll('a[href^="#"]').forEach((link) => {
        link.addEventListener('click', () => dialog.close());
    });

    dialog.addEventListener('close', () => setExpanded(false));

    window.matchMedia('(min-width: 80rem)').addEventListener('change', (query) => {
        if (query.matches && dialog.open) {
            dialog.close();
        }
    });
}

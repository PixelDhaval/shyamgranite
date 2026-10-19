/**
 * Site motion (GSAP 3 + ScrollTrigger, SplitText, ScrollToPlugin).
 *
 * Templates opt in with data attributes; no page-specific JavaScript:
 *   [data-hero]            hero scope, its intro plays when the preloader leaves
 *     [data-hero-title]    heading revealed line by line (masked)
 *     [data-hero-item]     fades up in sequence
 *     [data-hero-media]    image wipes in from the bottom, photo settles from a zoom
 *     [data-hero-accent]   small supporting image floats in last
 *   [data-split]           heading revealed line by line when scrolled into view
 *   [data-reveal]          fades up when scrolled into view (batched + staggered)
 *   [data-reveal-image]    image wrapper wipes in, photo settles from a zoom
 *   [data-parallax]        image wrapper whose photo drifts gently with scroll
 *
 * Everything runs inside gsap.matchMedia() for prefers-reduced-motion:
 * no-preference. With reduced motion nothing is hidden or animated. The
 * <head> script adds .sg-motion (which pre-hides animated elements to avoid
 * a flash) and removes it again if this module has not started within 3s.
 */
import { gsap } from 'gsap';
import { ScrollToPlugin } from 'gsap/ScrollToPlugin';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { SplitText } from 'gsap/SplitText';

gsap.registerPlugin(ScrollTrigger, ScrollToPlugin, SplitText);

const MOTION_OK = '(prefers-reduced-motion: no-preference)';
const REDUCED = '(prefers-reduced-motion: reduce)';

/** Photos inside [data-parallax] stay scaled up so the drift never shows an edge. */
const PARALLAX_SCALE = 1.12;
const PARALLAX_RANGE = 5;

export const prefersReducedMotion = () => window.matchMedia(REDUCED).matches;

export function initMotion() {
    const mm = gsap.matchMedia();

    mm.add(MOTION_OK, () => {
        // Each part is isolated: if one throws, the rest still run and content is shown.
        const playHeroIntro = safely('hero intro', buildHeroIntro) ?? (() => {});

        safely('preloader', () => playPreloader(playHeroIntro));
        safely('split headings', initSplitHeadings);
        safely('image reveals', initImageReveals);
        safely('reveals', initReveals);
        safely('parallax', initParallax);
        safely('header', initHeaderAutoHide);

        document.fonts?.ready.then(() => ScrollTrigger.refresh());
    });

    mm.add(REDUCED, () => {
        removePreloaderQuietly();
    });

    initSmoothAnchors();

    window.sgMotionReady = true;
}

/**
 * Runs one part of the motion setup. If it throws, the error is logged and
 * every animated element is shown, so a failure can never leave content hidden.
 */
function safely(name, setup) {
    try {
        return setup();
    } catch (error) {
        console.error(`[motion] ${name} failed`, error);
        revealEverything();

        return undefined;
    }
}

function revealEverything() {
    document.documentElement.classList.remove('sg-motion');
    document.querySelector('[data-preloader]')?.remove();

    gsap.set(
        '[data-hero-title], [data-hero-item], [data-hero-media], [data-hero-accent], [data-split], [data-reveal], [data-reveal-image], .split-line',
        { clearProps: 'opacity,visibility,transform,clipPath' },
    );
    gsap.set('[data-reveal-image] img, [data-hero-media] img', { clearProps: 'transform,transition' });
}

/**
 * Preloader exit: the mark lifts away and the panel slides up like a curtain,
 * handing over to the hero intro. Waits for window load, capped so slow
 * images never hold the page back.
 */
function playPreloader(onDone) {
    const preloader = document.querySelector('[data-preloader]');

    if (!preloader || document.documentElement.classList.contains('sg-skip-preloader')) {
        preloader?.remove();
        onDone();

        return;
    }

    const mark = preloader.querySelector('.preloader-mark');

    // GSAP takes over from the CSS loops and the CSS failsafe.
    preloader.style.animation = 'none';

    const leave = () => {
        if (mark) {
            mark.style.animation = 'none';
        }

        gsap.timeline({
            onComplete: () => {
                preloader.remove();
                rememberPreloaderSeen();
            },
        })
            .to(mark, { autoAlpha: 0, y: -16, scale: 0.94, duration: 0.5, ease: 'power2.in' })
            .to(preloader, { yPercent: -100, duration: 1, ease: 'expo.inOut' }, '-=0.15')
            .add(onDone, '-=0.55');
    };

    waitForLoad(2200).then(leave);
}

function removePreloaderQuietly() {
    const preloader = document.querySelector('[data-preloader]');

    if (!preloader) {
        return;
    }

    waitForLoad(2200).then(() => {
        preloader.classList.add('is-done');
        setTimeout(() => preloader.remove(), 600);
        rememberPreloaderSeen();
    });
}

function waitForLoad(maxWait) {
    return new Promise((resolve) => {
        if (document.readyState === 'complete') {
            resolve();

            return;
        }

        window.addEventListener('load', resolve, { once: true });
        setTimeout(resolve, maxWait);
    });
}

function rememberPreloaderSeen() {
    try {
        sessionStorage.setItem('sg-preloaded', '1');
    } catch (error) {
        // Storage blocked (private mode): the preloader simply shows again next visit.
    }
}

/**
 * Hero intro, built paused so it can start exactly as the preloader leaves.
 * Returns the function that plays it. The title is split at play time,
 * after web fonts load, so its lines are measured in the final typeface.
 */
function buildHeroIntro() {
    const hero = document.querySelector('[data-hero]');

    if (!hero) {
        return () => {};
    }

    const title = hero.querySelector('[data-hero-title]');
    const items = hero.querySelectorAll('[data-hero-item]');
    const media = hero.querySelector('[data-hero-media]');
    const accent = hero.querySelector('[data-hero-accent]');

    const intro = gsap.timeline({ paused: true, defaults: { ease: 'expo.out' } });

    if (media) {
        const photo = media.querySelector('img');
        const endScale = media.hasAttribute('data-parallax') ? PARALLAX_SCALE : 1;

        gsap.set(media, { autoAlpha: 1, clipPath: 'inset(100% 0% 0% 0%)' });
        gsap.set(photo, { scale: 1.3, transition: 'none' });

        intro
            .to(media, { clipPath: 'inset(0% 0% 0% 0%)', duration: 1.5, ease: 'expo.inOut' }, 0)
            .to(photo, { scale: endScale, duration: 2.2 }, 0.15);
    }

    if (items.length) {
        gsap.set(items, { autoAlpha: 0, y: 24 });
        intro.to(items, { autoAlpha: 1, y: 0, duration: 1.1, stagger: 0.09 }, 0.45);
    }

    if (accent) {
        gsap.set(accent, { autoAlpha: 0, y: 48 });
        intro.to(accent, { autoAlpha: 1, y: 0, duration: 1.4 }, 0.95);
    }

    return () => {
        const fontsReady = document.fonts?.ready ?? Promise.resolve();

        fontsReady.then(() => {
            if (title) {
                const split = SplitText.create(title, { type: 'lines', mask: 'lines', linesClass: 'split-line' });

                gsap.set(title, { autoAlpha: 1 });
                gsap.set(split.lines, { yPercent: 110 });

                intro.to(split.lines, { yPercent: 0, duration: 1.4, stagger: 0.12 }, 0.2);

                // Restore the original markup so the heading reflows naturally afterwards.
                intro.eventCallback('onComplete', () => split.revert());
            }

            intro.play();
        });
    };
}

/**
 * Section headings: masked line reveal. autoSplit re-splits on resize and
 * font load; returning the tween lets SplitText keep it in sync.
 */
function initSplitHeadings() {
    gsap.utils.toArray('[data-split]').forEach((heading) => {
        SplitText.create(heading, {
            type: 'lines',
            mask: 'lines',
            linesClass: 'split-line',
            autoSplit: true,
            onSplit(self) {
                gsap.set(heading, { autoAlpha: 1 });

                return gsap.from(self.lines, {
                    yPercent: 110,
                    duration: 1.2,
                    ease: 'expo.out',
                    stagger: 0.1,
                    scrollTrigger: { trigger: heading, start: 'top 88%' },
                });
            },
        });
    });
}

/**
 * Image wrappers wipe in from the bottom while the photo settles from a zoom.
 */
function initImageReveals() {
    gsap.utils.toArray('[data-reveal-image]').forEach((wrapper) => {
        const photo = wrapper.querySelector('img');
        const hasParallax = wrapper.hasAttribute('data-parallax');

        gsap.set(wrapper, { autoAlpha: 1, clipPath: 'inset(100% 0% 0% 0%)' });
        gsap.set(photo, { scale: 1.25, transition: 'none' });

        gsap.timeline({
            scrollTrigger: { trigger: wrapper, start: 'top 88%' },
            onComplete: () => {
                gsap.set(wrapper, { clearProps: 'clipPath' });

                // Hand the photo back to its CSS hover zoom.
                if (!hasParallax) {
                    gsap.set(photo, { clearProps: 'transform,transition' });
                }
            },
        })
            .to(wrapper, { clipPath: 'inset(0% 0% 0% 0%)', duration: 1.3, ease: 'expo.inOut' })
            .to(photo, { scale: hasParallax ? PARALLAX_SCALE : 1, duration: 1.8, ease: 'expo.out' }, 0.1);
    });
}

/**
 * Content fades up as it enters, batched so neighbours stagger together.
 */
function initReveals() {
    const items = gsap.utils.toArray('[data-reveal]');

    if (!items.length) {
        return;
    }

    gsap.set(items, { autoAlpha: 0, y: 28 });

    ScrollTrigger.batch(items, {
        start: 'top 90%',
        onEnter: (batch) => gsap.to(batch, {
            autoAlpha: 1,
            y: 0,
            duration: 1,
            ease: 'power3.out',
            stagger: 0.09,
            overwrite: true,
        }),
    });
}

/**
 * Large photos drift a few percent against the scroll for depth.
 */
function initParallax() {
    gsap.utils.toArray('[data-parallax]').forEach((wrapper) => {
        const photo = wrapper.querySelector('img');

        gsap.set(photo, { scale: PARALLAX_SCALE, transition: 'none' });

        gsap.fromTo(photo, { yPercent: -PARALLAX_RANGE }, {
            yPercent: PARALLAX_RANGE,
            ease: 'none',
            scrollTrigger: { trigger: wrapper, start: 'top bottom', end: 'bottom top', scrub: 0.6 },
        });
    });
}

/**
 * Sticky header slides away while reading down the page and returns on any
 * upward scroll, keyboard focus or open menu panel.
 */
function initHeaderAutoHide() {
    const header = document.querySelector('[data-site-header]');

    if (!header) {
        return;
    }

    const reveal = gsap.fromTo(header, { yPercent: -100 }, { yPercent: 0, duration: 0.45, ease: 'power3.out', paused: true }).progress(1);
    const panelOpen = () => header.querySelector('[data-nav-panel]:not([hidden])');

    ScrollTrigger.create({
        start: 'top top',
        end: 'max',
        onUpdate(self) {
            if (panelOpen() || self.direction === -1 || self.scroll() < 480) {
                reveal.play();
            } else {
                reveal.reverse();
            }
        },
    });

    header.addEventListener('focusin', () => reveal.play());
}

/**
 * In-page links (#visit, #top, skip link) glide with ScrollToPlugin,
 * offset for the sticky header, then move focus for keyboard users.
 */
function initSmoothAnchors() {
    document.addEventListener('click', (event) => {
        const link = event.target.closest('a[href^="#"]');
        const hash = link?.getAttribute('href');

        if (!link || hash === '#' || link.closest('[data-mobile-menu]')) {
            return;
        }

        const isTop = hash === '#top';
        const target = isTop ? document.querySelector('#main') : document.querySelector(hash);

        if (!target) {
            return;
        }

        event.preventDefault();

        const header = document.querySelector('[data-site-header]');
        const offset = isTop ? 0 : (header?.offsetHeight ?? 0) + 24;

        gsap.to(window, {
            scrollTo: { y: isTop ? 0 : target, offsetY: offset, autoKill: true },
            duration: prefersReducedMotion() ? 0 : 1.1,
            ease: 'power3.inOut',
            onComplete: () => {
                if (!target.hasAttribute('tabindex')) {
                    target.setAttribute('tabindex', '-1');
                }

                target.focus({ preventScroll: true });
            },
        });

        if (!isTop) {
            history.pushState(null, '', hash);
        }
    });
}

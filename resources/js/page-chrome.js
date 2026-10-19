/**
 * Scroll-dependent page chrome: the header shadow and the back-to-top button.
 * Uses IntersectionObserver on sentinels placed by the layout; no scroll listeners.
 * The back-to-top glide itself is handled by the #top anchor in motion.js.
 */

export function initScrollState() {
    const header = document.querySelector('[data-site-header]');
    const headerSentinel = document.querySelector('[data-header-sentinel]');
    const backToTop = document.querySelector('[data-back-to-top]');
    const screenSentinel = document.querySelector('[data-scroll-sentinel]');

    if (!('IntersectionObserver' in window)) {
        return;
    }

    if (header && headerSentinel) {
        new IntersectionObserver(([entry]) => {
            header.toggleAttribute('data-scrolled', !entry.isIntersecting);
        }).observe(headerSentinel);
    }

    if (backToTop && screenSentinel) {
        new IntersectionObserver(([entry]) => {
            backToTop.toggleAttribute('data-visible', !entry.isIntersecting);
        }).observe(screenSentinel);
    }
}

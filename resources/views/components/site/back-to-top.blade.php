{{--
    Back-to-top button. Appears once the visitor scrolls past the first
    screen (IntersectionObserver on [data-scroll-sentinel], no scroll listener).
    Sits above the mobile action bar on phones.
--}}
<a
    href="#top"
    data-back-to-top
    class="pointer-events-none fixed bottom-[calc(4.75rem+env(safe-area-inset-bottom))] right-4 z-30 grid size-12 translate-y-2 place-items-center rounded-full border border-line bg-surface text-ink opacity-0 shadow-lg shadow-shadow transition duration-300 ease-out-soft hover:border-brand hover:text-brand-ink data-visible:pointer-events-auto data-visible:translate-y-0 data-visible:opacity-100 md:bottom-6 md:right-6"
>
    <x-ui.icon name="arrow-up" class="size-5" />
    <span class="sr-only">Back to top</span>
</a>

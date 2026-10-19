{{--
    Brand preloader: the peacock-feather mark and a thin gold line.
    Shown once per browser session (skipped via a class set in <head>),
    removed on window load, and hidden by CSS after 3s as a failsafe so it
    can never trap the page if JavaScript fails.
--}}
<div id="preloader" data-preloader aria-hidden="true" class="preloader fixed inset-0 z-60 grid place-items-center bg-canvas transition-opacity duration-500 ease-out-soft">
    <div class="flex flex-col items-center gap-6">
        <x-site.logo variant="mark" alt="" class="preloader-mark h-14" />
        <span class="block h-px w-24 overflow-hidden bg-line">
            <span class="preloader-line block h-full w-full origin-left bg-accent"></span>
        </span>
    </div>
</div>

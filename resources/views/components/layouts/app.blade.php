{{--
    Base layout for every public page.

    <x-layouts.app
        title="Black Galaxy Granite in Gandhidham & Adipur | Shyam Granite"
        description="..."
        og-photo="granite-black"
    >
        ...
    </x-layouts.app>

    Titles are written per page (max 60 characters, from SITE-STRUCTURE.md);
    descriptions max 155 characters. JSON-LD is pushed to the "schema" stack.
--}}
@props([
    'title' => null,
    'description' => 'Granite, marble, Kota stone and sandstone dealer in Adipur, Kutch since 2005. Cutting, polishing and moulding in-house. WhatsApp for today’s rate.',
    'canonical' => null,
    'ogPhoto' => 'kitchen-hero',
    'noindex' => false,
])

@php
    $pageTitle = $title ?? config('site.name').': '.config('site.tagline').' · Adipur, Kutch';
    $canonicalUrl = $canonical ?? url()->current();
    $ogImage = 'https://images.unsplash.com/photo-'.config("photos.{$ogPhoto}.unsplash").'?auto=format&fit=crop&w=1200&h=630&q=70';
@endphp

<!DOCTYPE html>
<html lang="en-IN" id="top">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

        <title>{{ $pageTitle }}</title>
        <meta name="description" content="{{ $description }}">
        <link rel="canonical" href="{{ $canonicalUrl }}">
        @if ($noindex)
            <meta name="robots" content="noindex, follow">
        @endif

        <meta property="og:type" content="website">
        <meta property="og:site_name" content="{{ config('site.name') }}">
        <meta property="og:locale" content="en_IN">
        <meta property="og:title" content="{{ $pageTitle }}">
        <meta property="og:description" content="{{ $description }}">
        <meta property="og:url" content="{{ $canonicalUrl }}">
        <meta property="og:image" content="{{ $ogImage }}">
        <meta name="twitter:card" content="summary_large_image">

        <link rel="icon" href="{{ asset('img/logo/favicon.svg') }}" type="image/svg+xml">
        <meta name="theme-color" content="#fafbfa">
        <meta name="color-scheme" content="light">

        <link rel="preconnect" href="https://images.unsplash.com">

        <script>
            (function (root) {
                try {
                    if (sessionStorage.getItem('sg-preloaded')) {
                        root.classList.add('sg-skip-preloader');
                    }
                } catch (error) {}

                if (window.matchMedia('(prefers-reduced-motion: no-preference)').matches) {
                    root.classList.add('sg-motion');
                    setTimeout(function () {
                        if (!window.sgMotionReady) {
                            root.classList.remove('sg-motion');
                        }
                    }, 3000);
                }
            })(document.documentElement);
        </script>
        <noscript><style>.preloader { display: none !important; }</style></noscript>

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @stack('schema')
    </head>
    <body class="pb-[calc(3.5rem+env(safe-area-inset-bottom))] md:pb-0">
        <x-site.preloader />

        {{-- Scroll sentinels (IntersectionObserver): header shadow after the utility bar, back-to-top after one screen --}}
        <div data-header-sentinel aria-hidden="true" class="pointer-events-none absolute inset-x-0 top-0 h-12"></div>
        <div data-scroll-sentinel aria-hidden="true" class="pointer-events-none absolute inset-x-0 top-0 h-svh"></div>

        <x-site.header />

        <main id="main" tabindex="-1" class="outline-none">
            {{ $slot }}
        </main>

        <x-site.footer />
        <x-site.action-bar />
        <x-site.back-to-top />
    </body>
</html>

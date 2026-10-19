@inject('hours', App\Support\BusinessHours::class)

@php
    $showroomToday = $hours->today('showroom');
@endphp

<a href="#main" class="sr-only z-70 rounded-sm bg-brand px-4 py-3 text-sm font-semibold text-on-brand focus:not-sr-only focus:fixed focus:left-4 focus:top-4">
    Skip to content
</a>

{{-- Utility bar: today's hours and direct contact (tablet and up) --}}
<div class="hidden border-b border-line bg-surface md:block">
    <div class="shell flex h-10 items-center justify-between gap-6 text-[0.8125rem] text-ink-soft">
        <p class="flex items-center gap-2">
            <x-ui.icon name="clock" class="size-4 text-brand-ink" />
            @if ($showroomToday)
                Showroom open today, {{ $showroomToday['opens'] }} to {{ $showroomToday['closes'] }}
            @else
                Showroom closed today
            @endif
        </p>
        <ul class="flex items-center gap-6">
            @foreach (config('site.owners') as $owner)
                <li>
                    <a href="tel:{{ $owner['phone'] }}" class="flex items-center gap-2 transition-colors hover:text-ink" data-track="call">
                        <x-ui.icon name="phone" class="size-4" />
                        <span class="sr-only">{{ $owner['name'] }}:</span>
                        {{ $owner['display'] }}
                    </a>
                </li>
            @endforeach
            <li class="hidden lg:block">
                <a href="mailto:{{ config('site.email') }}" class="flex items-center gap-2 transition-colors hover:text-ink">
                    <x-ui.icon name="envelope-simple" class="size-4" />
                    {{ config('site.email') }}
                </a>
            </li>
        </ul>
    </div>
</div>

<header data-site-header class="sticky top-0 z-40 border-b border-line bg-surface/95 backdrop-blur-md transition-shadow duration-300 data-scrolled:shadow-lg data-scrolled:shadow-shadow">
    <div class="shell flex h-18 items-center justify-between gap-6">
        <a href="{{ url('/') }}" class="shrink-0" aria-label="{{ config('site.name') }} home">
            <x-site.logo class="h-12 md:h-14" />
        </a>

        <x-site.navigation class="hidden xl:block" />

        <div class="flex items-center gap-2">
            <div class="hidden sm:block">
                <x-ui.whatsapp-button size="sm" />
            </div>

            <button
                type="button"
                data-mobile-menu-open
                aria-controls="mobile-menu"
                aria-expanded="false"
                class="grid size-12 cursor-pointer place-items-center rounded-sm text-ink transition-colors hover:bg-surface-muted xl:hidden"
            >
                <x-ui.icon name="list" class="size-6" />
                <span class="sr-only">Open menu</span>
            </button>
        </div>
    </div>
</header>

<x-site.mobile-menu />

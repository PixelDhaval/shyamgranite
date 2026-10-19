{{--
    One location (showroom or workshop): address, phone, hours, directions.
    Reads config/site.php so NAP stays identical everywhere it appears.
    <x-site.location-card location="showroom" />
--}}
@props(['location', 'heading' => 'h3'])

@inject('hours', App\Support\BusinessHours::class)

@php
    $place = config("site.locations.{$location}");
@endphp

<div {{ $attributes->class(['flex flex-col gap-5']) }}>
    <div class="flex items-center gap-3">
        <span class="grid size-10 shrink-0 place-items-center rounded-full bg-surface-tint text-brand-ink">
            <x-ui.icon :name="$location === 'showroom' ? 'storefront' : 'factory'" class="size-5" />
        </span>
        <div>
            <{{ $heading }} class="font-display text-2xl font-medium leading-tight">{{ $place['label'] }}</{{ $heading }}>
            <p class="text-sm text-ink-soft">{{ $place['summary'] }}</p>
        </div>
    </div>

    <address class="flex flex-col gap-3 text-sm not-italic text-ink">
        <p class="flex gap-3">
            <x-ui.icon name="map-pin" class="mt-0.5 size-5 text-ink-soft" />
            <span>
                {{ config('site.name') }}, {{ $place['street'] }},<br>
                {{ $place['locality'] }}, {{ $place['city'] }}, {{ $place['district'] }}, {{ $place['region'] }} {{ $place['postal_code'] }}
            </span>
        </p>
        <p class="flex gap-3">
            <x-ui.icon name="phone" class="mt-0.5 size-5 text-ink-soft" />
            <a href="tel:{{ $place['phone'] }}" class="transition-colors hover:text-brand-ink" data-track="call">{{ $place['phone_display'] }}</a>
        </p>
    </address>

    <dl class="grid max-w-sm grid-cols-[auto_1fr] gap-x-6 gap-y-1 text-sm">
        @foreach ($hours->rows($location) as $row)
            <dt class="text-ink-soft">{{ $row['label'] }}</dt>
            <dd class="text-ink">{{ $row['opens'] }} to {{ $row['closes'] }}</dd>
        @endforeach
    </dl>

    <x-ui.button :href="$place['map_url']" variant="link" icon-trailing="arrow-up-right" external class="self-start" data-track="directions">
        Get directions
    </x-ui.button>
</div>

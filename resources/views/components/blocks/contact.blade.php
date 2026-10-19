{{--
    Contact block: { type: contact, title, intro? }
    Direct contact methods, then both locations with a lazy-loaded map each.
    Map embeds use the workshop's coordinates and the showroom's address.
--}}
@props(['block'])

@php
    $workshop = config('site.locations.workshop');
    $showroom = config('site.locations.showroom');
    $whatsappUrl = 'https://wa.me/'.config('site.whatsapp.number').'?text='.rawurlencode(config('site.whatsapp.default_message').' stone.');

    $methods = [
        ...array_map(fn (array $owner): array => [
            'icon' => 'phone',
            'label' => 'Call '.$owner['name'],
            'value' => $owner['display'],
            'href' => 'tel:'.$owner['phone'],
            'track' => 'call',
        ], config('site.owners')),
        ['icon' => 'whatsapp-logo', 'label' => 'WhatsApp', 'value' => config('site.whatsapp.display'), 'href' => $whatsappUrl, 'track' => 'whatsapp'],
        ['icon' => 'envelope-simple', 'label' => 'Email', 'value' => config('site.email'), 'href' => 'mailto:'.config('site.email'), 'track' => 'email'],
    ];

    $maps = [
        'showroom' => 'https://www.google.com/maps?q='.rawurlencode("{$showroom['street']}, {$showroom['locality']}, {$showroom['region']} {$showroom['postal_code']}").'&output=embed',
        'workshop' => 'https://www.google.com/maps?q='.$workshop['geo']['latitude'].','.$workshop['geo']['longitude'].'&z=16&output=embed',
    ];
@endphp

<div class="flex flex-col gap-16">
    <div class="flex flex-col gap-10">
        <x-ui.section-heading :title="$block['title']" :intro="$block['intro'] ?? null" />

        <ul class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($methods as $method)
                <li data-reveal>
                    <a
                        href="{{ $method['href'] }}"
                        @if (str_starts_with($method['href'], 'http')) target="_blank" rel="noopener" @endif
                        data-track="{{ $method['track'] }}"
                        class="group flex h-full flex-col gap-4 rounded-sm border border-line bg-surface p-6 transition-colors hover:border-brand"
                    >
                        <span class="grid size-11 place-items-center rounded-full bg-surface-tint text-brand-ink transition-colors group-hover:bg-brand group-hover:text-on-brand">
                            <x-ui.icon :name="$method['icon']" class="size-5" />
                        </span>
                        <span class="flex flex-col gap-1">
                            <span class="text-sm text-ink-soft">{{ $method['label'] }}</span>
                            <span class="break-all font-semibold text-ink">{{ $method['value'] }}</span>
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="grid gap-10 lg:grid-cols-2">
        @foreach (['showroom', 'workshop'] as $location)
            <div data-reveal class="flex flex-col gap-6 rounded-sm border border-line bg-surface p-6 md:p-8">
                <div class="aspect-[16/10] overflow-hidden rounded-sm bg-surface-muted">
                    <iframe
                        src="{{ $maps[$location] }}"
                        title="Map of the Shyam Granite {{ strtolower(config("site.locations.{$location}.label")) }}"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        class="size-full border-0"
                    ></iframe>
                </div>
                <x-site.location-card :location="$location" heading="h3" />
            </div>
        @endforeach
    </div>
</div>

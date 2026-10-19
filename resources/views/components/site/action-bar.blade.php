{{--
    Sticky bottom bar on phones: Call, WhatsApp, Directions (strategy
    requirement). The layout pads <body> so it never covers content.
--}}
@php
    $whatsappUrl = 'https://wa.me/'.config('site.whatsapp.number').'?text='.rawurlencode(config('site.whatsapp.default_message').' stone.');
    $itemClasses = 'flex min-h-14 flex-col items-center justify-center gap-1 text-xs font-semibold transition-colors active:bg-surface-muted';
@endphp

<nav aria-label="Quick contact" class="fixed inset-x-0 bottom-0 z-40 border-t border-line bg-surface/95 pb-[env(safe-area-inset-bottom)] backdrop-blur-md md:hidden">
    <ul class="grid grid-cols-3">
        <li>
            <a href="tel:{{ config('site.phone.primary') }}" class="{{ $itemClasses }} text-ink" data-track="call">
                <x-ui.icon name="phone" class="size-6" />
                Call
            </a>
        </li>
        <li>
            <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener" class="{{ $itemClasses }} bg-brand text-on-brand active:bg-brand-hover" data-track="whatsapp">
                <x-ui.icon name="whatsapp-logo" class="size-6" />
                WhatsApp
            </a>
        </li>
        <li>
            <a href="{{ config('site.locations.showroom.map_url') }}" target="_blank" rel="noopener" class="{{ $itemClasses }} text-ink" data-track="directions">
                <x-ui.icon name="navigation-arrow" class="size-6" />
                Directions
            </a>
        </li>
    </ul>
</nav>

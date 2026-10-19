{{--
    The site's single "rate" call to action (no prices on the website).
    Pass the product name to prefill the WhatsApp message:
    <x-ui.whatsapp-button product="Black Galaxy granite" />
--}}
@props([
    'product' => null,
    'variant' => 'primary',
    'size' => 'md',
    'label' => "WhatsApp for today's rate",
])

@php
    $message = trim(config('site.whatsapp.default_message').' '.($product ?? 'stone').'.');
    $url = 'https://wa.me/'.config('site.whatsapp.number').'?text='.rawurlencode($message);
@endphp

<x-ui.button
    :href="$url"
    :variant="$variant"
    :size="$size"
    icon="whatsapp-logo"
    external
    data-track="whatsapp"
    {{ $attributes }}
>{{ $label }}</x-ui.button>

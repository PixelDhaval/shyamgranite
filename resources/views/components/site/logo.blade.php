{{--
    Brand logo from public/img/logo.
    variant: full (Krishna mark + wordmark) | wordmark | mark (peacock feather)
    Pass alt="" where the logo is decorative.
--}}
@props(['variant' => 'full', 'alt' => null])

@php
    [$file, $width, $height] = match ($variant) {
        'wordmark' => ['wordmark-logo.svg', 904, 444],
        'mark' => ['favicon.svg', 551, 499],
        default => ['main-logo.svg', 1215, 608],
    };
@endphp

<img
    src="{{ asset('img/logo/'.$file) }}"
    alt="{{ $alt ?? config('site.name').': '.config('site.tagline') }}"
    width="{{ $width }}"
    height="{{ $height }}"
    {{ $attributes->class(['block w-auto']) }}
>

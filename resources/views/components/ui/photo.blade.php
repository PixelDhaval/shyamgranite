<img
    src="{{ $src }}"
    srcset="{{ $srcset }}"
    sizes="{{ $sizes }}"
    alt="{{ $alt }}"
    width="{{ $width }}"
    height="{{ $height }}"
    @if ($priority) loading="eager" fetchpriority="high" @else loading="lazy" @endif
    decoding="async"
    {{ $attributes->class(['block size-full object-cover bg-surface-muted']) }}
>

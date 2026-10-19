{{--
    Button / link-button.
    variant: primary (filled brand) | secondary (outlined) | link (text with arrow)
    size:    md (48px, the minimum tap target) | sm (40px, desktop-only contexts)
    Renders <a> when href is given, otherwise <button>.
--}}
@props([
    'href' => null,
    'variant' => 'primary',
    'size' => 'md',
    'icon' => null,
    'iconTrailing' => null,
    'external' => false,
])

@php
    $classes = match ($variant) {
        'secondary' => 'border border-line-strong bg-transparent text-ink hover:border-ink',
        'link' => 'text-brand-ink hover:text-ink',
        default => 'bg-brand text-on-brand shadow-sm shadow-shadow hover:bg-brand-hover',
    };

    $sizing = $variant === 'link'
        ? 'min-h-11 gap-2'
        : ($size === 'sm' ? 'h-10 gap-2 px-4' : 'h-12 gap-2.5 px-6');
@endphp

<{{ $href ? 'a' : 'button' }}
    @if ($href) href="{{ $href }}" @else type="{{ $attributes->get('type', 'button') }}" @endif
    @if ($external) target="_blank" rel="noopener" @endif
    {{ $attributes->except('type')->class([
        'group/button inline-flex cursor-pointer items-center justify-center whitespace-nowrap rounded-sm text-sm font-semibold transition duration-200 ease-out-soft active:translate-y-px',
        $classes,
        $sizing,
    ]) }}
>
    @if ($icon)
        <x-ui.icon :name="$icon" class="size-5" />
    @endif
    <span>{{ $slot }}</span>
    @if ($iconTrailing)
        <x-ui.icon :name="$iconTrailing" class="size-4 transition-transform duration-200 group-hover/button:translate-x-0.5" />
    @endif
</{{ $href ? 'a' : 'button' }}>

{{--
    Section heading: optional eyebrow, title, optional intro, stacked.
    Eyebrows are rationed (max one per three sections); leave them out by default.
--}}
@props([
    'title',
    'eyebrow' => null,
    'intro' => null,
    'align' => 'left',
    'as' => 'h2',
])

<div {{ $attributes->class([
    'flex max-w-2xl flex-col gap-4',
    'mx-auto items-center text-center' => $align === 'center',
]) }}>
    @if ($eyebrow)
        <p data-reveal class="text-xs font-semibold uppercase tracking-[0.18em] text-accent-ink">{{ $eyebrow }}</p>
    @endif

    <{{ $as }} data-split class="text-3xl leading-[1.1] md:text-4xl lg:text-[2.75rem]">{{ $title }}</{{ $as }}>

    @if ($intro)
        <p data-reveal class="max-w-[60ch] text-base text-ink-soft md:text-lg">{{ $intro }}</p>
    @endif

    {{ $slot }}
</div>

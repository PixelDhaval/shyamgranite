{{--
    Photo-led link card for a category, use or variety.
    ratio controls the photo crop; the whole card is one link.
--}}
@props([
    'title',
    'url',
    'photo',
    'text' => null,
    'ratio' => '4/3',
    'sizes' => '(min-width: 1024px) 33vw, (min-width: 640px) 50vw, 100vw',
    'heading' => 'h3',
    'photoClass' => null,
])

{{-- photoClass: optional fixed height (e.g. md:h-96) so cards in one row align regardless of width --}}
<a href="{{ url($url) }}" {{ $attributes->class(['group flex flex-col gap-4']) }}>
    <div data-reveal-image @class(['relative overflow-hidden rounded-sm bg-surface-muted', $photoClass])>
        <x-ui.photo :name="$photo" :ratio="$ratio" :sizes="$sizes" class="transition-transform duration-700 ease-out-soft group-hover:scale-[1.03]" />
    </div>
    <div data-reveal class="flex items-start justify-between gap-4">
        <div class="flex flex-col gap-1">
            <{{ $heading }} class="text-2xl leading-tight">{{ $title }}</{{ $heading }}>
            @if ($text)
                <p class="text-sm text-ink-soft">{{ $text }}</p>
            @endif
        </div>
        <span class="mt-1 grid size-9 shrink-0 place-items-center rounded-full border border-line text-ink-soft transition duration-200 group-hover:border-brand group-hover:bg-brand group-hover:text-on-brand">
            <x-ui.icon name="arrow-up-right" class="size-4" />
        </span>
    </div>
</a>

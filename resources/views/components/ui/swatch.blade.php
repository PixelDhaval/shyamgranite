{{--
    Square stone swatch linking to a variety page.
    <x-ui.swatch :page="$variety" /> shows the parent collection as the caption
    unless a caption is passed.
--}}
@props(['page', 'caption' => null])

<a href="{{ $page->url() }}" data-reveal {{ $attributes->class(['group flex flex-col gap-3']) }}>
    <span class="block overflow-hidden rounded-sm ring-1 ring-line">
        <x-ui.photo :name="$page->photo ?? 'granite-black'" ratio="1/1" sizes="(min-width: 1024px) 16vw, (min-width: 768px) 25vw, 50vw" class="transition-transform duration-700 ease-out-soft group-hover:scale-105" />
    </span>
    <span class="flex flex-col">
        <span class="font-display text-xl font-medium leading-tight transition-colors group-hover:text-brand-ink">{{ $page->name }}</span>
        <span class="text-[0.8125rem] text-ink-soft">{{ $caption ?? $page->content['specs']['colour'] ?? $page->parent?->name }}</span>
    </span>
</a>

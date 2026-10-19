{{--
    Chips block: { type: chips, title, intro?, items: [label, ...] }
    For short facts such as finishes, colours or edge profiles.
--}}
@props(['block'])

<div class="grid gap-8 lg:grid-cols-12 lg:items-start lg:gap-16">
    <x-ui.section-heading :title="$block['title']" :intro="$block['intro'] ?? null" class="lg:col-span-5" />

    <ul data-reveal class="flex flex-wrap gap-3 lg:col-span-7">
        @foreach ($block['items'] as $item)
            <li class="inline-flex min-h-11 items-center rounded-sm border border-line-strong bg-surface px-4 text-[0.9375rem] text-ink">{{ $item }}</li>
        @endforeach
    </ul>
</div>

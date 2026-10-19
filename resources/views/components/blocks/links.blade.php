{{--
    Links block: { type: links, title, intro?, paths: [page path, ...] }
    Photo cards for other pages (unpublished paths are skipped).
--}}
@props(['block'])

@php
    $linked = \App\Models\Page::forPaths($block['paths'] ?? []);
@endphp

@if ($linked->isNotEmpty())
    <div class="flex flex-col gap-12">
        <x-ui.section-heading :title="$block['title']" :intro="$block['intro'] ?? null" />

        <div @class([
            'grid gap-x-6 gap-y-10 sm:grid-cols-2',
            'lg:grid-cols-3' => $linked->count() % 3 === 0 || $linked->count() > 4,
            'lg:grid-cols-4' => $linked->count() === 4,
        ])>
            @foreach ($linked as $linkedPage)
                <x-ui.page-card :page="$linkedPage" />
            @endforeach
        </div>
    </div>
@endif

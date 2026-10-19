{{--
    Breadcrumb trail + BreadcrumbList JSON-LD.
    Home is added automatically; the last item is the current page (no url).
    <x-site.breadcrumb :items="[
        ['label' => 'Granite', 'url' => '/granite'],
        ['label' => 'Black Galaxy'],
    ]" />
--}}
@props(['items' => []])

@php
    $trail = array_merge([['label' => 'Home', 'url' => '/']], $items);

    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => collect($trail)->values()->map(fn (array $crumb, int $index): array => array_filter([
            '@type' => 'ListItem',
            'position' => $index + 1,
            'name' => $crumb['label'],
            'item' => isset($crumb['url']) ? url($crumb['url']) : null,
        ]))->all(),
    ];
@endphp

<nav aria-label="Breadcrumb" {{ $attributes }}>
    <ol class="flex flex-wrap items-center gap-x-2 gap-y-1 text-sm text-ink-soft">
        @foreach ($trail as $crumb)
            <li class="flex items-center gap-2">
                @if (! $loop->first)
                    <x-ui.icon name="caret-right" class="size-3.5 text-line-strong" />
                @endif

                @if (! $loop->last && isset($crumb['url']))
                    <a href="{{ url($crumb['url']) }}" class="py-1 transition-colors hover:text-ink">{{ $crumb['label'] }}</a>
                @else
                    <span aria-current="page" class="py-1 font-medium text-ink">{{ $crumb['label'] }}</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>

@push('schema')
    <script type="application/ld+json">@json($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)</script>
@endpush

{{--
    Photo card for a Page record (category, service, use, product line).
--}}
@props(['page', 'ratio' => '4/3', 'heading' => 'h3'])

<x-ui.category-card
    :title="$page->name"
    :url="'/'.$page->path"
    :photo="$page->photo ?? 'granite-black'"
    :text="$page->cardText()"
    :ratio="$ratio"
    :heading="$heading"
    {{ $attributes }}
/>

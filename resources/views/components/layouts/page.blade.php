{{--
    Layout for database pages: wires a Page's SEO fields into the base
    layout and adds its structured data.
--}}
@props(['page'])

<x-layouts.app
    :title="$page->documentTitle()"
    :description="$page->meta_description ?: $page->summary"
    :og-photo="$page->photo ?? 'kitchen-hero'"
    :noindex="$page->noindex"
>
    <x-seo.page-schema :page="$page" />

    {{ $slot }}
</x-layouts.app>

{{--
    JSON-LD for a database page, chosen by template (see SEO-STRATEGY.md §7):
    collection -> CollectionPage, variety -> Product, service -> Service,
    area -> Service with a City in areaServed. No Offer or price markup.
--}}
@props(['page'])

@php
    $domain = rtrim(config('site.domain'), '/');
    $kind = $page->content['schema'] ?? $page->template;
    $photo = $page->photo ? config("photos.{$page->photo}.unsplash") : null;
    $image = $photo ? "https://images.unsplash.com/photo-{$photo}?auto=format&fit=crop&w=1200&h=900&q=70" : null;
    $provider = ['@id' => $domain.'/#business'];

    $schema = match ($kind) {
        'collection' => [
            '@context' => 'https://schema.org',
            '@type' => 'CollectionPage',
            'name' => $page->title,
            'description' => $page->meta_description,
            'url' => $page->url(),
        ],
        'variety' => array_filter([
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => $page->title,
            'description' => $page->meta_description,
            'image' => $image,
            'material' => $page->content['specs']['material'] ?? null,
            'category' => $page->parent?->name,
            'url' => $page->url(),
        ]),
        'service' => [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => $page->title,
            'serviceType' => $page->name,
            'description' => $page->meta_description,
            'provider' => $provider,
            'areaServed' => array_map(fn (string $city): array => ['@type' => 'City', 'name' => $city], config('site.areas_served')),
            'url' => $page->url(),
        ],
        'area' => [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => $page->title,
            'serviceType' => 'Granite, marble and natural stone supply',
            'provider' => $provider,
            'areaServed' => ['@type' => 'City', 'name' => $page->name],
            'url' => $page->url(),
        ],
        'contact', 'about' => [
            '@context' => 'https://schema.org',
            '@type' => $kind === 'contact' ? 'ContactPage' : 'AboutPage',
            'name' => $page->title,
            'url' => $page->url(),
            'about' => $provider,
        ],
        default => null,
    };
@endphp

@if ($schema)
    @push('schema')
        <script type="application/ld+json">@json($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)</script>
    @endpush
@endif

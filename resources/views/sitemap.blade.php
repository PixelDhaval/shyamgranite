{!! '<'.'?xml version="1.0" encoding="UTF-8"?'.'>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ ($pages->max('updated_at') ?? now())->toAtomString() }}</lastmod>
    </url>
@foreach ($pages as $page)
    <url>
        <loc>{{ url($page->path) }}</loc>
        <lastmod>{{ $page->updated_at->toAtomString() }}</lastmod>
    </url>
@endforeach
</urlset>

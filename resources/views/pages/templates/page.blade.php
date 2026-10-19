{{--
    Generic content page: header, content blocks, FAQs, rate CTA.
    Used for product lines (Kota stone, sinks, supplies), Shilp Kala items,
    services, shop-by-use, area pages and core pages (About, Contact, FAQ).
    content.product names the item in the WhatsApp message (defaults to the
    page name); content.generic_cta uses a general message instead, for
    pages that are not about one product.
--}}
@php
    $product = ($page->content['generic_cta'] ?? false)
        ? null
        : (filled($page->content['product'] ?? null) ? $page->content['product'] : $page->name);
@endphp

<x-layouts.page :page="$page">
    @if ($page->content['local_business'] ?? false)
        <x-seo.local-business />
    @endif

    <x-ui.page-header
        :title="$page->title"
        :intro="$page->intro"
        :breadcrumb="$page->breadcrumb()"
        :photo="$page->photo"
        :product="$product"
    />

    <x-blocks.render :blocks="$page->content['blocks'] ?? []" />

    <x-site.faq-section :faqs="$page->faqs" />

    @unless ($page->content['hide_cta'] ?? false)
        <x-ui.cta-band :product="$product" />
    @endunless
</x-layouts.page>

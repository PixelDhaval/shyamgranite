{{--
    Variety (colour) page: slab photo with key facts, description,
    processing links, similar colours, FAQs and the rate CTA.
    content.specs: material, origin, colour, finishes[], uses[], aka?
    content.body: paragraphs; content.pairs: sentence; content.similar: paths
--}}
@php
    $specs = $page->content['specs'] ?? [];
    $productName = $page->title;
    $similar = ! empty($page->content['similar'])
        ? \App\Models\Page::forPaths($page->content['similar'])
        : $page->siblings(6);
    $processing = \App\Models\Page::forPaths([
        'services/granite-cutting',
        'services/granite-polishing',
        'services/granite-moulding',
    ]);

    $facts = array_filter([
        'Material' => $specs['material'] ?? null,
        'Origin' => $specs['origin'] ?? 'Ask us about the current lot',
        'Colour' => $specs['colour'] ?? null,
        'Also called' => isset($specs['aka']) ? implode(', ', (array) $specs['aka']) : null,
        'Finishes' => isset($specs['finishes']) ? implode(', ', $specs['finishes']) : null,
        'Thickness & sizes' => $specs['sizes'] ?? 'Ask for the slabs in stock today',
    ]);
@endphp

<x-layouts.page :page="$page">
    {{-- Hero: slab photo + key facts --}}
    <section data-hero class="border-b border-line bg-surface">
        <div class="shell grid gap-10 py-10 md:py-14 lg:grid-cols-12 lg:items-center lg:gap-16">
            <div data-hero-media data-parallax class="overflow-hidden rounded-sm lg:col-span-6">
                <x-ui.photo :name="$page->photo ?? 'granite-black'" ratio="1/1" sizes="(min-width: 1024px) 50vw, 100vw" priority :alt="$productName.' slab'" />
            </div>

            <div class="flex flex-col gap-6 lg:col-span-6">
                <x-site.breadcrumb :items="$page->breadcrumb()" data-hero-item />
                <h1 data-hero-title class="text-4xl leading-[1.05] md:text-5xl lg:text-6xl">{{ $page->title }}</h1>
                @if ($page->intro)
                    <p data-hero-item class="max-w-[52ch] text-lg text-ink-soft">{{ $page->intro }}</p>
                @endif

                <dl data-hero-item class="grid grid-cols-[auto_1fr] gap-x-8 gap-y-3 border-y border-line py-6 text-[0.9375rem]">
                    @foreach ($facts as $label => $value)
                        <dt class="text-ink-soft">{{ $label }}</dt>
                        <dd class="font-medium text-ink">{{ $value }}</dd>
                    @endforeach
                </dl>

                <div data-hero-item class="flex flex-wrap items-center gap-3">
                    <x-ui.whatsapp-button :product="$productName" />
                    <x-ui.button href="{{ url('/contact') }}" variant="secondary" icon="storefront">See it at the showroom</x-ui.button>
                </div>
            </div>
        </div>
    </section>

    {{-- About the stone + where it works --}}
    <section class="section-y" aria-labelledby="about-stone">
        <div class="shell grid gap-12 lg:grid-cols-12 lg:gap-16">
            <div class="flex flex-col gap-6 lg:col-span-7">
                <h2 id="about-stone" data-split class="text-3xl leading-[1.1] md:text-4xl">About {{ $page->name }}</h2>
                <div data-reveal class="prose-stone text-[1.0625rem]">
                    @foreach ($page->content['body'] ?? [] as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach
                    @isset($page->content['pairs'])
                        <p><strong>Pairs well with:</strong> {{ $page->content['pairs'] }}</p>
                    @endisset
                </div>
            </div>

            <aside class="flex flex-col gap-8 lg:col-span-5">
                @if (! empty($specs['uses']))
                    <div data-reveal class="flex flex-col gap-4 rounded-sm border border-line bg-surface p-6">
                        <h3 class="text-2xl leading-tight">Best used for</h3>
                        <ul class="flex flex-col gap-2.5">
                            @foreach ($specs['uses'] as $use)
                                <li class="flex items-start gap-3 text-[0.9375rem] text-ink">
                                    <x-ui.icon name="check" class="mt-0.5 size-5 text-brand-ink" />
                                    {{ $use }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if ($processing->isNotEmpty())
                    <div data-reveal class="flex flex-col gap-3">
                        <h3 class="text-2xl leading-tight">Cut and finished to your size</h3>
                        <p class="text-[0.9375rem] text-ink-soft">Our workshop processes {{ $page->name }} to your measurements. Installation is not included.</p>
                        <ul class="divide-y divide-line border-y border-line">
                            @foreach ($processing as $service)
                                <li>
                                    <a href="{{ $service->url() }}" class="group flex min-h-12 items-center justify-between gap-4 text-[0.9375rem] font-medium text-ink transition-colors hover:text-brand-ink">
                                        {{ $service->name }}
                                        <x-ui.icon name="arrow-right" class="size-4 text-ink-soft transition group-hover:translate-x-0.5 group-hover:text-brand-ink" />
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </aside>
        </div>
    </section>

    @if ($similar->isNotEmpty())
        <section class="section-y border-t border-line bg-surface" aria-labelledby="similar-colours">
            <div class="shell flex flex-col gap-10">
                <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
                    <h2 id="similar-colours" data-split class="text-3xl leading-[1.1] md:text-4xl">Similar colours</h2>
                    @if ($page->parent)
                        <x-ui.button :href="$page->parent->url()" variant="link" icon-trailing="arrow-right" class="shrink-0" data-reveal>All {{ $page->parent->name }}</x-ui.button>
                    @endif
                </div>
                <div class="grid grid-cols-2 gap-x-4 gap-y-8 md:grid-cols-3 lg:grid-cols-6">
                    @foreach ($similar as $variety)
                        <x-ui.swatch :page="$variety" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <x-site.faq-section :faqs="$page->faqs" :title="'Questions about '.$page->name" />

    <x-ui.cta-band :product="$productName" :title="'Today’s rate for '.$page->name" />
</x-layouts.page>

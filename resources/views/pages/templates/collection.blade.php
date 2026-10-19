{{--
    Collection (hub) page: lists its children. When children have their own
    children (Granite > South Indian > Black Galaxy) each child gets a row of
    swatches; varieties render as swatches; anything else as photo cards.
--}}
@php
    $children = $page->children()->with(['children', 'parent'])->get();
    $nested = $children->contains(fn ($child) => $child->children->isNotEmpty());
    $isVarietyList = $children->isNotEmpty() && $children->every(fn ($child) => $child->template === 'variety');
@endphp

<x-layouts.page :page="$page">
    <x-ui.page-header
        :title="$page->title"
        :intro="$page->intro"
        :breadcrumb="$page->breadcrumb()"
        :photo="$page->photo"
        :product="$page->name"
    />

    @if ($children->isNotEmpty())
        <section class="section-y" aria-labelledby="collection-range">
            <div class="shell flex flex-col gap-16">
                <x-ui.section-heading
                    :title="$page->content['range_title'] ?? 'Explore the range'"
                    :intro="$page->content['range_intro'] ?? null"
                />

                @if ($nested)
                    @foreach ($children as $child)
                        <div class="flex flex-col gap-8 border-t border-line pt-10">
                            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                                <div class="flex max-w-2xl flex-col gap-2">
                                    <h3 data-split class="text-3xl leading-tight">
                                        <a href="{{ $child->url() }}" class="transition-colors hover:text-brand-ink">{{ $child->name }}</a>
                                    </h3>
                                    @if ($child->cardText())
                                        <p data-reveal class="text-ink-soft">{{ $child->cardText() }}</p>
                                    @endif
                                </div>
                                <x-ui.button :href="$child->url()" variant="link" icon-trailing="arrow-right" class="shrink-0" data-reveal>
                                    All {{ $child->name }}
                                </x-ui.button>
                            </div>

                            @if ($child->children->isNotEmpty())
                                <div class="grid grid-cols-2 gap-x-4 gap-y-8 md:grid-cols-4 lg:grid-cols-6">
                                    @foreach ($child->children->take(6) as $variety)
                                        <x-ui.swatch :page="$variety" />
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach
                @elseif ($isVarietyList)
                    <div class="grid grid-cols-2 gap-x-4 gap-y-10 md:grid-cols-4 lg:grid-cols-5">
                        @foreach ($children as $variety)
                            <x-ui.swatch :page="$variety" />
                        @endforeach
                    </div>
                @else
                    <div @class([
                        'grid gap-x-6 gap-y-12 sm:grid-cols-2',
                        'lg:grid-cols-3' => $children->count() !== 4 && $children->count() !== 2,
                        'lg:grid-cols-4' => $children->count() === 4,
                    ])>
                        @foreach ($children as $child)
                            <x-ui.page-card :page="$child" :ratio="$children->count() === 2 ? '16/10' : '4/3'" />
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif

    <x-blocks.render :blocks="$page->content['blocks'] ?? []" :offset="1" />

    <x-site.faq-section :faqs="$page->faqs" />

    <x-ui.cta-band :product="$page->name" />
</x-layouts.page>

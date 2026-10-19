@inject('hours', App\Support\BusinessHours::class)

@php
    $range = [
        ['title' => 'Granite', 'url' => '/granite', 'photo' => 'granite-black', 'text' => 'South Indian, Rajasthan and engineered stone, including Nano White.', 'span' => 'md:col-span-7', 'height' => 'md:h-[26rem]'],
        ['title' => 'Marble', 'url' => '/marble', 'photo' => 'marble-floor', 'text' => 'Italian and Indian marble for floors, walls and temples.', 'span' => 'md:col-span-5', 'height' => 'md:h-[26rem]'],
        ['title' => 'Kota Stone & Sandstone', 'url' => '/sandstone', 'photo' => 'sandstone-arch', 'text' => 'Hard-wearing floors, paving and elevations.', 'span' => 'md:col-span-4', 'height' => 'md:h-72'],
        ['title' => 'Shilp Kala', 'url' => '/shilp-kala', 'photo' => 'stone-carving', 'text' => 'Mandirs, murtis, name plates and Tulsi kyara.', 'span' => 'md:col-span-4', 'height' => 'md:h-72'],
        ['title' => 'Kitchen & Supplies', 'url' => '/kitchen', 'photo' => 'kitchen-marble-island', 'text' => 'Table tops, sinks, adhesives and epoxy grout.', 'span' => 'md:col-span-4', 'height' => 'md:h-72'],
    ];

    $reasons = [
        ['icon' => 'seal-check', 'title' => 'In the trade since '.config('site.founded'), 'text' => 'Two decades of supplying stone to homes, builders and temples across Kutch.'],
        ['icon' => 'stack', 'title' => 'Everything under one roof', 'text' => 'Stone, kitchen sinks, adhesives and epoxy grout from a single counter.'],
        ['icon' => 'factory', 'title' => 'Processed in-house', 'text' => 'Cutting, polishing and moulding at our own workshop in GIDC Adipur.'],
        ['icon' => 'truck', 'title' => 'One piece or a full project', 'text' => 'A single table top for a homeowner or bulk slabs for a builder.'],
    ];

    $services = [
        ['icon' => 'ruler', 'title' => 'Granite Cutting', 'url' => '/services/granite-cutting', 'text' => 'Slabs cut to size, sink and hob cut-outs, steps, risers, skirting and custom shapes.'],
        ['icon' => 'sparkle', 'title' => 'Granite Polishing', 'url' => '/services/granite-polishing', 'text' => 'Mirror, honed, leather and lapotra finishes, plus re-polishing of dull or worn slabs.'],
        ['icon' => 'bezier-curve', 'title' => 'Granite Moulding', 'url' => '/services/granite-moulding', 'text' => 'Half and full bullnose, bevel, ogee, double-edge and waterfall edge profiles.'],
    ];

    $uses = [
        ['title' => 'Kitchen', 'url' => '/kitchen', 'photo' => 'kitchen-island', 'text' => 'Platforms, sinks and grout'],
        ['title' => 'Flooring', 'url' => '/flooring', 'photo' => 'marble-floor', 'text' => 'Marble, granite and Kota'],
        ['title' => 'Pooja & Home', 'url' => '/pooja-home', 'photo' => 'temple-pillars', 'text' => 'Mandirs, murtis, name plates'],
        ['title' => 'Elevation & Outdoor', 'url' => '/elevation-outdoor', 'photo' => 'sandstone-jaali', 'text' => 'Sandstone and flamed granite'],
        ['title' => 'Commercial', 'url' => '/commercial', 'photo' => 'marble-counter', 'text' => 'Counters, table tops, floors'],
    ];

    $varieties = [
        ['name' => 'Black Galaxy', 'family' => 'South Indian granite', 'url' => '/granite/black-galaxy', 'photo' => 'granite-black'],
        ['name' => 'Absolute Black', 'family' => 'South Indian granite', 'url' => '/granite/absolute-black', 'photo' => 'granite-dark'],
        ['name' => 'Nano White', 'family' => 'Engineered stone', 'url' => '/granite/nano-white', 'photo' => 'marble-counter'],
        ['name' => 'Statuario', 'family' => 'Italian marble', 'url' => '/marble/statuario', 'photo' => 'marble-white'],
        ['name' => 'Armani Grey', 'family' => 'Italian marble', 'url' => '/marble/armani-grey', 'photo' => 'marble-grey'],
        ['name' => 'Jodhpur Pink', 'family' => 'Sandstone', 'url' => '/sandstone/jodhpur-pink', 'photo' => 'sandstone-texture'],
    ];

    $hoursSentence = fn (string $location): string => collect($hours->rows($location))
        ->map(fn (array $row): string => "{$row['label']}, {$row['opens']} to {$row['closes']}")
        ->implode('; ');

    $faqs = [
        [
            'question' => 'Why are there no prices on the website?',
            'answer' => 'Stone rates change with stock, origin, thickness, finish and slab size. Send us the stone name and your measurements on WhatsApp at '.config('site.whatsapp.display').' and we reply with today’s rate.',
        ],
        [
            'question' => 'Do you install granite and marble?',
            'answer' => 'No. We supply stone and cut, polish and mould it to your measurements at our workshop. Your own fitter or mason installs it, and we stock the tile adhesive, stone adhesive and epoxy grout they need.',
        ],
        [
            'question' => 'Can you make sink and hob cut-outs in a kitchen platform?',
            'answer' => 'Yes. Our workshop cuts slabs to size and makes sink and hob cut-outs, steps, risers and skirting strips. Bring your measurements, or the sink itself, and we work to them.',
        ],
        [
            'question' => 'Which stone is best for a kitchen platform?',
            'answer' => 'Dense South Indian granite such as Black Galaxy, Absolute Black or Tan Brown is the usual choice because it is hard-wearing and easy to keep clean. Nano White suits a bright white kitchen and does not absorb liquids, so it resists stains.',
        ],
        [
            'question' => 'What are your opening hours?',
            'answer' => 'Showroom: '.$hoursSentence('showroom').'. Workshop: '.$hoursSentence('workshop').'.',
        ],
        [
            'question' => 'Which areas do you supply?',
            'answer' => 'All of Kutch, including Adipur, Gandhidham, Anjar, Bhuj, Mundra, Mandvi, Bhachau and Rapar. Call or WhatsApp us to plan your order.',
        ],
    ];
@endphp

<x-layouts.app
    title="Shyam Granite: A House of Color Granite · Adipur, Kutch"
    description="Granite, marble, Kota stone and sandstone dealer in Adipur and Gandhidham since 2005. Cutting, polishing and moulding in-house. WhatsApp for today’s rate."
>
    <x-seo.local-business website />

    {{-- Hero: split, copy left, photo right --}}
    <section data-hero class="overflow-hidden border-b border-line bg-surface">
        <div class="shell grid gap-12 pb-16 pt-10 md:pt-14 lg:grid-cols-12 lg:items-center lg:gap-16 lg:pb-20">
            <div class="flex flex-col gap-7 lg:col-span-6">
                <p data-hero-item class="text-xs font-semibold uppercase tracking-[0.18em] text-accent-ink">Since {{ config('site.founded') }} in Adipur, Kutch</p>
                <h1 data-hero-title class="pb-1 text-[2.75rem] leading-[1.05] tracking-tight sm:text-6xl lg:text-[4.25rem]">
                    Granite, marble and stone, <em class="font-medium text-brand-ink">cut to your size</em>
                </h1>
                <p data-hero-item class="max-w-[46ch] text-lg text-ink-soft">
                    Choose your stone at our Rambaug Road showroom. We cut, polish and mould it to your measurements.
                </p>
                <div data-hero-item class="flex flex-wrap items-center gap-3">
                    <x-ui.whatsapp-button />
                    <x-ui.button href="#visit" variant="secondary" icon="clock">Showroom hours</x-ui.button>
                </div>
            </div>

            <div class="relative lg:col-span-6">
                <div data-hero-media data-parallax class="overflow-hidden rounded-sm">
                    <x-ui.photo name="kitchen-hero" ratio="5/4" sizes="(min-width: 1024px) 50vw, 100vw" priority />
                </div>
                <div data-hero-accent class="absolute -bottom-8 -left-8 hidden w-40 overflow-hidden rounded-sm border-[6px] border-surface shadow-xl shadow-shadow md:block lg:w-48">
                    <x-ui.photo name="granite-black" ratio="1/1" sizes="200px" alt="" />
                </div>
            </div>
        </div>
    </section>

    {{-- Product range: asymmetric grid, 2 + 3 --}}
    <section class="section-y" aria-labelledby="range-title">
        <div class="shell flex flex-col gap-12">
            <x-ui.section-heading
                title="Stone for every kitchen, floor and facade"
                intro="Natural and engineered stone for homes, temples, offices and commercial projects, chosen in one showroom."
            />

            <div class="grid gap-x-6 gap-y-12 md:grid-cols-12">
                @foreach ($range as $category)
                    <x-ui.category-card
                        :title="$category['title']"
                        :url="$category['url']"
                        :photo="$category['photo']"
                        :text="$category['text']"
                        :photo-class="$category['height']"
                        :sizes="$loop->index < 2 ? '(min-width: 768px) 58vw, 100vw' : '(min-width: 768px) 33vw, 100vw'"
                        :class="$category['span']"
                    />
                @endforeach
            </div>
        </div>
    </section>

    {{-- Why Shyam Granite: statement left, reasons grid right --}}
    <section class="section-y border-y border-line bg-surface" aria-labelledby="why-title">
        <div class="shell grid gap-12 lg:grid-cols-12 lg:gap-16">
            <div class="flex flex-col gap-6 lg:col-span-5">
                <h2 id="why-title" data-split class="text-3xl leading-[1.1] md:text-4xl lg:text-[2.75rem]">From slab to finished piece in one visit</h2>
                <div data-reveal class="prose-stone">
                    <p>
                        {{ config('site.name') }} is run by <strong>Pravin and Chirag Sorathiya</strong>. Pick granite, marble, Kota stone or sandstone at the showroom, and our workshop cuts and finishes it to size, ready for your own fitter.
                    </p>
                    <p>We supply homeowners, builders, architects, fitters, temples and commercial spaces across Kutch.</p>
                </div>
                <x-ui.button href="{{ url('/about') }}" variant="link" icon-trailing="arrow-right" class="self-start" data-reveal>About Shyam Granite</x-ui.button>
            </div>

            <ul class="grid gap-x-10 gap-y-10 sm:grid-cols-2 lg:col-span-7">
                @foreach ($reasons as $reason)
                    <li data-reveal class="flex flex-col gap-3 border-t border-line pt-6">
                        <x-ui.icon :name="$reason['icon']" class="size-7 text-brand-ink" />
                        <h3 class="text-2xl leading-tight">{{ $reason['title'] }}</h3>
                        <p class="text-[0.9375rem] text-ink-soft">{{ $reason['text'] }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    {{-- Services: photo left, service list right, on a tint --}}
    <section class="section-y bg-surface-tint" aria-labelledby="services-title">
        <div class="shell grid gap-12 lg:grid-cols-12 lg:items-center lg:gap-16">
            <div data-reveal-image data-parallax class="overflow-hidden rounded-sm lg:col-span-5">
                <x-ui.photo name="stone-cutting" ratio="4/5" sizes="(min-width: 1024px) 40vw, 100vw" />
            </div>

            <div class="flex flex-col gap-10 lg:col-span-7">
                <x-ui.section-heading
                    title="Cut, polished and moulded at our workshop"
                    intro="All processing happens in-house at GIDC Adipur, on granite, marble, Kota stone, Nano White and engineered stone."
                />

                <ul class="divide-y divide-line border-y border-line">
                    @foreach ($services as $service)
                        <li data-reveal>
                            <a href="{{ url($service['url']) }}" class="group grid grid-cols-[auto_1fr_auto] items-start gap-5 py-6">
                                <span class="grid size-11 place-items-center rounded-full border border-line-strong text-brand-ink">
                                    <x-ui.icon :name="$service['icon']" class="size-5" />
                                </span>
                                <span class="flex flex-col gap-1">
                                    <span class="font-display text-2xl font-medium leading-tight">{{ $service['title'] }}</span>
                                    <span class="text-[0.9375rem] text-ink-soft">{{ $service['text'] }}</span>
                                </span>
                                <x-ui.icon name="arrow-right" class="mt-3 size-5 text-ink-soft transition duration-200 group-hover:translate-x-1 group-hover:text-brand-ink" />
                            </a>
                        </li>
                    @endforeach
                </ul>

                <p data-reveal class="flex items-start gap-3 text-sm text-ink-soft">
                    <x-ui.icon name="check" class="mt-0.5 size-5 text-brand-ink" />
                    Installation is not included. Your fitter installs the finished pieces.
                </p>
            </div>
        </div>
    </section>

    {{-- Shop by use: scroll-snap row on phones, five columns on desktop --}}
    <section class="section-y" aria-labelledby="uses-title">
        <div class="shell flex flex-col gap-10">
            <x-ui.section-heading title="Shop by use" intro="Not sure which stone you need? Start with the space you are building." />
        </div>

        <ul class="shell mt-10 grid snap-x snap-mandatory auto-cols-[72%] grid-flow-col gap-4 overflow-x-auto pb-4 scrollbar-none sm:auto-cols-[40%] lg:auto-cols-[28%] xl:grid-flow-row xl:grid-cols-5 xl:overflow-visible xl:pb-0">
            @foreach ($uses as $use)
                <li data-reveal class="snap-start">
                    <a href="{{ url($use['url']) }}" class="group relative block overflow-hidden rounded-sm">
                        <x-ui.photo :name="$use['photo']" ratio="3/4" sizes="(min-width: 1280px) 20vw, (min-width: 640px) 40vw, 72vw" class="transition-transform duration-700 ease-out-soft group-hover:scale-[1.04]" />
                        <span class="absolute inset-0 bg-linear-to-t from-stone-950/80 via-stone-950/10 to-transparent"></span>
                        <span class="absolute inset-x-0 bottom-0 flex flex-col gap-1 p-5 text-stone-50">
                            <span class="font-display text-2xl font-medium leading-tight">{{ $use['title'] }}</span>
                            <span class="text-sm text-stone-200">{{ $use['text'] }}</span>
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    </section>

    {{-- Popular varieties: swatch grid --}}
    <section class="section-y border-t border-line bg-surface" aria-labelledby="varieties-title">
        <div class="shell flex flex-col gap-12">
            <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
                <x-ui.section-heading title="Popular colours" intro="A few of the varieties customers ask about most. Every slab can be seen at the showroom." />
                <x-ui.button href="{{ url('/granite') }}" variant="link" icon-trailing="arrow-right" class="shrink-0" data-reveal>All granite colours</x-ui.button>
            </div>

            <ul class="grid grid-cols-2 gap-x-4 gap-y-8 md:grid-cols-3 lg:grid-cols-6">
                @foreach ($varieties as $variety)
                    <li data-reveal>
                        <a href="{{ url($variety['url']) }}" class="group flex flex-col gap-3">
                            <span class="block overflow-hidden rounded-sm ring-1 ring-line">
                                <x-ui.photo :name="$variety['photo']" ratio="1/1" sizes="(min-width: 1024px) 16vw, (min-width: 768px) 33vw, 50vw" class="transition-transform duration-700 ease-out-soft group-hover:scale-105" />
                            </span>
                            <span class="flex flex-col">
                                <span class="font-display text-xl font-medium leading-tight transition-colors group-hover:text-brand-ink">{{ $variety['name'] }}</span>
                                <span class="text-[0.8125rem] text-ink-soft">{{ $variety['family'] }}</span>
                            </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    {{-- Visit: two locations --}}
    <section id="visit" class="section-y border-t border-line" aria-labelledby="visit-title">
        <div class="shell grid gap-12 lg:grid-cols-12 lg:gap-16">
            <div class="flex flex-col gap-6 lg:col-span-4">
                <p data-reveal class="text-xs font-semibold uppercase tracking-[0.18em] text-accent-ink">Visit us</p>
                <h2 id="visit-title" data-split class="text-3xl leading-[1.1] md:text-4xl lg:text-[2.75rem]">Showroom on Rambaug Road, workshop in GIDC</h2>
                <p data-reveal class="text-ink-soft">Both are in Adipur, Gandhidham’s twin town. The showroom is open on Sunday mornings too.</p>
                <ul data-reveal class="flex flex-wrap gap-2" aria-label="Areas we serve">
                    @foreach (config('site.area_pages') as $area)
                        <li>
                            <a href="{{ url($area['url']) }}" class="inline-flex h-9 items-center rounded-sm border border-line px-3 text-sm text-ink transition-colors hover:border-brand hover:text-brand-ink">{{ $area['label'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="grid gap-12 sm:grid-cols-2 lg:col-span-8 lg:gap-10">
                @foreach (array_keys(config('site.locations')) as $location)
                    <x-site.location-card :location="$location" data-reveal class="rounded-sm border border-line bg-surface p-6 md:p-8" />
                @endforeach
            </div>
        </div>
    </section>

    {{-- FAQ: heading left, accordion right --}}
    <section class="section-y border-t border-line bg-surface" aria-labelledby="faq-title">
        <div class="shell grid gap-12 lg:grid-cols-12 lg:gap-16">
            <div class="flex flex-col gap-6 lg:col-span-4">
                <h2 id="faq-title" data-split class="text-3xl leading-[1.1] md:text-4xl lg:text-[2.75rem]">Questions we hear every day</h2>
                <x-ui.button href="{{ url('/faq') }}" variant="link" icon-trailing="arrow-right" class="self-start" data-reveal>Read all FAQs</x-ui.button>
            </div>
            <x-ui.faq :items="$faqs" class="lg:col-span-8" />
        </div>
    </section>

    <x-ui.cta-band />
</x-layouts.app>

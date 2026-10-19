{{--
    Inner-page header: breadcrumb, H1, intro, primary action, optional photo.
    <x-ui.page-header title="Granite in Gandhidham & Adipur" intro="..." :breadcrumb="[['label' => 'Granite']]" photo="granite-black" product="granite" />
--}}
@props([
    'title',
    'intro' => null,
    'breadcrumb' => [],
    'photo' => null,
    'product' => null,
])

<header data-hero {{ $attributes->class(['border-b border-line bg-surface']) }}>
    <div @class([
        'shell grid gap-10 py-10 md:py-14',
        'lg:grid-cols-12 lg:items-center lg:gap-12' => $photo,
    ])>
        <div @class(['flex flex-col gap-6', 'lg:col-span-6' => $photo])>
            <x-site.breadcrumb :items="$breadcrumb" data-hero-item />

            <h1 data-hero-title class="text-4xl leading-[1.05] md:text-5xl lg:text-6xl">{{ $title }}</h1>

            @if ($intro)
                <p data-hero-item class="max-w-[58ch] text-base text-ink-soft md:text-lg">{{ $intro }}</p>
            @endif

            <div data-hero-item class="flex flex-wrap items-center gap-3">
                <x-ui.whatsapp-button :product="$product" />
                {{ $actions ?? '' }}
            </div>
        </div>

        @if ($photo)
            <div data-hero-media data-parallax class="overflow-hidden rounded-sm lg:col-span-6">
                <x-ui.photo :name="$photo" ratio="4/3" sizes="(min-width: 1024px) 50vw, 100vw" priority />
            </div>
        @endif
    </div>
</header>

{{--
    Locations block: { type: locations, title, intro? } shows both locations
    from config/site.php.
--}}
@props(['block'])

<div class="grid gap-12 lg:grid-cols-12 lg:gap-16">
    <x-ui.section-heading :title="$block['title']" :intro="$block['intro'] ?? null" class="lg:col-span-4" />

    <div class="grid gap-6 sm:grid-cols-2 lg:col-span-8">
        @foreach (array_keys(config('site.locations')) as $location)
            <x-site.location-card :location="$location" data-reveal class="rounded-sm border border-line bg-surface p-6 md:p-8" />
        @endforeach
    </div>
</div>

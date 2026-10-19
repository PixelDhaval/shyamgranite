{{--
    Site footer: brand statement, link columns, area pages, and both
    locations with full NAP and hours (must match the Google profiles).
--}}

<footer class="border-t border-line bg-surface" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>

    <div class="shell grid gap-12 py-16 lg:grid-cols-12">
        <div class="flex flex-col gap-6 lg:col-span-4">
            <x-site.logo class="h-20 self-start" />
            <p class="max-w-[38ch] text-ink-soft">
                Granite, marble, Kota stone and sandstone for homes, temples and businesses across Kutch since {{ config('site.founded') }}.
            </p>
            <p class="max-w-[38ch] text-sm text-ink-soft">
                We supply stone and cut, polish and mould it to your size. Installation is not included.
            </p>
            <x-ui.whatsapp-button variant="secondary" class="self-start" />
        </div>

        <div class="grid grid-cols-2 gap-10 sm:grid-cols-4 lg:col-span-8">
            @foreach (config('navigation.footer') as $heading => $links)
                <div class="flex flex-col gap-4">
                    <h3 class="font-sans text-xs font-semibold uppercase tracking-[0.16em] text-ink-soft">{{ $heading }}</h3>
                    <ul class="flex flex-col">
                        @foreach ($links as $link)
                            <li>
                                <a href="{{ url($link['url']) }}" class="flex min-h-9 items-center text-sm text-ink transition-colors hover:text-brand-ink">{{ $link['label'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach

            <div class="flex flex-col gap-4">
                <h3 class="font-sans text-xs font-semibold uppercase tracking-[0.16em] text-ink-soft">Areas we serve</h3>
                <ul class="flex flex-col">
                    @foreach (config('site.area_pages') as $area)
                        <li>
                            <a href="{{ url($area['url']) }}" class="flex min-h-9 items-center text-sm text-ink transition-colors hover:text-brand-ink">{{ $area['label'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="shell">
        <div class="grid gap-10 border-t border-line py-12 md:grid-cols-2">
            @foreach (array_keys(config('site.locations')) as $location)
                <x-site.location-card :location="$location" />
            @endforeach
        </div>
    </div>

    <div class="border-t border-line">
        <div class="shell flex flex-col gap-3 py-6 text-[0.8125rem] text-ink-soft sm:flex-row sm:items-center sm:justify-between">
            <p>&copy; {{ now()->year }} {{ config('site.name') }}. {{ config('site.tagline') }}.</p>
            <a href="mailto:{{ config('site.email') }}" class="transition-colors hover:text-ink">{{ config('site.email') }}</a>
        </div>
    </div>
</footer>

<x-layouts.app
    title="Page not found | Shyam Granite"
    description="The page you were looking for could not be found."
    noindex
>
    <section class="section-y">
        <div class="shell grid gap-12 lg:grid-cols-12 lg:items-center lg:gap-16">
            <div class="flex flex-col gap-6 lg:col-span-6">
                <p class="text-xs font-semibold uppercase tracking-[0.18em] text-accent-ink">Error 404</p>
                <h1 class="text-4xl leading-[1.05] md:text-5xl lg:text-6xl">This page isn’t here</h1>
                <p class="max-w-[46ch] text-lg text-ink-soft">The link may be old or mistyped. Try one of the pages below, or ask us on WhatsApp.</p>
                <div class="flex flex-wrap gap-3">
                    <x-ui.button :href="url('/')" icon-trailing="arrow-right">Back to home</x-ui.button>
                    <x-ui.whatsapp-button variant="secondary" />
                </div>
            </div>

            <ul class="grid grid-cols-2 gap-x-6 gap-y-2 lg:col-span-6">
                @foreach ([
                    ['Granite', '/granite'], ['Marble', '/marble'], ['Kota Stone', '/kota-stone'], ['Sandstone', '/sandstone'],
                    ['Shilp Kala', '/shilp-kala'], ['Kitchen', '/kitchen'], ['Services', '/services'], ['Contact', '/contact'],
                ] as [$label, $path])
                    <li class="border-b border-line">
                        <a href="{{ url($path) }}" class="group flex min-h-14 items-center justify-between font-display text-2xl transition-colors hover:text-brand-ink">
                            {{ $label }}
                            <x-ui.icon name="arrow-right" class="size-5 text-ink-soft transition group-hover:translate-x-1 group-hover:text-brand-ink" />
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
</x-layouts.app>

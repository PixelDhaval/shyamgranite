{{--
    Closing call-to-action band: rate on WhatsApp, call, or visit.
    Used at the end of every product and hub page.
--}}
@props([
    'title' => 'Ask for today’s rate',
    'text' => 'Send the stone name, size and finish you need on WhatsApp. We reply with the current rate and what is in stock.',
    'product' => null,
])

<section {{ $attributes->class(['section-y']) }} aria-labelledby="cta-band-title">
    <div class="shell">
        <div data-reveal class="relative overflow-hidden rounded-sm bg-surface-tint px-6 py-12 md:px-12 md:py-16">
            <div class="grid gap-8 lg:grid-cols-12 lg:items-end">
                <div class="flex flex-col gap-4 lg:col-span-7">
                    <h2 id="cta-band-title" data-split class="text-3xl leading-[1.1] md:text-4xl">{{ $title }}</h2>
                    <p class="max-w-[52ch] text-ink-soft">{{ $text }}</p>
                </div>
                <div class="flex flex-wrap gap-3 lg:col-span-5 lg:justify-end">
                    <x-ui.whatsapp-button :product="$product" />
                    <x-ui.button :href="'tel:'.config('site.phone.primary')" variant="secondary" icon="phone" data-track="call">
                        Call {{ config('site.phone.primary_display') }}
                    </x-ui.button>
                </div>
            </div>
        </div>
    </div>
</section>

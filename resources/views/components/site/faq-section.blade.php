{{--
    Standard FAQ section: heading left, accordion right (+ FAQPage JSON-LD).
--}}
@props(['faqs' => [], 'title' => 'Frequently asked questions'])

@if (! empty($faqs))
    <section class="section-y border-t border-line bg-surface" aria-labelledby="page-faq-title">
        <div class="shell grid gap-12 lg:grid-cols-12 lg:gap-16">
            <div class="flex flex-col gap-6 lg:col-span-4">
                <h2 id="page-faq-title" data-split class="text-3xl leading-[1.1] md:text-4xl">{{ $title }}</h2>
                <x-ui.button href="{{ url('/faq') }}" variant="link" icon-trailing="arrow-right" class="self-start" data-reveal>Read all FAQs</x-ui.button>
            </div>
            <x-ui.faq :items="$faqs" class="lg:col-span-8" />
        </div>
    </section>
@endif

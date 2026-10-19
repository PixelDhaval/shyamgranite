{{--
    FAQ accordion (native <details>, works without JavaScript) + FAQPage JSON-LD.
    Only mark up questions that are visible on the page.
    <x-ui.faq :items="[['question' => '...', 'answer' => '...']]" />
--}}
@props(['items' => [], 'schema' => true])

<div {{ $attributes->class(['divide-y divide-line border-y border-line']) }}>
    @foreach ($items as $item)
        <details data-reveal class="group" @if ($loop->first) open @endif>
            <summary class="flex min-h-14 cursor-pointer list-none items-center justify-between gap-6 py-5 text-left [&::-webkit-details-marker]:hidden">
                <span class="font-display text-xl font-medium text-ink md:text-2xl">{{ $item['question'] }}</span>
                <span class="grid size-9 shrink-0 place-items-center rounded-full border border-line text-ink-soft transition duration-200 group-open:rotate-45 group-open:border-brand group-open:text-brand-ink">
                    <x-ui.icon name="x" class="size-4 rotate-45" />
                </span>
            </summary>
            <div class="prose-stone pb-6 pr-12">
                <p>{{ $item['answer'] }}</p>
            </div>
        </details>
    @endforeach
</div>

@if ($schema && count($items))
    @php
        $faqSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => collect($items)->map(fn (array $item): array => [
                '@type' => 'Question',
                'name' => $item['question'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $item['answer']],
            ])->all(),
        ];
    @endphp

    @push('schema')
        <script type="application/ld+json">@json($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)</script>
    @endpush
@endif

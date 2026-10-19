{{--
    FAQ groups block: { type: faq-groups, groups: [{ title, items: [{question, answer}] }] }
    Topic jump links, one accordion per topic, one combined FAQPage schema.
--}}
@props(['block'])

@php
    $groups = collect($block['groups'])->map(fn (array $group): array => [...$group, 'id' => \Illuminate\Support\Str::slug($group['title'])]);

    $faqSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $groups->flatMap(fn (array $group) => $group['items'])->map(fn (array $item): array => [
            '@type' => 'Question',
            'name' => $item['question'],
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => $item['answer']],
        ])->values()->all(),
    ];
@endphp

<div class="grid gap-12 lg:grid-cols-12 lg:gap-16">
    <nav aria-label="FAQ topics" class="lg:col-span-4">
        <ul data-reveal class="flex flex-wrap gap-2 lg:sticky lg:top-28 lg:flex-col lg:gap-1">
            @foreach ($groups as $group)
                <li>
                    <a href="#{{ $group['id'] }}" class="inline-flex min-h-11 items-center rounded-sm border border-line px-4 text-sm font-medium text-ink transition-colors hover:border-brand hover:text-brand-ink lg:w-full lg:border-0 lg:px-0 lg:font-display lg:text-xl">
                        {{ $group['title'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>

    <div class="flex flex-col gap-16 lg:col-span-8">
        @foreach ($groups as $group)
            <div id="{{ $group['id'] }}" class="flex scroll-mt-28 flex-col gap-6">
                <h2 data-split class="text-3xl leading-[1.1] md:text-4xl">{{ $group['title'] }}</h2>
                <x-ui.faq :items="$group['items']" :schema="false" />
            </div>
        @endforeach
    </div>
</div>

@push('schema')
    <script type="application/ld+json">@json($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)</script>
@endpush

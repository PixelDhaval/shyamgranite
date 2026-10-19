{{--
    Prose block: { type: prose, title, body: [paragraph, ...], photo?: key }
    With a photo: text left, image right. Without: heading left, copy right.
--}}
@props(['block'])

@if (! empty($block['photo']))
    <div class="grid gap-12 lg:grid-cols-12 lg:items-center lg:gap-16">
        <div class="flex flex-col gap-6 lg:col-span-6">
            <h2 data-split class="text-3xl leading-[1.1] md:text-4xl">{{ $block['title'] }}</h2>
            <div data-reveal class="prose-stone">
                @foreach ($block['body'] as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </div>
        </div>
        <div data-reveal-image data-parallax class="overflow-hidden rounded-sm lg:col-span-6">
            <x-ui.photo :name="$block['photo']" ratio="4/3" sizes="(min-width: 1024px) 50vw, 100vw" />
        </div>
    </div>
@else
    <div class="grid gap-8 lg:grid-cols-12 lg:gap-16">
        <h2 data-split class="text-3xl leading-[1.1] md:text-4xl lg:col-span-4">{{ $block['title'] }}</h2>
        <div data-reveal class="prose-stone text-[1.0625rem] lg:col-span-8">
            @foreach ($block['body'] as $paragraph)
                <p>{{ $paragraph }}</p>
            @endforeach
        </div>
    </div>
@endif

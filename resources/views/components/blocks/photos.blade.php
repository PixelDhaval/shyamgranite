{{--
    Photos block: { type: photos, title?, items: [photo key, ...] }
    Asymmetric grid: the first photo is large.
--}}
@props(['block'])

<div class="flex flex-col gap-10">
    @isset($block['title'])
        <x-ui.section-heading :title="$block['title']" :intro="$block['intro'] ?? null" />
    @endisset

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        @foreach ($block['items'] as $photo)
            <div data-reveal-image @class([
                'overflow-hidden rounded-sm',
                'sm:col-span-2 sm:row-span-2' => $loop->first,
            ])>
                <x-ui.photo :name="$photo" ratio="1/1" :sizes="$loop->first ? '(min-width: 1024px) 50vw, 100vw' : '(min-width: 1024px) 25vw, 50vw'" />
            </div>
        @endforeach
    </div>
</div>

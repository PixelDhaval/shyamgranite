{{--
    Features block: { type: features, title, intro?, items: [{ title, text, icon? }] }
    Two-column list separated by hairlines; icons from resources/svg/icons.
--}}
@props(['block'])

<div class="flex flex-col gap-12">
    <x-ui.section-heading :title="$block['title']" :intro="$block['intro'] ?? null" />

    <ul class="grid gap-x-12 gap-y-10 md:grid-cols-2">
        @foreach ($block['items'] as $item)
            <li data-reveal class="flex gap-5 border-t border-line pt-6">
                <span class="grid size-11 shrink-0 place-items-center rounded-full bg-surface-tint text-brand-ink">
                    <x-ui.icon :name="$item['icon'] ?? 'check'" class="size-5" />
                </span>
                <div class="flex flex-col gap-2">
                    <h3 class="text-2xl leading-tight">{{ $item['title'] }}</h3>
                    <p class="text-[0.9375rem] text-ink-soft">{{ $item['text'] }}</p>
                </div>
            </li>
        @endforeach
    </ul>
</div>

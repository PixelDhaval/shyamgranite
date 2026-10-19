{{--
    Callout block: { type: callout, title?, text, icon? } for an important note.
--}}
@props(['block'])

<div data-reveal class="mx-auto flex max-w-3xl gap-5 rounded-sm bg-surface-tint p-6 md:p-8">
    <span class="grid size-11 shrink-0 place-items-center rounded-full bg-surface text-brand-ink">
        <x-ui.icon :name="$block['icon'] ?? 'seal-check'" class="size-5" />
    </span>
    <div class="flex flex-col gap-2">
        @isset($block['title'])
            <h2 class="text-2xl leading-tight">{{ $block['title'] }}</h2>
        @endisset
        <p class="text-ink-soft">{{ $block['text'] }}</p>
    </div>
</div>

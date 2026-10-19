{{--
    Full-width mega panel under the sticky header: link columns on the left,
    one photo-led feature on the right. Positioned against <header>.
--}}
@props(['id', 'item'])

@php
    $columns = $item['mega']['columns'];
    $feature = $item['mega']['feature'];
    $gridColumns = match (count($columns)) {
        1 => 'grid-cols-1',
        2 => 'grid-cols-2',
        default => 'grid-cols-3',
    };
@endphp

<div id="{{ $id }}" data-nav-panel hidden class="absolute inset-x-0 top-full">
    <div class="border-y border-line bg-surface shadow-2xl shadow-shadow">
        <div class="shell grid grid-cols-12 gap-12 py-10">
            <div class="col-span-8 grid {{ $gridColumns }} gap-10">
                @foreach ($columns as $column)
                    <div data-nav-column class="flex flex-col gap-4">
                        <a href="{{ url($column['url']) }}" class="font-display text-xl font-semibold text-ink transition-colors hover:text-brand-ink">
                            {{ $column['title'] }}
                        </a>
                        <ul class="flex flex-col gap-0.5">
                            @foreach ($column['links'] as $link)
                                <li>
                                    <a href="{{ url($link['url']) }}" class="-mx-2 flex min-h-9 items-center rounded-sm px-2 text-sm text-ink-soft transition-colors hover:bg-surface-tint hover:text-ink">
                                        {{ $link['label'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        @isset($column['note'])
                            <p class="max-w-[32ch] text-[0.8125rem] leading-relaxed text-ink-soft">{{ $column['note'] }}</p>
                        @endisset
                    </div>
                @endforeach
            </div>

            <a href="{{ url($feature['url']) }}" data-nav-column class="group col-span-4 flex flex-col gap-4 border-l border-line pl-12">
                <div class="overflow-hidden rounded-sm">
                    <x-ui.photo :name="$feature['photo']" ratio="16/10" sizes="400px" class="transition-transform duration-700 ease-out-soft group-hover:scale-[1.03]" />
                </div>
                <div class="flex flex-col gap-1.5">
                    <span class="font-display text-2xl font-medium text-ink">{{ $feature['title'] }}</span>
                    <span class="text-sm text-ink-soft">{{ $feature['text'] }}</span>
                    <span class="mt-2 inline-flex items-center gap-2 text-sm font-semibold text-brand-ink">
                        Explore
                        <x-ui.icon name="arrow-right" class="size-4 transition-transform duration-200 group-hover:translate-x-0.5" />
                    </span>
                </div>
            </a>
        </div>
    </div>
</div>

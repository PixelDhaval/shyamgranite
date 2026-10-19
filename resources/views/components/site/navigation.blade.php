{{--
    Desktop primary navigation (xl and up). Items with a "mega" key open a
    full-width panel, items with a "dropdown" key open a compact list.
    Disclosure pattern: each trigger is a <button aria-expanded>, the panels
    hold real links so crawlers and keyboard users reach every page.
    Behaviour lives in resources/js/navigation.js.
--}}
@php
    $currentPath = '/'.trim(request()->path(), '/');
@endphp

<nav aria-label="Main" data-nav {{ $attributes }}>
    <ul class="flex items-center gap-0.5">
        @foreach (config('navigation.main') as $item)
            @php
                $isCurrent = $item['url'] === '/'
                    ? $currentPath === '/'
                    : str_starts_with($currentPath, $item['url']);
                $panelId = 'nav-panel-'.\Illuminate\Support\Str::slug($item['label']);
            @endphp

            <li @class(['relative' => isset($item['dropdown'])]) data-nav-item>
                @if (isset($item['mega']) || isset($item['dropdown']))
                    <button
                        type="button"
                        data-nav-trigger
                        aria-expanded="false"
                        aria-controls="{{ $panelId }}"
                        @class([
                            'group/trigger flex h-11 cursor-pointer items-center gap-1.5 rounded-sm px-2.5 text-sm font-medium transition-colors hover:text-brand-ink aria-expanded:text-brand-ink',
                            'text-brand-ink' => $isCurrent,
                            'text-ink' => ! $isCurrent,
                        ])
                    >
                        {{ $item['label'] }}
                        <x-ui.icon name="caret-down" class="size-3.5 transition-transform duration-200 group-aria-expanded/trigger:rotate-180" />
                    </button>
                @else
                    <a
                        href="{{ url($item['url']) }}"
                        @if ($isCurrent) aria-current="page" @endif
                        @class([
                            'flex h-11 items-center rounded-sm px-2.5 text-sm font-medium transition-colors hover:text-brand-ink',
                            'text-brand-ink' => $isCurrent,
                            'text-ink' => ! $isCurrent,
                        ])
                    >{{ $item['label'] }}</a>
                @endif

                @isset($item['mega'])
                    <x-site.mega-menu :id="$panelId" :item="$item" />
                @endisset

                @isset($item['dropdown'])
                    <div id="{{ $panelId }}" data-nav-panel hidden class="absolute left-1/2 top-full w-80 -translate-x-1/2 pt-3">
                        <ul class="rounded-sm border border-line bg-surface p-2 shadow-xl shadow-shadow">
                            @foreach ($item['dropdown'] as $link)
                                <li>
                                    <a href="{{ url($link['url']) }}" class="flex flex-col gap-0.5 rounded-sm px-4 py-3 transition-colors hover:bg-surface-tint">
                                        <span class="text-sm font-semibold text-ink">{{ $link['label'] }}</span>
                                        <span class="text-[0.8125rem] text-ink-soft">{{ $link['text'] }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endisset
            </li>
        @endforeach
    </ul>
</nav>

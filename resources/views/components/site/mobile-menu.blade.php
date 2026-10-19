{{--
    Mobile and tablet menu (below xl). Native <dialog> gives focus
    containment, Escape-to-close and an inert page behind it; sections are
    <details> accordions so they work without JavaScript once open.
--}}
<dialog
    id="mobile-menu"
    data-mobile-menu
    aria-label="Menu"
    class="m-0 ml-auto h-dvh max-h-none w-full max-w-md bg-surface p-0 text-ink backdrop:bg-stone-950/50 backdrop:backdrop-blur-sm open:animate-[menu-in_0.35s_var(--ease-out-soft)]"
>
    <div class="flex h-full flex-col">
        <div class="flex h-18 shrink-0 items-center justify-between border-b border-line px-4 sm:px-6">
            <a href="{{ url('/') }}" aria-label="{{ config('site.name') }} home">
                <x-site.logo class="h-12" />
            </a>
            <button type="button" data-mobile-menu-close autofocus class="grid size-12 cursor-pointer place-items-center rounded-sm transition-colors hover:bg-surface-muted">
                <x-ui.icon name="x" class="size-6" />
                <span class="sr-only">Close menu</span>
            </button>
        </div>

        <nav aria-label="Mobile" class="flex-1 overflow-y-auto overscroll-contain px-4 py-4 sm:px-6">
            <ul class="divide-y divide-line">
                @foreach (config('navigation.main') as $item)
                    <li data-menu-row>
                        @if (isset($item['mega']) || isset($item['dropdown']))
                            <details class="group">
                                <summary class="flex min-h-14 cursor-pointer list-none items-center justify-between font-display text-2xl font-medium [&::-webkit-details-marker]:hidden">
                                    {{ $item['label'] }}
                                    <x-ui.icon name="caret-down" class="size-5 text-ink-soft transition-transform duration-200 group-open:rotate-180" />
                                </summary>

                                <div class="flex flex-col gap-6 pb-6 pt-1">
                                    @isset($item['mega'])
                                        <a href="{{ url($item['mega']['feature']['url']) }}" class="inline-flex min-h-11 items-center gap-2 text-sm font-semibold text-brand-ink">
                                            {{ $item['mega']['feature']['title'] }}
                                            <x-ui.icon name="arrow-right" class="size-4" />
                                        </a>

                                        @foreach ($item['mega']['columns'] as $column)
                                            <div class="flex flex-col gap-1">
                                                <a href="{{ url($column['url']) }}" class="text-xs font-semibold uppercase tracking-[0.14em] text-ink-soft">{{ $column['title'] }}</a>
                                                <ul class="grid grid-cols-2 gap-x-4">
                                                    @foreach ($column['links'] as $link)
                                                        <li>
                                                            <a href="{{ url($link['url']) }}" class="flex min-h-11 items-center text-[0.9375rem] text-ink">{{ $link['label'] }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endforeach
                                    @endisset

                                    @isset($item['dropdown'])
                                        <ul class="flex flex-col">
                                            @foreach ($item['dropdown'] as $link)
                                                <li>
                                                    <a href="{{ url($link['url']) }}" class="flex min-h-11 flex-col justify-center py-1.5">
                                                        <span class="text-[0.9375rem] font-medium text-ink">{{ $link['label'] }}</span>
                                                        <span class="text-[0.8125rem] text-ink-soft">{{ $link['text'] }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endisset
                                </div>
                            </details>
                        @else
                            <a href="{{ url($item['url']) }}" class="flex min-h-14 items-center font-display text-2xl font-medium">{{ $item['label'] }}</a>
                        @endif
                    </li>
                @endforeach
            </ul>
        </nav>

        <div data-menu-row class="flex shrink-0 flex-col gap-3 border-t border-line bg-surface-muted px-4 py-5 pb-[max(1.25rem,env(safe-area-inset-bottom))] sm:px-6">
            <x-ui.whatsapp-button class="w-full" />
            <x-ui.button :href="'tel:'.config('site.phone.primary')" variant="secondary" icon="phone" class="w-full" data-track="call">
                Call {{ config('site.phone.primary_display') }}
            </x-ui.button>
        </div>
    </div>
</dialog>

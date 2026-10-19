{{--
    Renders a page's content blocks (pages.content.blocks) in order.
    Each block is an array with a "type" key; see the matching component
    in resources/views/components/blocks for its fields. Sections alternate
    canvas / surface backgrounds for rhythm.
--}}
@props(['blocks' => [], 'offset' => 0])

@foreach ($blocks as $block)
    @php
        $surface = ($loop->index + $offset) % 2 === 1;
    @endphp

    <section @class([
        'section-y border-t border-line',
        'bg-surface' => $surface,
    ])>
        <div class="shell">
            @switch($block['type'])
                @case('prose')
                    <x-blocks.prose :block="$block" />
                    @break
                @case('features')
                    <x-blocks.features :block="$block" />
                    @break
                @case('table')
                    <x-blocks.table :block="$block" />
                    @break
                @case('chips')
                    <x-blocks.chips :block="$block" />
                    @break
                @case('links')
                    <x-blocks.links :block="$block" />
                    @break
                @case('callout')
                    <x-blocks.callout :block="$block" />
                    @break
                @case('photos')
                    <x-blocks.photos :block="$block" />
                    @break
                @case('locations')
                    <x-blocks.locations :block="$block" />
                    @break
                @case('contact')
                    <x-blocks.contact :block="$block" />
                    @break
                @case('faq-groups')
                    <x-blocks.faq-groups :block="$block" />
                    @break
            @endswitch
        </div>
    </section>
@endforeach

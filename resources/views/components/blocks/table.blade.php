{{--
    Table block: { type: table, title, intro?, head: [..], rows: [[..], ..] }
    The first column is the row label. Scrolls sideways on small screens.
--}}
@props(['block'])

<div class="flex flex-col gap-10">
    <x-ui.section-heading :title="$block['title']" :intro="$block['intro'] ?? null" />

    <div data-reveal class="overflow-x-auto rounded-sm border border-line bg-surface">
        <table class="w-full min-w-[36rem] text-left text-[0.9375rem]">
            <thead class="bg-surface-muted text-xs font-semibold uppercase tracking-[0.12em] text-ink-soft">
                <tr>
                    @foreach ($block['head'] as $heading)
                        <th scope="col" class="px-5 py-4 font-semibold">{{ $heading }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="divide-y divide-line">
                @foreach ($block['rows'] as $row)
                    <tr class="align-top">
                        @foreach ($row as $cell)
                            @if ($loop->first)
                                <th scope="row" class="px-5 py-4 font-semibold text-ink">{{ $cell }}</th>
                            @else
                                <td class="px-5 py-4 text-ink-soft">{{ $cell }}</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

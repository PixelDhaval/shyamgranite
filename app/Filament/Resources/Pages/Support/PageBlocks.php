<?php

namespace App\Filament\Resources\Pages\Support;

use App\Models\Page;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

/**
 * Builder blocks for page content, one per front-end block component in
 * resources/views/components/blocks, plus conversion between the flat
 * block format stored in pages.content.blocks and Filament's builder state.
 */
class PageBlocks
{
    /**
     * @return list<Block>
     */
    public static function blocks(): array
    {
        return [
            Block::make('prose')
                ->label(fn (?array $state): string => self::label('Text', $state))
                ->icon('heroicon-o-bars-3-bottom-left')
                ->schema([
                    TextInput::make('title')->required()->live(onBlur: true),
                    Repeater::make('body')
                        ->label('Paragraphs')
                        ->simple(Textarea::make('paragraph')->rows(3)->required())
                        ->addActionLabel('Add paragraph')
                        ->defaultItems(1)
                        ->reorderable(),
                    self::photoSelect('photo')->helperText('Optional. Shown beside the text.'),
                ]),

            Block::make('features')
                ->label(fn (?array $state): string => self::label('Feature list', $state))
                ->icon('heroicon-o-squares-2x2')
                ->schema([
                    TextInput::make('title')->required()->live(onBlur: true),
                    Textarea::make('intro')->rows(2),
                    Repeater::make('items')
                        ->schema([
                            TextInput::make('title')->required(),
                            self::iconSelect(),
                            Textarea::make('text')->rows(2)->required()->columnSpanFull(),
                        ])
                        ->columns(2)
                        ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                        ->addActionLabel('Add item')
                        ->collapsible(),
                ]),

            Block::make('table')
                ->label(fn (?array $state): string => self::label('Table', $state))
                ->icon('heroicon-o-table-cells')
                ->schema([
                    TextInput::make('title')->required()->live(onBlur: true),
                    Textarea::make('intro')->rows(2),
                    TextInput::make('head')
                        ->label('Column headings')
                        ->helperText('Separate columns with | for example: Finish | Look | Good for')
                        ->required(),
                    Textarea::make('rows')
                        ->label('Rows')
                        ->helperText('One row per line, columns separated by |. The first column is the row label.')
                        ->rows(8)
                        ->required(),
                ]),

            Block::make('chips')
                ->label(fn (?array $state): string => self::label('Tags', $state))
                ->icon('heroicon-o-tag')
                ->schema([
                    TextInput::make('title')->required()->live(onBlur: true),
                    Textarea::make('intro')->rows(2),
                    TagsInput::make('items')->required(),
                ]),

            Block::make('links')
                ->label(fn (?array $state): string => self::label('Page cards', $state))
                ->icon('heroicon-o-link')
                ->schema([
                    TextInput::make('title')->required()->live(onBlur: true),
                    Textarea::make('intro')->rows(2),
                    self::pageSelect('paths')->label('Pages')->required(),
                ]),

            Block::make('callout')
                ->label(fn (?array $state): string => self::label('Callout', $state))
                ->icon('heroicon-o-megaphone')
                ->schema([
                    TextInput::make('title')->live(onBlur: true),
                    Textarea::make('text')->rows(3)->required(),
                    self::iconSelect(),
                ]),

            Block::make('photos')
                ->label(fn (?array $state): string => self::label('Photo grid', $state))
                ->icon('heroicon-o-photo')
                ->schema([
                    TextInput::make('title')->live(onBlur: true),
                    Textarea::make('intro')->rows(2),
                    self::photoSelect('items')->multiple()->required()->label('Photos'),
                ]),

            Block::make('locations')
                ->label(fn (?array $state): string => self::label('Showroom & workshop', $state))
                ->icon('heroicon-o-map-pin')
                ->schema([
                    TextInput::make('title')->required()->live(onBlur: true),
                    Textarea::make('intro')->rows(2),
                ]),

            Block::make('contact')
                ->label(fn (?array $state): string => self::label('Contact methods & maps', $state))
                ->icon('heroicon-o-phone')
                ->schema([
                    TextInput::make('title')->required()->live(onBlur: true),
                    Textarea::make('intro')->rows(2),
                ]),

            Block::make('enquiry-form')
                ->label(fn (?array $state): string => self::label('Enquiry form', $state))
                ->icon('heroicon-o-envelope')
                ->schema([
                    TextInput::make('title')->required()->live(onBlur: true),
                    Textarea::make('intro')->rows(2),
                ]),

            Block::make('faq-groups')
                ->label(fn (?array $state): string => self::label('FAQ groups', $state))
                ->icon('heroicon-o-question-mark-circle')
                ->schema([
                    Repeater::make('groups')
                        ->schema([
                            TextInput::make('title')->required(),
                            Repeater::make('items')
                                ->label('Questions')
                                ->schema([
                                    TextInput::make('question')->required(),
                                    Textarea::make('answer')->rows(3)->required(),
                                ])
                                ->itemLabel(fn (array $state): ?string => $state['question'] ?? null)
                                ->addActionLabel('Add question')
                                ->collapsible()
                                ->collapsed(),
                        ])
                        ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                        ->addActionLabel('Add group')
                        ->collapsible(),
                ]),
        ];
    }

    /**
     * Stored blocks -> builder state.
     *
     * @param  list<array<string, mixed>>  $blocks
     * @return list<array{type: string, data: array<string, mixed>}>
     */
    public static function toBuilder(array $blocks): array
    {
        return array_map(function (array $block): array {
            $data = $block;
            unset($data['type']);

            if ($block['type'] === 'table') {
                $data['head'] = implode(' | ', $block['head'] ?? []);
                $data['rows'] = collect($block['rows'] ?? [])->map(fn (array $row): string => implode(' | ', $row))->implode("\n");
            }

            return ['type' => $block['type'], 'data' => $data];
        }, $blocks);
    }

    /**
     * Builder state -> stored blocks.
     *
     * @param  array<array-key, array{type: string, data?: array<string, mixed>}>  $items
     * @return list<array<string, mixed>>
     */
    public static function fromBuilder(array $items): array
    {
        return collect($items)->values()->map(function (array $item): array {
            $data = $item['data'] ?? [];

            if ($item['type'] === 'table') {
                $data['head'] = self::splitCells($data['head'] ?? '');
                $data['rows'] = collect(preg_split('/\R/', $data['rows'] ?? ''))
                    ->filter(fn (string $line): bool => trim($line) !== '')
                    ->map(fn (string $line): array => self::splitCells($line))
                    ->values()
                    ->all();
            }

            $data = array_filter($data, fn (mixed $value): bool => $value !== null && $value !== '' && $value !== []);

            return ['type' => $item['type'], ...$data];
        })->all();
    }

    public static function photoSelect(string $name): Select
    {
        return Select::make($name)
            ->options(fn (): array => collect(config('photos'))
                ->mapWithKeys(fn (array $photo, string $key): array => [$key => "{$key}: {$photo['alt']}"])
                ->all())
            ->searchable();
    }

    public static function pageSelect(string $name): Select
    {
        return Select::make($name)
            ->multiple()
            ->searchable()
            ->options(fn (): array => Page::query()
                ->orderBy('path')
                ->get(['name', 'path'])
                ->mapWithKeys(fn (Page $page): array => [$page->path => "{$page->name} (/{$page->path})"])
                ->all());
    }

    public static function iconSelect(): Select
    {
        return Select::make('icon')
            ->options(fn (): array => collect(glob(resource_path('svg/icons/*.svg')))
                ->map(fn (string $path): string => basename($path, '.svg'))
                ->mapWithKeys(fn (string $icon): array => [$icon => $icon])
                ->all())
            ->placeholder('Default');
    }

    /**
     * @return list<string>
     */
    private static function splitCells(string $line): array
    {
        return array_values(array_map('trim', explode('|', $line)));
    }

    private static function label(string $type, ?array $state): string
    {
        if ($state === null || blank($state['title'] ?? null)) {
            return $type;
        }

        return "{$type}: {$state['title']}";
    }
}

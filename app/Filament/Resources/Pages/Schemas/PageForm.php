<?php

namespace App\Filament\Resources\Pages\Schemas;

use App\Filament\Resources\Pages\Support\PageBlocks;
use App\Models\Page;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

/**
 * Form for a website page. Fields named content.* map onto the page's
 * "content" JSON; see design-system/shyam-granite/MASTER.md §6b.
 */
class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Page')
                    ->persistTabInQueryString()
                    ->columnSpanFull()
                    ->tabs([
                        self::contentTab(),
                        self::varietyTab(),
                        self::seoTab(),
                        self::settingsTab(),
                    ]),
            ]);
    }

    private static function contentTab(): Tab
    {
        return Tab::make('Content')
            ->icon('heroicon-o-document-text')
            ->schema([
                Grid::make(2)->schema([
                    TextInput::make('name')
                        ->label('Short name')
                        ->helperText('Used in menus, breadcrumbs and cards, e.g. "Black Galaxy".')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('title')
                        ->label('Heading (H1)')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('path')
                        ->label('URL path')
                        ->prefix(url('/').'/')
                        ->helperText('Lowercase words and hyphens, e.g. granite/black-galaxy')
                        ->required()
                        ->regex('/^[a-z0-9\-]+(\/[a-z0-9\-]+)*$/')
                        ->unique(ignoreRecord: true)
                        ->maxLength(255),
                    Select::make('parent_id')
                        ->label('Parent page')
                        ->helperText('Controls the breadcrumb and where the page is listed.')
                        ->relationship('parent', 'name', fn ($query) => $query->orderBy('path'))
                        ->getOptionLabelFromRecordUsing(fn (Page $record): string => "{$record->name} (/{$record->path})")
                        ->searchable()
                        ->preload(),
                    Select::make('template')
                        ->options([
                            'page' => 'Content page',
                            'collection' => 'Collection (lists child pages)',
                            'variety' => 'Stone colour',
                        ])
                        ->default('page')
                        ->required()
                        ->live(),
                    PageBlocks::photoSelect('photo')
                        ->label('Main photo')
                        ->helperText('Photos are listed in config/photos.php.'),
                ]),
                Textarea::make('intro')
                    ->label('Introduction')
                    ->helperText('The paragraph under the heading.')
                    ->rows(3),
                TextInput::make('summary')
                    ->label('Card text')
                    ->helperText('Short line shown when this page appears as a card.')
                    ->maxLength(255),

                Section::make('Listing')
                    ->description('Heading above the list of child pages.')
                    ->visible(fn (Get $get): bool => $get('template') === 'collection')
                    ->schema([
                        TextInput::make('content.range_title')->label('List heading')->placeholder('Explore the range'),
                        Textarea::make('content.range_intro')->label('List introduction')->rows(2),
                    ])
                    ->columns(2),

                Builder::make('content.blocks')
                    ->label('Sections')
                    ->blocks(PageBlocks::blocks())
                    ->addActionLabel('Add section')
                    ->blockNumbers(false)
                    ->collapsible()
                    ->collapsed()
                    ->cloneable()
                    ->searchable(),

                Repeater::make('faqs')
                    ->label('FAQs')
                    ->helperText('Shown at the end of the page and marked up for Google.')
                    ->schema([
                        TextInput::make('question')->required(),
                        Textarea::make('answer')->rows(3)->required(),
                    ])
                    ->itemLabel(fn (array $state): ?string => $state['question'] ?? null)
                    ->addActionLabel('Add FAQ')
                    ->collapsible()
                    ->collapsed()
                    ->defaultItems(0),
            ]);
    }

    private static function varietyTab(): Tab
    {
        return Tab::make('Stone details')
            ->icon('heroicon-o-swatch')
            ->visible(fn (Get $get): bool => $get('template') === 'variety')
            ->schema([
                Grid::make(2)->schema([
                    TextInput::make('content.specs.material')->label('Material')->placeholder('Granite'),
                    TextInput::make('content.specs.origin')->label('Origin')->helperText('Leave blank to show "Ask us about the current lot".'),
                    TextInput::make('content.specs.colour')->label('Colour'),
                    TextInput::make('content.specs.sizes')->label('Thickness & sizes')->helperText('Leave blank to show "Ask for the slabs in stock today".'),
                    TagsInput::make('content.specs.aka')->label('Also called'),
                    TagsInput::make('content.specs.finishes')->label('Finishes'),
                ]),
                TagsInput::make('content.specs.uses')->label('Best used for'),
                Repeater::make('content.body')
                    ->label('Description paragraphs')
                    ->simple(Textarea::make('paragraph')->rows(3)->required())
                    ->addActionLabel('Add paragraph')
                    ->defaultItems(1),
                Textarea::make('content.pairs')->label('Pairs well with')->rows(2),
                PageBlocks::pageSelect('content.similar')
                    ->label('Similar colours')
                    ->helperText('Leave empty to show other colours from the same parent page.'),
            ]);
    }

    private static function seoTab(): Tab
    {
        return Tab::make('SEO')
            ->icon('heroicon-o-magnifying-glass')
            ->schema([
                TextInput::make('seo_title')
                    ->label('Page title')
                    ->helperText('Shown in Google results. Up to 60 characters.')
                    ->maxLength(60)
                    ->live(onBlur: true)
                    ->hint(fn (?string $state): string => mb_strlen((string) $state).' / 60'),
                Textarea::make('meta_description')
                    ->helperText('Up to 155 characters. Never include prices.')
                    ->maxLength(155)
                    ->rows(3)
                    ->live(onBlur: true)
                    ->hint(fn (?string $state): string => mb_strlen((string) $state).' / 155'),
                Toggle::make('noindex')
                    ->label('Hide from search engines')
                    ->helperText('Adds noindex and removes the page from sitemap.xml.'),
            ]);
    }

    private static function settingsTab(): Tab
    {
        return Tab::make('Settings')
            ->icon('heroicon-o-cog-6-tooth')
            ->schema([
                Grid::make(3)->schema([
                    Toggle::make('is_published')->label('Published')->default(true),
                    Toggle::make('is_featured')->label('Featured'),
                    TextInput::make('sort')->numeric()->default(0)->helperText('Lower numbers are listed first.'),
                ]),
                Section::make('Call to action')
                    ->schema([
                        TextInput::make('content.product')
                            ->label('Product name in the WhatsApp message')
                            ->helperText('Defaults to the page name.'),
                        Toggle::make('content.generic_cta')
                            ->label('Use a general message instead')
                            ->helperText('For pages that are not about one product, such as About or Contact.'),
                        Toggle::make('content.hide_cta')->label('Hide the closing call-to-action band'),
                    ]),
                Section::make('Structured data')
                    ->schema([
                        Select::make('content.schema')
                            ->label('Schema type')
                            ->helperText('Collections and stone colours are marked up automatically.')
                            ->options([
                                'service' => 'Service',
                                'area' => 'Area served',
                                'about' => 'About page',
                                'contact' => 'Contact page',
                            ])
                            ->placeholder('None'),
                        Toggle::make('content.local_business')->label('Add the business details (LocalBusiness)'),
                    ]),
            ]);
    }
}

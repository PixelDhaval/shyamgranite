<?php

namespace App\Filament\Resources\MailTemplates\Schemas;

use App\Models\MailTemplate;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MailTemplateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->columnSpanFull()
                    ->schema([
                        Section::make('Email')
                            ->description(fn (?MailTemplate $record): ?string => $record?->description)
                            ->columnSpan(2)
                            ->schema([
                                Toggle::make('is_enabled')
                                    ->label('Send this email')
                                    ->helperText('Turn off to stop sending it without losing the text.'),
                                TextInput::make('subject')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('heading')
                                    ->helperText('Large heading at the top of the email. Optional.')
                                    ->maxLength(255),
                                MarkdownEditor::make('body')
                                    ->required()
                                    ->toolbarButtons([
                                        ['bold', 'italic', 'link'],
                                        ['heading', 'bulletList', 'orderedList'],
                                        ['undo', 'redo'],
                                    ]),
                            ]),
                        Section::make('Placeholders')
                            ->description('Type these in the subject, heading or body. They are replaced when the email is sent.')
                            ->columnSpan(1)
                            ->schema([
                                ...collect(MailTemplate::PLACEHOLDERS)
                                    ->map(fn (string $description, string $key): TextEntry => TextEntry::make("placeholder_{$key}")
                                        ->label('{'.$key.'}')
                                        ->state($description)
                                        ->copyable()
                                        ->copyableState('{'.$key.'}'))
                                    ->values()
                                    ->all(),
                            ]),
                    ]),
            ]);
    }
}

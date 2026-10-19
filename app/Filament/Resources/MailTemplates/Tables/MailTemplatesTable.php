<?php

namespace App\Filament\Resources\MailTemplates\Tables;

use App\Models\MailTemplate;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class MailTemplatesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->paginated(false)
            ->columns([
                TextColumn::make('name')
                    ->description(fn (MailTemplate $record): ?string => $record->description)
                    ->wrap(),
                TextColumn::make('subject'),
                ToggleColumn::make('is_enabled')
                    ->label('Sending'),
                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->since(),
            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}

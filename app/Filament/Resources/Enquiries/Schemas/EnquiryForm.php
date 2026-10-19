<?php

namespace App\Filament\Resources\Enquiries\Schemas;

use App\Enums\EnquiryStatus;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

/**
 * Staff can only change the follow-up status and their own notes;
 * what the customer sent stays as submitted.
 */
class EnquiryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Follow-up')
                    ->columnSpanFull()
                    ->schema([
                        ToggleButtons::make('status')
                            ->options(EnquiryStatus::class)
                            ->inline()
                            ->required(),
                        Textarea::make('notes')
                            ->label('Internal notes')
                            ->helperText('Only visible in the admin panel.')
                            ->rows(5),
                    ]),
            ]);
    }
}

<?php

namespace App\Filament\Resources\Enquiries\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EnquiryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->columnSpanFull()
                    ->schema([
                        Section::make('Enquiry')
                            ->columnSpan(2)
                            ->columns(2)
                            ->schema([
                                TextEntry::make('name'),
                                TextEntry::make('phone')
                                    ->copyable()
                                    ->url(fn ($record): string => 'tel:'.$record->phone),
                                TextEntry::make('email')
                                    ->placeholder('Not given')
                                    ->copyable(),
                                TextEntry::make('town')
                                    ->placeholder('Not given'),
                                TextEntry::make('interested_in')
                                    ->placeholder('Not given')
                                    ->columnSpanFull(),
                                TextEntry::make('message')
                                    ->columnSpanFull()
                                    ->prose(),
                            ]),
                        Section::make('Details')
                            ->columnSpan(1)
                            ->schema([
                                TextEntry::make('status')
                                    ->badge(),
                                TextEntry::make('created_at')
                                    ->label('Received')
                                    ->dateTime('j M Y, g:i A', config('site.timezone')),
                                TextEntry::make('admin_notified_at')
                                    ->label('Admin email sent')
                                    ->dateTime('j M Y, g:i A', config('site.timezone'))
                                    ->placeholder('Not sent'),
                                TextEntry::make('customer_notified_at')
                                    ->label('Customer email sent')
                                    ->dateTime('j M Y, g:i A', config('site.timezone'))
                                    ->placeholder('Not sent'),
                                TextEntry::make('source_url')
                                    ->label('Sent from')
                                    ->url(fn (?string $state): ?string => $state)
                                    ->openUrlInNewTab(),
                                TextEntry::make('notes')
                                    ->label('Internal notes')
                                    ->placeholder('No notes yet'),
                            ]),
                    ]),
            ]);
    }
}

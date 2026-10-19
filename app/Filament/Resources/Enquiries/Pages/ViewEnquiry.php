<?php

namespace App\Filament\Resources\Enquiries\Pages;

use App\Filament\Resources\Enquiries\EnquiryResource;
use App\Models\Enquiry;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewEnquiry extends ViewRecord
{
    protected static string $resource = EnquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('whatsapp')
                ->label('WhatsApp')
                ->icon('heroicon-o-chat-bubble-left-right')
                ->color('success')
                ->url(fn (Enquiry $record): string => $record->whatsappUrl())
                ->openUrlInNewTab(),
            Action::make('call')
                ->icon('heroicon-o-phone')
                ->color('gray')
                ->url(fn (Enquiry $record): string => 'tel:'.$record->phone),
            Action::make('email')
                ->icon('heroicon-o-envelope')
                ->color('gray')
                ->visible(fn (Enquiry $record): bool => filled($record->email))
                ->url(fn (Enquiry $record): string => 'mailto:'.$record->email),
            EditAction::make()->label('Update status'),
        ];
    }
}

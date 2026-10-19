<?php

namespace App\Filament\Resources\MailTemplates\Pages;

use App\Filament\Pages\MailSettings;
use App\Filament\Resources\MailTemplates\MailTemplateResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;

class ListMailTemplates extends ListRecords
{
    protected static string $resource = MailTemplateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('settings')
                ->label('Mail settings')
                ->icon('heroicon-o-cog-6-tooth')
                ->color('gray')
                ->url(MailSettings::getUrl()),
        ];
    }
}

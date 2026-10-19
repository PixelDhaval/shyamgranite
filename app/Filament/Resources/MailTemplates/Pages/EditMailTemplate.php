<?php

namespace App\Filament\Resources\MailTemplates\Pages;

use App\Filament\Resources\MailTemplates\MailTemplateResource;
use App\Mail\TemplatedMail;
use App\Models\MailTemplate;
use App\Support\MailSettings;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Mail;
use Throwable;

class EditMailTemplate extends EditRecord
{
    protected static string $resource = MailTemplateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('sendTest')
                ->label('Send test email')
                ->icon('heroicon-o-paper-airplane')
                ->color('gray')
                ->modalDescription('Sends the saved version of this template with sample enquiry details. Save your changes first.')
                ->schema([
                    TextInput::make('to')
                        ->label('Send to')
                        ->email()
                        ->required()
                        ->default(fn (): ?string => auth()->user()?->email),
                ])
                ->action(function (array $data, MailTemplate $record): void {
                    try {
                        MailSettings::apply();
                        Mail::to($data['to'])->send(new TemplatedMail($record->fresh(), self::sampleValues()));

                        Notification::make()->success()->title('Test email sent to '.$data['to'])->send();
                    } catch (Throwable $exception) {
                        report($exception);

                        Notification::make()
                            ->danger()
                            ->title('The test email could not be sent')
                            ->body($exception->getMessage())
                            ->persistent()
                            ->send();
                    }
                }),
        ];
    }

    /**
     * @return array<string, string>
     */
    public static function sampleValues(): array
    {
        return [
            'name' => 'Asha Patel',
            'phone' => '+91 98765 43210',
            'email' => 'asha@example.com',
            'town' => 'Gandhidham',
            'interested_in' => 'Black Galaxy granite for a kitchen platform',
            'message' => "Hello, I need a kitchen platform about 10 ft long with a sink cut-out.\nPlease share today’s rate.",
            'source_url' => url('/contact'),
            'submitted_at' => now(config('site.timezone'))->format('j M Y, g:i A'),
        ];
    }
}

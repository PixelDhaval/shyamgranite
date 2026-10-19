<?php

namespace App\Filament\Pages;

use App\Mail\TemplatedMail;
use App\Models\MailTemplate;
use App\Support\MailSettings as MailSettingsStore;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\EmbeddedSchema;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Mail;
use Throwable;
use UnitEnum;

/**
 * SMTP server, sender details and admin recipients for the contact-form
 * emails. Stored via App\Support\MailSettings (password encrypted).
 *
 * @property-read Schema $form
 */
class MailSettings extends Page
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedServerStack;

    protected static string|UnitEnum|null $navigationGroup = 'Contact form';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationLabel = 'Mail settings';

    protected static ?string $title = 'Mail settings';

    /**
     * @var array<string, mixed>|null
     */
    public ?array $data = [];

    public function mount(): void
    {
        $settings = MailSettingsStore::get();

        $this->form->fill([
            ...$settings,
            'password' => null,
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                Section::make('Who gets the enquiry emails')
                    ->description('Every new contact-form enquiry is emailed to these addresses.')
                    ->schema([
                        TagsInput::make('admin_recipients')
                            ->label('Admin email addresses')
                            ->placeholder('Add an email and press Enter')
                            ->nestedRecursiveRules(['email'])
                            ->required(),
                    ]),

                Section::make('Sender')
                    ->description('How emails appear in the recipient’s inbox.')
                    ->columns(2)
                    ->schema([
                        TextInput::make('from_name')
                            ->label('From name')
                            ->required()
                            ->maxLength(120),
                        TextInput::make('from_address')
                            ->label('From address')
                            ->helperText('Usually the same as the SMTP username.')
                            ->email()
                            ->required(),
                        TextInput::make('reply_to')
                            ->label('Reply-to for customer emails')
                            ->helperText('Where customer replies go. Admin emails reply straight to the customer.')
                            ->email(),
                    ]),

                Section::make('SMTP server')
                    ->description('From your email provider, for example Google Workspace, Zoho or your hosting company.')
                    ->schema([
                        ToggleButtons::make('mailer')
                            ->label('Delivery')
                            ->options([
                                'smtp' => 'Send with SMTP',
                                'log' => 'Don’t send (write to the log)',
                            ])
                            ->inline()
                            ->live()
                            ->required(),
                        Grid::make(2)
                            ->visible(fn (Get $get): bool => $get('mailer') === 'smtp')
                            ->schema([
                                TextInput::make('host')
                                    ->label('SMTP host')
                                    ->placeholder('smtp.example.com')
                                    ->required(fn (Get $get): bool => $get('mailer') === 'smtp'),
                                TextInput::make('port')
                                    ->numeric()
                                    ->minValue(1)
                                    ->maxValue(65535)
                                    ->required(fn (Get $get): bool => $get('mailer') === 'smtp'),
                                Select::make('encryption')
                                    ->options([
                                        'tls' => 'TLS (usually port 587)',
                                        'ssl' => 'SSL (usually port 465)',
                                        'none' => 'None',
                                    ])
                                    ->required(fn (Get $get): bool => $get('mailer') === 'smtp'),
                                TextInput::make('username')
                                    ->autocomplete('off'),
                                Hidden::make('has_password')
                                    ->dehydrated(false),
                                TextInput::make('password')
                                    ->password()
                                    ->revealable()
                                    ->autocomplete('new-password')
                                    ->helperText(fn (Get $get): string => $get('has_password')
                                        ? 'A password is saved. Leave blank to keep it.'
                                        : 'Stored encrypted.'),
                            ]),
                    ]),
            ]);
    }

    public function content(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getFormContentComponent(),
            ]);
    }

    public function getFormContentComponent(): Component
    {
        return Form::make([EmbeddedSchema::make('form')])
            ->id('form')
            ->livewireSubmitHandler('save')
            ->footer([
                Actions::make([
                    Action::make('save')
                        ->label('Save settings')
                        ->submit('save')
                        ->keyBindings(['mod+s']),
                ])->key('form-actions'),
            ]);
    }

    public function save(): void
    {
        $data = $this->form->getState();

        MailSettingsStore::save($data);

        $this->form->fill([...MailSettingsStore::get(), 'password' => null]);

        Notification::make()->success()->title('Mail settings saved')->send();
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('sendTest')
                ->label('Send test email')
                ->icon('heroicon-o-paper-airplane')
                ->color('gray')
                ->modalDescription('Sends a short test email using the saved settings. Save your changes first.')
                ->schema([
                    TextInput::make('to')
                        ->label('Send to')
                        ->email()
                        ->required()
                        ->default(fn (): ?string => auth()->user()?->email),
                ])
                ->action(function (array $data): void {
                    try {
                        MailSettingsStore::apply();

                        $template = new MailTemplate([
                            'subject' => 'Test email from {site_name}',
                            'heading' => 'Your mail settings work',
                            'body' => 'This test was sent from the {site_name} admin panel. Contact-form emails will be delivered the same way.',
                        ]);

                        Mail::to($data['to'])->send(new TemplatedMail($template, []));

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
}

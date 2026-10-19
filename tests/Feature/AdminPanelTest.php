<?php

use App\Filament\Pages\MailSettings as MailSettingsPage;
use App\Filament\Resources\Enquiries\Pages\EditEnquiry;
use App\Filament\Resources\Enquiries\Pages\ListEnquiries;
use App\Filament\Resources\Enquiries\Pages\ViewEnquiry;
use App\Filament\Resources\MailTemplates\Pages\EditMailTemplate;
use App\Filament\Resources\MailTemplates\Pages\ListMailTemplates;
use App\Filament\Resources\Pages\Pages\CreatePage;
use App\Filament\Resources\Pages\Pages\EditPage;
use App\Filament\Resources\Pages\Pages\ListPages;
use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Models\Enquiry;
use App\Models\MailTemplate;
use App\Models\Page;
use App\Models\User;
use App\Support\MailSettings;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->actingAs(User::factory()->create());
});

it('redirects guests to the login page', function () {
    auth()->logout();

    $this->get('/admin')->assertRedirect('/admin/login');
});

it('loads every admin screen', function () {
    $page = Page::factory()->create();
    $enquiry = Enquiry::factory()->create();
    $template = MailTemplate::forKey(MailTemplate::ENQUIRY_ADMIN);

    $this->get('/admin')->assertOk();

    Livewire::test(ListPages::class)->assertOk()->assertCanSeeTableRecords([$page]);
    Livewire::test(CreatePage::class)->assertOk();
    Livewire::test(EditPage::class, ['record' => $page->getRouteKey()])->assertOk();
    Livewire::test(ListUsers::class)->assertOk();
    Livewire::test(ListEnquiries::class)->assertOk()->assertCanSeeTableRecords([$enquiry]);
    Livewire::test(ViewEnquiry::class, ['record' => $enquiry->getRouteKey()])->assertOk()->assertSee($enquiry->message);
    Livewire::test(ListMailTemplates::class)->assertOk();
    Livewire::test(EditMailTemplate::class, ['record' => $template->getRouteKey()])->assertOk();
    Livewire::test(MailSettingsPage::class)->assertOk();
});

it('creates a page from the admin', function () {
    Livewire::test(CreatePage::class)
        ->fillForm([
            'name' => 'Granite Steps',
            'title' => 'Granite steps and risers',
            'path' => 'granite-steps',
            'template' => 'page',
            'is_published' => true,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->get('/granite-steps')->assertOk()->assertSee('Granite steps and risers');
});

it('keeps content blocks intact when a page is saved', function () {
    $blocks = [
        ['type' => 'prose', 'title' => 'About', 'body' => ['First paragraph.', 'Second paragraph.']],
        ['type' => 'table', 'title' => 'Finishes', 'head' => ['Finish', 'Look'], 'rows' => [['Polished', 'Glossy'], ['Honed', 'Matt']]],
        ['type' => 'chips', 'title' => 'Uses', 'items' => ['Kitchen', 'Flooring']],
    ];

    $page = Page::factory()->create([
        'content' => ['blocks' => $blocks, 'product' => 'kitchen granite'],
        'faqs' => [['question' => 'Is it hard?', 'answer' => 'Yes.']],
    ]);

    Livewire::test(EditPage::class, ['record' => $page->getRouteKey()])
        ->fillForm(['title' => 'Updated title'])
        ->call('save')
        ->assertHasNoFormErrors();

    $page->refresh();

    expect($page->title)->toBe('Updated title')
        ->and($page->content['blocks'])->toBe($blocks)
        ->and($page->content['product'])->toBe('kitchen granite')
        ->and($page->faqs)->toBe([['question' => 'Is it hard?', 'answer' => 'Yes.']]);
});

it('rejects an invalid or duplicate page path', function () {
    Page::factory()->create(['path' => 'marble']);

    Livewire::test(CreatePage::class)
        ->fillForm(['name' => 'X', 'title' => 'X', 'template' => 'page', 'path' => 'marble'])
        ->call('create')
        ->assertHasFormErrors(['path' => 'unique']);

    Livewire::test(CreatePage::class)
        ->fillForm(['name' => 'X', 'title' => 'X', 'template' => 'page', 'path' => 'Not A Path'])
        ->call('create')
        ->assertHasFormErrors(['path' => 'regex']);
});

it('creates a user with a hashed password', function () {
    Livewire::test(CreateUser::class)
        ->fillForm([
            'name' => 'Chirag Sorathiya',
            'email' => 'chirag@example.com',
            'password' => 'a-strong-password',
            'password_confirmation' => 'a-strong-password',
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $user = User::query()->where('email', 'chirag@example.com')->sole();

    expect(Hash::check('a-strong-password', $user->password))->toBeTrue();
});

it('updates an enquiry status and notes', function () {
    $enquiry = Enquiry::factory()->create();

    Livewire::test(EditEnquiry::class, ['record' => $enquiry->getRouteKey()])
        ->fillForm(['status' => 'contacted', 'notes' => 'Called back, visiting Saturday.'])
        ->call('save')
        ->assertHasNoFormErrors();

    expect($enquiry->fresh()->status->value)->toBe('contacted')
        ->and($enquiry->fresh()->notes)->toBe('Called back, visiting Saturday.');
});

it('saves mail settings and keeps the password when left blank', function () {
    Livewire::test(MailSettingsPage::class)
        ->fillForm([
            'admin_recipients' => ['owner@example.com'],
            'from_name' => 'Shyam Granite',
            'from_address' => 'mailer@example.com',
            'reply_to' => 'shyamgranite@ymail.com',
            'mailer' => 'smtp',
            'host' => 'smtp.example.com',
            'port' => 465,
            'encryption' => 'ssl',
            'username' => 'mailer@example.com',
            'password' => 'first-password',
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    Livewire::test(MailSettingsPage::class)
        ->assertSchemaStateSet(['host' => 'smtp.example.com', 'password' => null])
        ->fillForm(['host' => 'smtp.other.example'])
        ->call('save')
        ->assertHasNoFormErrors();

    MailSettings::apply();

    expect(config('mail.mailers.smtp.host'))->toBe('smtp.other.example')
        ->and(config('mail.mailers.smtp.scheme'))->toBe('smtps')
        ->and(config('mail.mailers.smtp.password'))->toBe('first-password')
        ->and(MailSettings::adminRecipients())->toBe(['owner@example.com']);
});

it('validates admin recipient emails', function () {
    Livewire::test(MailSettingsPage::class)
        ->fillForm(['admin_recipients' => ['not-an-email']])
        ->call('save')
        ->assertHasFormErrors(['admin_recipients.0']);
});

it('edits a mail template', function () {
    $template = MailTemplate::forKey(MailTemplate::ENQUIRY_CUSTOMER);

    Livewire::test(EditMailTemplate::class, ['record' => $template->getRouteKey()])
        ->fillForm(['subject' => 'Thanks {name}!', 'is_enabled' => false])
        ->call('save')
        ->assertHasNoFormErrors();

    expect($template->fresh()->subject)->toBe('Thanks {name}!')
        ->and($template->fresh()->is_enabled)->toBeFalse();
});

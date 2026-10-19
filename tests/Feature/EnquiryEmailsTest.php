<?php

use App\Jobs\SendEnquiryEmails;
use App\Mail\TemplatedMail;
use App\Models\Enquiry;
use App\Models\MailTemplate;
use App\Models\Setting;
use App\Support\MailSettings;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;

uses(RefreshDatabase::class);

beforeEach(function () {
    MailSettings::save([
        'mailer' => 'smtp',
        'host' => 'smtp.example.com',
        'port' => 587,
        'encryption' => 'tls',
        'username' => 'mailer@example.com',
        'password' => 'secret-password',
        'from_address' => 'mailer@example.com',
        'from_name' => 'Shyam Granite',
        'reply_to' => 'shyamgranite@ymail.com',
        'admin_recipients' => ['owner@example.com', 'sales@example.com'],
    ]);
});

it('emails the admins and the customer', function () {
    Mail::fake();
    $enquiry = Enquiry::factory()->create(['name' => 'Asha Patel', 'email' => 'asha@example.com']);

    (new SendEnquiryEmails($enquiry))->handle();

    Mail::assertSent(TemplatedMail::class, fn (TemplatedMail $mail): bool => $mail->template->key === MailTemplate::ENQUIRY_ADMIN
        && $mail->hasTo('owner@example.com')
        && $mail->hasTo('sales@example.com')
        && $mail->hasReplyTo('asha@example.com')
        && $mail->envelope()->subject === 'New enquiry from Asha Patel');

    Mail::assertSent(TemplatedMail::class, fn (TemplatedMail $mail): bool => $mail->template->key === MailTemplate::ENQUIRY_CUSTOMER
        && $mail->hasTo('asha@example.com')
        && $mail->hasReplyTo('shyamgranite@ymail.com'));

    expect($enquiry->fresh()->admin_notified_at)->not->toBeNull()
        ->and($enquiry->fresh()->customer_notified_at)->not->toBeNull();
});

it('skips the customer email when no address was given', function () {
    Mail::fake();
    $enquiry = Enquiry::factory()->withoutEmail()->create();

    (new SendEnquiryEmails($enquiry))->handle();

    Mail::assertSentCount(1);
    expect($enquiry->fresh()->customer_notified_at)->toBeNull();
});

it('does not send a disabled template', function () {
    Mail::fake();
    MailTemplate::forKey(MailTemplate::ENQUIRY_CUSTOMER)->update(['is_enabled' => false]);

    (new SendEnquiryEmails(Enquiry::factory()->create()))->handle();

    Mail::assertSent(TemplatedMail::class, 1);
    Mail::assertSent(TemplatedMail::class, fn (TemplatedMail $mail): bool => $mail->template->key === MailTemplate::ENQUIRY_ADMIN);
});

it('escapes customer input in the email body', function () {
    $template = MailTemplate::forKey(MailTemplate::ENQUIRY_ADMIN);
    $enquiry = Enquiry::factory()->make([
        'name' => 'Asha',
        'message' => '<script>alert(1)</script> [click](https://evil.example)',
    ]);

    $html = (new TemplatedMail($template, $enquiry->mailPlaceholders()))->render();

    expect($html)->not->toContain('<script>')
        ->and($html)->not->toContain('href="https://evil.example"')
        ->and($html)->toContain('&lt;script&gt;');
});

it('applies the saved SMTP settings at runtime', function () {
    MailSettings::apply();

    expect(config('mail.default'))->toBe('smtp')
        ->and(config('mail.mailers.smtp.host'))->toBe('smtp.example.com')
        ->and(config('mail.mailers.smtp.port'))->toBe(587)
        ->and(config('mail.mailers.smtp.scheme'))->toBe('smtp')
        ->and(config('mail.mailers.smtp.password'))->toBe('secret-password')
        ->and(config('mail.from.address'))->toBe('mailer@example.com');
});

it('stores the SMTP password encrypted and keeps it when left blank', function () {
    $stored = Setting::query()->where('key', MailSettings::KEY)->value('value');

    expect($stored['password'])->not->toBe('secret-password');

    MailSettings::save([...MailSettings::get(), 'password' => null, 'host' => 'smtp.changed.example']);
    MailSettings::apply();

    expect(config('mail.mailers.smtp.host'))->toBe('smtp.changed.example')
        ->and(config('mail.mailers.smtp.password'))->toBe('secret-password');
});

it('falls back to the env mailer until a host is saved', function () {
    Setting::query()->delete();
    cache()->flush();
    config(['mail.default' => 'array']);

    MailSettings::apply();

    expect(config('mail.default'))->toBe('array');
});

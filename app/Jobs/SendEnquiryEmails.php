<?php

namespace App\Jobs;

use App\Mail\TemplatedMail;
use App\Models\Enquiry;
use App\Models\MailTemplate;
use App\Support\MailSettings;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;
use Throwable;

/**
 * Sends the admin notification and the customer confirmation for an enquiry,
 * using the templates and SMTP settings from the admin panel. Each email is
 * sent independently, so a failure on one never blocks the other.
 */
class SendEnquiryEmails implements ShouldQueue
{
    use Queueable;

    public function __construct(public Enquiry $enquiry) {}

    public function handle(): void
    {
        MailSettings::apply();

        $values = $this->enquiry->mailPlaceholders();

        $this->sendToAdmins($values);
        $this->sendToCustomer($values);
    }

    /**
     * @param  array<string, string>  $values
     */
    private function sendToAdmins(array $values): void
    {
        $template = MailTemplate::forKey(MailTemplate::ENQUIRY_ADMIN);
        $recipients = MailSettings::adminRecipients();

        if (! $template?->is_enabled || $recipients === []) {
            return;
        }

        $this->attempt(function () use ($template, $values, $recipients): void {
            Mail::to($recipients)->send(new TemplatedMail($template, $values, $this->enquiry->email));

            $this->enquiry->forceFill(['admin_notified_at' => now()])->save();
        });
    }

    /**
     * @param  array<string, string>  $values
     */
    private function sendToCustomer(array $values): void
    {
        $template = MailTemplate::forKey(MailTemplate::ENQUIRY_CUSTOMER);

        if (! $template?->is_enabled || blank($this->enquiry->email)) {
            return;
        }

        $this->attempt(function () use ($template, $values): void {
            Mail::to($this->enquiry->email)->send(new TemplatedMail($template, $values, MailSettings::replyTo()));

            $this->enquiry->forceFill(['customer_notified_at' => now()])->save();
        });
    }

    private function attempt(callable $send): void
    {
        try {
            $send();
        } catch (Throwable $exception) {
            report($exception);
        }
    }
}

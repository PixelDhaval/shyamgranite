<?php

namespace App\Mail;

use App\Models\MailTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * An email rendered from an admin-editable MailTemplate.
 */
class TemplatedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @param  array<string, string>  $values  Placeholder values, e.g. ['name' => 'Asha']
     */
    public function __construct(
        public MailTemplate $template,
        public array $values,
        public ?string $replyToAddress = null,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->template->renderSubject($this->values),
            replyTo: $this->replyToAddress ? [new Address($this->replyToAddress)] : [],
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.templated',
            with: [
                'heading' => $this->template->heading ? MailTemplate::replacePlaceholders($this->template->heading, $this->values, forMarkdown: true) : null,
                'body' => $this->template->renderBody($this->values),
            ],
        );
    }
}

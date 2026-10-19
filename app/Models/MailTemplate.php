<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * An editable email template. Subject, heading and body accept
 * placeholders such as {name}; the body is Markdown.
 */
#[Fillable(['key', 'name', 'description', 'subject', 'heading', 'body', 'is_enabled'])]
class MailTemplate extends Model
{
    public const ENQUIRY_ADMIN = 'enquiry_admin';

    public const ENQUIRY_CUSTOMER = 'enquiry_customer';

    /**
     * Placeholders admins can use, with what each one inserts.
     *
     * @var array<string, string>
     */
    public const PLACEHOLDERS = [
        'name' => 'Customer’s name',
        'phone' => 'Customer’s phone number',
        'email' => 'Customer’s email address',
        'town' => 'Town the stone is going to',
        'interested_in' => 'What they are interested in',
        'message' => 'Their message',
        'source_url' => 'Page the form was sent from',
        'submitted_at' => 'Date and time of the enquiry',
        'site_name' => 'Shyam Granite',
        'whatsapp' => 'Business WhatsApp number',
        'phone_primary' => 'Main business phone number',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_enabled' => 'boolean',
        ];
    }

    public static function forKey(string $key): ?self
    {
        return static::query()->where('key', $key)->first();
    }

    /**
     * Replace {placeholders} in a template string.
     *
     * Values are HTML-escaped and Markdown-escaped when rendering the body,
     * so customer input can't inject links or markup into the email.
     *
     * @param  array<string, string>  $values
     */
    public static function replacePlaceholders(string $template, array $values, bool $forMarkdown = false): string
    {
        $values = [
            'site_name' => config('site.name'),
            'whatsapp' => config('site.whatsapp.display'),
            'phone_primary' => config('site.phone.primary_display'),
            ...$values,
        ];

        return preg_replace_callback('/\{([a-z_]+)\}/', function (array $match) use ($values, $forMarkdown): string {
            if (! array_key_exists($match[1], $values)) {
                return $match[0];
            }

            $value = (string) $values[$match[1]];

            return $forMarkdown ? static::escapeMarkdown($value) : $value;
        }, $template);
    }

    private static function escapeMarkdown(string $value): string
    {
        // Markdown first, then HTML, so entities such as &#039; stay intact.
        // < > & are left to e(): backslash-escaping them would print the entity.
        $escaped = preg_replace('/([\\\\`*_{}\[\]()#+\-!|~])/', '\\\\$1', $value);
        $escaped = e($escaped);

        // Keep the customer's line breaks as Markdown hard breaks.
        return Str::of($escaped)->replace(["\r\n", "\r"], "\n")->replace("\n", "  \n")->toString();
    }

    public function renderSubject(array $values): string
    {
        return static::replacePlaceholders($this->subject, $values);
    }

    public function renderHeading(array $values): ?string
    {
        return $this->heading ? static::replacePlaceholders($this->heading, $values) : null;
    }

    public function renderBody(array $values): string
    {
        return static::replacePlaceholders($this->body, $values, forMarkdown: true);
    }
}

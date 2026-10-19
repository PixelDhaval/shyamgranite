<?php

namespace App\Support;

use App\Models\Setting;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

/**
 * Mail settings edited in the admin panel (SMTP server, sender, admin
 * recipients). Stored under the "mail" setting; the SMTP password is kept
 * encrypted. apply() pushes them into the mail config at runtime, falling
 * back to the .env mailer while no SMTP host has been saved.
 */
class MailSettings
{
    public const KEY = 'mail';

    /**
     * @return array{mailer: string, host: ?string, port: ?int, encryption: string, username: ?string, has_password: bool, from_address: ?string, from_name: ?string, reply_to: ?string, admin_recipients: list<string>}
     */
    public static function get(): array
    {
        $stored = Setting::get(self::KEY);

        return [
            'mailer' => $stored['mailer'] ?? 'smtp',
            'host' => $stored['host'] ?? null,
            'port' => isset($stored['port']) ? (int) $stored['port'] : 587,
            'encryption' => $stored['encryption'] ?? 'tls',
            'username' => $stored['username'] ?? null,
            'has_password' => filled($stored['password'] ?? null),
            'from_address' => $stored['from_address'] ?? config('site.email'),
            'from_name' => $stored['from_name'] ?? config('site.name'),
            'reply_to' => $stored['reply_to'] ?? config('site.email'),
            'admin_recipients' => array_values($stored['admin_recipients'] ?? [config('site.email')]),
        ];
    }

    /**
     * Save settings from the admin form. A blank password keeps the current one.
     *
     * @param  array<string, mixed>  $data
     */
    public static function save(array $data): void
    {
        $current = Setting::get(self::KEY);

        $password = filled($data['password'] ?? null)
            ? Crypt::encryptString($data['password'])
            : ($current['password'] ?? null);

        Setting::put(self::KEY, [
            'mailer' => $data['mailer'] ?? 'smtp',
            'host' => $data['host'] ?? null,
            'port' => isset($data['port']) ? (int) $data['port'] : null,
            'encryption' => $data['encryption'] ?? 'tls',
            'username' => $data['username'] ?? null,
            'password' => $password,
            'from_address' => $data['from_address'] ?? null,
            'from_name' => $data['from_name'] ?? null,
            'reply_to' => $data['reply_to'] ?? null,
            'admin_recipients' => array_values(array_filter($data['admin_recipients'] ?? [])),
        ]);
    }

    /**
     * @return list<string>
     */
    public static function adminRecipients(): array
    {
        return static::get()['admin_recipients'];
    }

    public static function replyTo(): ?string
    {
        return static::get()['reply_to'];
    }

    /**
     * Point Laravel's mailer at the saved settings for the rest of this process.
     */
    public static function apply(): void
    {
        $settings = static::get();

        if (filled($settings['from_address'])) {
            config([
                'mail.from.address' => $settings['from_address'],
                'mail.from.name' => $settings['from_name'] ?: config('site.name'),
            ]);
        }

        if ($settings['mailer'] === 'log') {
            config(['mail.default' => 'log']);

            return;
        }

        if (blank($settings['host'])) {
            return;
        }

        config([
            'mail.default' => 'smtp',
            'mail.mailers.smtp.scheme' => $settings['encryption'] === 'ssl' ? 'smtps' : 'smtp',
            'mail.mailers.smtp.host' => $settings['host'],
            'mail.mailers.smtp.port' => $settings['port'],
            'mail.mailers.smtp.username' => $settings['username'],
            'mail.mailers.smtp.password' => static::password(),
        ]);

        Mail::purge('smtp');
    }

    private static function password(): ?string
    {
        $encrypted = Setting::get(self::KEY)['password'] ?? null;

        if (blank($encrypted)) {
            return null;
        }

        try {
            return Crypt::decryptString($encrypted);
        } catch (DecryptException) {
            return null;
        }
    }
}

<?php

namespace App\Models;

use App\Enums\EnquiryStatus;
use Database\Factories\EnquiryFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * A contact-form submission from the website.
 */
#[Fillable([
    'name',
    'phone',
    'email',
    'town',
    'interested_in',
    'message',
    'source_url',
    'status',
    'notes',
    'ip_address',
    'admin_notified_at',
    'customer_notified_at',
])]
class Enquiry extends Model
{
    /** @use HasFactory<EnquiryFactory> */
    use HasFactory;

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => EnquiryStatus::class,
            'admin_notified_at' => 'datetime',
            'customer_notified_at' => 'datetime',
        ];
    }

    /**
     * Values available to mail template placeholders such as {name}.
     *
     * @return array<string, string>
     */
    public function mailPlaceholders(): array
    {
        return [
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email ?: 'Not given',
            'town' => $this->town ?: 'Not given',
            'interested_in' => $this->interested_in ?: 'Not given',
            'message' => $this->message,
            'source_url' => $this->source_url ?: url('/contact'),
            'submitted_at' => $this->created_at?->timezone(config('site.timezone'))->format('j M Y, g:i A') ?? '',
        ];
    }

    public function whatsappUrl(): string
    {
        $digits = preg_replace('/\D+/', '', $this->phone);

        if (strlen($digits) === 10) {
            $digits = '91'.$digits;
        }

        return 'https://wa.me/'.$digits;
    }
}

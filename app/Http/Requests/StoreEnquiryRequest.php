<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEnquiryRequest extends FormRequest
{
    /**
     * The contact form is public.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:20', 'regex:/^[0-9+\-\s()]{7,20}$/'],
            'email' => ['nullable', 'email', 'max:190'],
            'town' => ['nullable', 'string', 'max:80'],
            'interested_in' => ['nullable', 'string', 'max:120'],
            'message' => ['required', 'string', 'max:2000'],
            // Honeypot: hidden from people, filled in by bots.
            'website' => ['prohibited'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'phone.regex' => 'Please enter a valid phone number.',
            'website.prohibited' => 'Your enquiry could not be sent. Please call or WhatsApp us instead.',
        ];
    }
}

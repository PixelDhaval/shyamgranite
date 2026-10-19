<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnquiryRequest;
use App\Jobs\SendEnquiryEmails;
use App\Models\Enquiry;
use Illuminate\Http\RedirectResponse;

class EnquiryController extends Controller
{
    /**
     * Store a contact-form enquiry and email it after the response is sent,
     * so the visitor never waits on the SMTP server (no queue worker needed).
     */
    public function store(StoreEnquiryRequest $request): RedirectResponse
    {
        $returnUrl = $this->sameSiteUrl(url()->previous());

        $enquiry = Enquiry::query()->create([
            ...$request->safe()->except('website'),
            'source_url' => $returnUrl,
            'ip_address' => $request->ip(),
        ]);

        SendEnquiryEmails::dispatchAfterResponse($enquiry);

        return redirect()->to($returnUrl.'#enquiry')->with('enquiry_sent', true);
    }

    /**
     * Only ever return visitors to a page on this site.
     */
    private function sameSiteUrl(string $url): string
    {
        $isLocal = parse_url($url, PHP_URL_HOST) === parse_url(url('/'), PHP_URL_HOST);

        return $isLocal ? strtok($url, '#') : url('contact');
    }
}

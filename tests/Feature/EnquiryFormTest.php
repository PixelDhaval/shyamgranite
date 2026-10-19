<?php

use App\Jobs\SendEnquiryEmails;
use App\Models\Enquiry;
use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Bus;

uses(RefreshDatabase::class);

beforeEach(function () {
    Page::factory()->create([
        'path' => 'contact',
        'name' => 'Contact',
        'content' => ['blocks' => [['type' => 'enquiry-form', 'title' => 'Send us an enquiry']]],
    ]);
});

it('shows the enquiry form on the contact page', function () {
    $this->get('/contact')
        ->assertOk()
        ->assertSee('action="'.route('enquiries.store').'"', false)
        ->assertSee('name="phone"', false);
});

it('prefills "interested in" from the product query string', function () {
    $this->get('/contact?product=Black+Galaxy')
        ->assertOk()
        ->assertSee('value="Black Galaxy"', false);
});

it('stores an enquiry and sends the emails after the response', function () {
    Bus::fake();

    $this->from('/contact')
        ->post(route('enquiries.store'), [
            'name' => 'Asha Patel',
            'phone' => '+91 98765 43210',
            'email' => 'asha@example.com',
            'town' => 'Gandhidham',
            'interested_in' => 'Black Galaxy granite',
            'message' => 'Kitchen platform, 10 ft.',
        ])
        ->assertRedirect(url('/contact').'#enquiry')
        ->assertSessionHas('enquiry_sent');

    $enquiry = Enquiry::query()->sole();

    expect($enquiry->name)->toBe('Asha Patel')
        ->and($enquiry->source_url)->toBe(url('/contact'))
        ->and($enquiry->status->value)->toBe('new');

    Bus::assertDispatchedAfterResponse(SendEnquiryEmails::class, fn (SendEnquiryEmails $job): bool => $job->enquiry->is($enquiry));
});

it('shows a thank-you message after sending', function () {
    Bus::fake();

    $this->from('/contact')
        ->followingRedirects()
        ->post(route('enquiries.store'), ['name' => 'Asha', 'phone' => '9876543210', 'message' => 'Hello'])
        ->assertOk()
        ->assertSee('Thank you, we have your enquiry');
});

it('validates the enquiry', function (array $input, array $errors) {
    Bus::fake();

    $this->from('/contact')
        ->post(route('enquiries.store'), [
            'name' => 'Asha',
            'phone' => '9876543210',
            'message' => 'Hello',
            ...$input,
        ])
        ->assertRedirect('/contact')
        ->assertSessionHasErrors($errors);

    expect(Enquiry::query()->count())->toBe(0);
    Bus::assertNothingDispatched();
})->with([
    'name is required' => [['name' => ''], ['name']],
    'phone is required' => [['phone' => ''], ['phone']],
    'phone must look like a phone number' => [['phone' => 'call me'], ['phone']],
    'email must be valid' => [['email' => 'not-an-email'], ['email']],
    'message is required' => [['message' => ''], ['message']],
    'honeypot must stay empty' => [['website' => 'https://spam.example'], ['website']],
]);

it('never redirects to another site', function () {
    Bus::fake();

    $this->withHeader('referer', 'https://evil.example/phish')
        ->post(route('enquiries.store'), ['name' => 'Asha', 'phone' => '9876543210', 'message' => 'Hello'])
        ->assertRedirect(url('contact').'#enquiry');
});

it('rate limits submissions', function () {
    Bus::fake();

    foreach (range(1, 5) as $attempt) {
        $this->post(route('enquiries.store'), ['name' => 'Asha', 'phone' => '9876543210', 'message' => 'Hello'])->assertRedirect();
    }

    $this->post(route('enquiries.store'), ['name' => 'Asha', 'phone' => '9876543210', 'message' => 'Hello'])
        ->assertTooManyRequests();
});

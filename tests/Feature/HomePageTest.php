<?php

it('renders the home page with the brand and primary call to action', function () {
    $this->get(route('home'))
        ->assertOk()
        ->assertSee('<title>Shyam Granite: A House of Color Granite · Adipur, Kutch</title>', false)
        ->assertSee('cut to your size')
        ->assertSee("WhatsApp for today's rate")
        ->assertSee('https://wa.me/917878778287', false);
});

it('shows the exact NAP for both locations', function () {
    $this->get(route('home'))
        ->assertOk()
        ->assertSee('Plot No. 494, Ward 5/B, Rambaug Road')
        ->assertSee('Plot No. 45, Ward 1/B, GIDC')
        ->assertSee('+91 98242 83804')
        ->assertSee('+91 78787 78287')
        ->assertSee('shyamgranite@ymail.com');
});

it('outputs local business, website and FAQ structured data', function () {
    $html = $this->get(route('home'))->assertOk()->getContent();

    preg_match_all('/<script type="application\/ld\+json">(.*?)<\/script>/s', $html, $matches);

    $types = collect($matches[1])->map(fn (string $json) => json_decode($json, true)['@type'] ?? null);

    expect($types)->toContain('HomeAndConstructionBusiness', 'WebSite', 'FAQPage');

    $business = collect($matches[1])
        ->map(fn (string $json) => json_decode($json, true))
        ->firstWhere('@type', 'HomeAndConstructionBusiness');

    expect($business['address']['streetAddress'])->toBe('Plot No. 494, Ward 5/B, Rambaug Road')
        ->and($business['department']['geo']['latitude'])->toBe(23.0716481)
        ->and($business)->not->toHaveKey('geo');
});

it('renders the desktop mega navigation and mobile menu', function () {
    $this->get(route('home'))
        ->assertOk()
        ->assertSee('id="nav-panel-granite"', false)
        ->assertSee('/granite/black-galaxy', false)
        ->assertSee('id="mobile-menu"', false)
        ->assertSee('data-back-to-top', false)
        ->assertSee('data-preloader', false);
});

it('never shows a price or GST number', function () {
    $this->get(route('home'))
        ->assertOk()
        ->assertDontSee('₹')
        ->assertDontSee('per sq ft')
        ->assertDontSee('GSTIN');
});

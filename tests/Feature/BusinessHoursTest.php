<?php

use App\Support\BusinessHours;
use Carbon\CarbonImmutable;

it('formats whole hours and half hours for display', function () {
    $hours = new BusinessHours;

    expect($hours->format('09:00'))->toBe('9 AM')
        ->and($hours->format('13:00'))->toBe('1 PM')
        ->and($hours->format('18:30'))->toBe('6:30 PM');
});

it('returns the showroom weekday window in Indian time', function () {
    // Monday 20 October 2026, 10:00 IST
    $now = CarbonImmutable::create(2026, 10, 20, 4, 30, 0, 'UTC');

    expect((new BusinessHours)->today('showroom', $now))->toBe([
        'opens' => '9 AM',
        'closes' => '7 PM',
        'is_open' => true,
    ]);
});

it('uses the short Sunday hours for the showroom', function () {
    // Sunday 25 October 2026, 14:00 IST, after the 1 PM close
    $now = CarbonImmutable::create(2026, 10, 25, 14, 0, 0, 'Asia/Kolkata');

    expect((new BusinessHours)->today('showroom', $now))->toBe([
        'opens' => '9 AM',
        'closes' => '1 PM',
        'is_open' => false,
    ]);
});

it('lists every opening slot for a location', function () {
    expect((new BusinessHours)->rows('workshop'))->toBe([
        ['label' => 'Sunday to Friday', 'opens' => '9 AM', 'closes' => '6 PM'],
        ['label' => 'Saturday', 'opens' => '9 AM', 'closes' => '1 PM'],
    ]);
});

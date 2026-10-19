<?php

/*
|--------------------------------------------------------------------------
| Shyam Granite business details
|--------------------------------------------------------------------------
|
| Single source of truth for name, address and phone (NAP), hours and
| contact links. Every template and every JSON-LD block reads from here,
| so the details stay identical across the site and match the Google
| Business Profiles. No prices and no GST number belong in this file.
|
*/

return [

    'name' => 'Shyam Granite',
    'tagline' => 'A House of Color Granite',
    'founded' => 2005,
    'domain' => 'https://shyamgranite.com',
    'email' => 'shyamgranite@ymail.com',
    'timezone' => 'Asia/Kolkata',

    'owners' => [
        ['name' => 'Pravin Sorathiya', 'phone' => '+919824283804', 'display' => '+91 98242 83804'],
        ['name' => 'Chirag Sorathiya', 'phone' => '+917878778287', 'display' => '+91 78787 78287'],
    ],

    'phone' => [
        'primary' => '+919824283804',
        'primary_display' => '+91 98242 83804',
    ],

    'whatsapp' => [
        'number' => '917878778287',
        'display' => '+91 78787 78287',
        'default_message' => "Hello Shyam Granite, I'd like today's rate for",
    ],

    /*
    | Days use ISO-8601 numbering: 1 = Monday ... 7 = Sunday.
    */
    'locations' => [
        'showroom' => [
            'label' => 'Showroom',
            'summary' => 'Browse slabs, sinks and supplies',
            'street' => 'Plot No. 494, Ward 5/B, Rambaug Road',
            'locality' => 'Adipur',
            'city' => 'Gandhidham',
            'district' => 'Kutch',
            'region' => 'Gujarat',
            'postal_code' => '370205',
            'phone' => '+919824283804',
            'phone_display' => '+91 98242 83804',
            'map_url' => 'https://www.google.com/maps/search/?api=1&query=Plot+No.+494%2C+Ward+5%2FB%2C+Rambaug+Road%2C+Adipur%2C+Gujarat+370205',
            'hours' => [
                ['days' => [1, 2, 3, 4, 5, 6], 'label' => 'Monday to Saturday', 'opens' => '09:00', 'closes' => '19:00'],
                ['days' => [7], 'label' => 'Sunday', 'opens' => '09:00', 'closes' => '13:00'],
            ],
        ],
        'workshop' => [
            'label' => 'Workshop',
            'summary' => 'Cutting, polishing and moulding',
            'street' => 'Plot No. 45, Ward 1/B, GIDC',
            'locality' => 'Adipur',
            'city' => 'Gandhidham',
            'district' => 'Kutch',
            'region' => 'Gujarat',
            'postal_code' => '370205',
            'phone' => '+917878778287',
            'phone_display' => '+91 78787 78287',
            'map_url' => 'https://maps.app.goo.gl/P6c4cnUr499GE9bd7',
            'geo' => ['latitude' => 23.0716481, 'longitude' => 70.0717604],
            'hours' => [
                ['days' => [7, 1, 2, 3, 4, 5], 'label' => 'Sunday to Friday', 'opens' => '09:00', 'closes' => '18:00'],
                ['days' => [6], 'label' => 'Saturday', 'opens' => '09:00', 'closes' => '13:00'],
            ],
        ],
    ],

    'areas_served' => [
        'Adipur', 'Gandhidham', 'Anjar', 'Bhuj', 'Mundra',
        'Mandvi', 'Bhachau', 'Rapar', 'Nakhatrana', 'Madhapar',
    ],

    /*
    | Area pages live at launch (strategy: six, maximum ten).
    */
    'area_pages' => [
        ['label' => 'Gandhidham', 'url' => '/areas/gandhidham'],
        ['label' => 'Adipur', 'url' => '/areas/adipur'],
        ['label' => 'Anjar', 'url' => '/areas/anjar'],
        ['label' => 'Bhuj', 'url' => '/areas/bhuj'],
        ['label' => 'Mundra', 'url' => '/areas/mundra'],
        ['label' => 'Mandvi', 'url' => '/areas/mandvi'],
    ],

];

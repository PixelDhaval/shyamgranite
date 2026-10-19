<?php

/*
| Natural stone: Kota stone (one page, one colour) and sandstone (hub + varieties).
*/

$sandstoneFinishes = ['Natural', 'Honed', 'Sandblasted', 'Rock-face', 'Chiselled', 'Polished'];

$variety = fn (array $page): array => ['template' => 'variety', ...$page];

return [

    [
        'path' => 'kota-stone',
        'name' => 'Kota Stone',
        'title' => 'Kota stone in Kutch',
        'seo_title' => 'Kota Stone Supplier in Kutch | Shyam Granite',
        'meta_description' => 'Green Kota (Kota Blue) stone in Adipur, Kutch: rough, machine-cut, semi-polished, mirror polished and lapotra finishes for homes and industry.',
        'summary' => 'Hard-wearing, non-slip and low-cost flooring stone.',
        'intro' => 'Kota stone is a hard-wearing limestone from Kota, Rajasthan. It is non-slip and low-cost, which makes it a standard choice for homes, industrial units and outdoor areas across Kutch.',
        'photo' => 'kota-floor',
        'content' => [
            'blocks' => [
                [
                    'type' => 'prose',
                    'title' => 'Why Kota stone is everywhere',
                    'photo' => 'tiles-grey',
                    'body' => [
                        'Kota stone (sometimes spelt Kotah stone) comes in a natural green-blue shade known as Green Kota or Kota Blue. It is dense, takes heavy traffic and stays cool underfoot.',
                        'Its natural texture gives good grip even when wet, so it is widely used for parking areas, balconies, staircases and industrial floors, and it costs less than most granite and marble.',
                    ],
                ],
                [
                    'type' => 'table',
                    'title' => 'Kota stone finishes',
                    'intro' => 'The same stone looks and behaves differently in each finish.',
                    'head' => ['Finish', 'Look', 'Good for'],
                    'rows' => [
                        ['Rough / natural', 'Split surface with natural texture', 'Parking, industrial floors, outdoor paving'],
                        ['Machine-cut', 'Sawn edges with an even surface', 'Paving and floors laid in a regular pattern'],
                        ['Semi-polished', 'Smoothed with a low sheen', 'Homes, balconies, staircases'],
                        ['Mirror polished', 'Glossy, deepened colour', 'Living areas and commercial interiors'],
                        ['Lapotra', 'Semi-polished with some texture kept', 'Steps and floors that need extra grip'],
                    ],
                ],
                [
                    'type' => 'chips',
                    'title' => 'Where it is used',
                    'items' => ['Flooring', 'Parking areas', 'Industrial floors', 'Staircases', 'Balconies', 'Outdoor paving'],
                ],
                [
                    'type' => 'links',
                    'title' => 'Related',
                    'paths' => ['flooring', 'elevation-outdoor', 'chemicals-adhesives'],
                ],
            ],
        ],
        'faqs' => [
            ['What colour is Kota stone?', 'Kota stone comes in a natural green-blue shade, called Green Kota or Kota Blue.'],
            ['Is Kota stone slippery?', 'Rough, natural and lapotra finishes give good grip, even when wet. Mirror polished Kota is smoother, so use it indoors.'],
            ['Kota stone or vitrified tiles?', 'Kota stone is natural, very hard-wearing and suits heavy traffic and outdoor use. Tiles offer more colours but can chip and crack under heavy loads.'],
            ['Kotah or Kota stone?', 'Both spellings refer to the same limestone from Kota, Rajasthan.'],
        ],
    ],

    [
        'path' => 'sandstone',
        'template' => 'collection',
        'name' => 'Sandstone',
        'title' => 'Sandstone supplier in Kutch',
        'seo_title' => 'Sandstone Supplier in Kutch | Shyam Granite',
        'meta_description' => 'Dholpur, Gwalior Mint, Lalitpur Yellow, Agra Red, Jodhpur Pink, Kandla Grey and Raj Green sandstone in Adipur for elevations, paving and temples.',
        'summary' => 'Rajasthan and Madhya Pradesh sandstone for elevations, paving and temples.',
        'intro' => 'Sandstone from Rajasthan and Madhya Pradesh for facades, landscaping, boundary walls, jaalis and heritage-style temple architecture.',
        'photo' => 'sandstone-arch',
        'content' => [
            'range_title' => 'Sandstone colours',
            'range_intro' => 'Beiges, reds, pinks, greys and greens, in natural and finished surfaces.',
            'blocks' => [
                [
                    'type' => 'table',
                    'title' => 'Sandstone finishes',
                    'head' => ['Finish', 'Look', 'Good for'],
                    'rows' => [
                        ['Natural', 'Split face with natural layers', 'Paving, garden paths, boundary walls'],
                        ['Honed', 'Smooth and matt', 'Interior walls and floors'],
                        ['Sandblasted', 'Even, lightly textured surface', 'Paving and steps that need grip'],
                        ['Rock-face', 'Bold, rough projecting face', 'Elevations and feature walls'],
                        ['Chiselled', 'Hand-tooled lines', 'Heritage and temple architecture'],
                        ['Polished', 'Smooth with a soft sheen', 'Interior features and table tops'],
                    ],
                ],
                [
                    'type' => 'chips',
                    'title' => 'Where it works',
                    'items' => ['Elevations and cladding', 'Outdoor paving', 'Garden landscaping', 'Boundary walls', 'Jaalis', 'Temple architecture'],
                ],
                [
                    'type' => 'links',
                    'title' => 'Related',
                    'paths' => ['elevation-outdoor', 'shilp-kala/jaali-work', 'shilp-kala'],
                ],
            ],
        ],
        'faqs' => [
            ['Which sandstone is best for house elevation?', 'Dholpur Beige, Gwalior Mint and Jodhpur Pink are popular for elevations. Rock-face and chiselled finishes add depth.'],
            ['Is sandstone good for outdoor paving?', 'Yes. Natural and sandblasted finishes give good grip for paths, patios and driveways.'],
            ['Does sandstone need sealing outdoors?', 'Sealing helps sandstone resist water and staining, especially in light colours. We stock stone sealers and impregnators.'],
        ],
    ],

    $variety([
        'path' => 'sandstone/dholpur-beige',
        'parent' => 'sandstone',
        'name' => 'Dholpur Beige',
        'title' => 'Dholpur Beige Sandstone',
        'photo' => 'sandstone-grey',
        'featured' => true,
        'intro' => 'A soft, even beige sandstone from Dholpur, a classic for elevations, paving and temples.',
        'content' => [
            'specs' => ['material' => 'Sandstone', 'origin' => 'Dholpur, Rajasthan', 'colour' => 'Even beige', 'finishes' => $sandstoneFinishes, 'uses' => ['Elevations and cladding', 'Outdoor paving', 'Temple architecture', 'Jaalis']],
            'body' => [
                'Dholpur Beige is a fine-grained sandstone with a soft, even beige colour. Its consistency makes it ideal for large elevations and carved temple work.',
                'It takes chiselled and rock-face finishes beautifully and stays comfortable underfoot as paving.',
            ],
            'pairs' => 'red sandstone bands, white trims and green landscaping.',
        ],
        'faqs' => [
            ['Is Dholpur Beige good for elevation?', 'Yes. Its even colour and fine grain suit large elevations and carved details.'],
            ['Can Dholpur Beige be carved?', 'Yes. It is widely used for jaalis and temple work.'],
            ['Which finish suits paving?', 'Natural or sandblasted for grip.'],
        ],
    ]),

    $variety([
        'path' => 'sandstone/gwalior-mint',
        'parent' => 'sandstone',
        'name' => 'Gwalior Mint',
        'title' => 'Gwalior Mint Sandstone',
        'photo' => 'sandstone-yellow',
        'intro' => 'Cream sandstone with soft pink and brown swirls, popular for decorative elevations.',
        'content' => [
            'specs' => ['material' => 'Sandstone', 'origin' => 'Gwalior, Madhya Pradesh', 'colour' => 'Cream with pink and brown swirls', 'finishes' => $sandstoneFinishes, 'uses' => ['Elevations and cladding', 'Feature walls', 'Paving']],
            'body' => [
                'Gwalior Mint (also called Mint sandstone) has a cream base with gentle swirls of pink and brown. The pattern adds warmth and movement to building fronts.',
                'It is often used as cladding and for feature walls inside and out.',
            ],
            'pairs' => 'plain cream walls, wood and greenery.',
        ],
        'faqs' => [
            ['What does Gwalior Mint look like?', 'Cream with soft pink and brown swirls.'],
            ['Is Gwalior Mint good for elevations?', 'Yes. Its pattern makes a decorative facade.'],
            ['Can it be used indoors?', 'Yes, for feature walls with a honed or natural finish.'],
        ],
    ]),

    $variety([
        'path' => 'sandstone/lalitpur-yellow',
        'parent' => 'sandstone',
        'name' => 'Lalitpur Yellow',
        'title' => 'Lalitpur Yellow Sandstone',
        'photo' => 'sandstone-yellow',
        'intro' => 'A warm yellow sandstone for bright elevations and garden paving.',
        'content' => [
            'specs' => ['material' => 'Sandstone', 'origin' => 'Lalitpur, Uttar Pradesh', 'colour' => 'Warm yellow', 'finishes' => $sandstoneFinishes, 'uses' => ['Elevations and cladding', 'Garden paving', 'Boundary walls']],
            'body' => [
                'Lalitpur Yellow is a sunny yellow sandstone that brings warmth to elevations and gardens.',
                'It pairs well with red and beige sandstone in patterned paving.',
            ],
            'pairs' => 'red sandstone, white trims and green landscaping.',
        ],
        'faqs' => [
            ['Is Lalitpur Yellow good for paving?', 'Yes, especially in natural or sandblasted finishes.'],
            ['Does yellow sandstone fade?', 'Natural sandstone mellows gently over time; sealing helps keep it fresh.'],
            ['Can it be combined with other colours?', 'Yes. It works well in patterns with red and beige sandstone.'],
        ],
    ]),

    $variety([
        'path' => 'sandstone/agra-red',
        'parent' => 'sandstone',
        'name' => 'Agra Red',
        'title' => 'Agra Red Sandstone',
        'photo' => 'sandstone-jaali',
        'featured' => true,
        'intro' => 'Deep red sandstone in the style of India’s great forts and monuments, for heritage-style elevations and jaalis.',
        'content' => [
            'specs' => ['material' => 'Sandstone', 'colour' => 'Deep red', 'finishes' => $sandstoneFinishes, 'uses' => ['Heritage elevations', 'Jaalis', 'Temple architecture', 'Boundary walls']],
            'body' => [
                'Agra Red is a rich red sandstone of the kind seen in India’s historic forts and monuments. It gives buildings a grand, heritage character.',
                'It carves well, so it is a natural choice for jaalis, pillars and temple details.',
            ],
            'pairs' => 'cream or beige sandstone and white marble accents.',
        ],
        'faqs' => [
            ['Is Agra Red good for jaali work?', 'Yes. It carves well and is widely used for jaalis and temple details.'],
            ['Can Agra Red be used for paving?', 'Yes, with a natural or sandblasted finish.'],
            ['Agra Red or Dholpur Red?', 'Both are reds; compare the shade of current stock at the showroom.'],
        ],
    ]),

    $variety([
        'path' => 'sandstone/dholpur-red-pink',
        'parent' => 'sandstone',
        'name' => 'Dholpur Red & Pink',
        'title' => 'Dholpur Red and Pink Sandstone',
        'photo' => 'stone-paving',
        'intro' => 'Dholpur sandstone in red and pink shades for elevations, paving and boundary walls.',
        'content' => [
            'specs' => ['material' => 'Sandstone', 'origin' => 'Dholpur, Rajasthan', 'colour' => 'Red and pink', 'finishes' => $sandstoneFinishes, 'uses' => ['Elevations and cladding', 'Outdoor paving', 'Boundary walls']],
            'body' => [
                'Dholpur sandstone also comes in red and pink shades with the same fine grain as Dholpur Beige. The pink is softer; the red is warmer and deeper.',
                'Both are used for elevations, paving and boundary walls, often combined with beige.',
            ],
            'pairs' => 'Dholpur Beige, white trims and greenery.',
        ],
        'faqs' => [
            ['Are Dholpur Red and Dholpur Pink different stones?', 'They are different shades of Dholpur sandstone.'],
            ['Can I mix Dholpur colours?', 'Yes. Beige with red or pink makes attractive bands and borders.'],
            ['Is it good for boundary walls?', 'Yes, especially in natural or rock-face finishes.'],
        ],
    ]),

    $variety([
        'path' => 'sandstone/jodhpur-pink',
        'parent' => 'sandstone',
        'name' => 'Jodhpur Pink',
        'title' => 'Jodhpur Pink Sandstone',
        'photo' => 'sandstone-texture',
        'featured' => true,
        'intro' => 'A soft pink sandstone with natural layers, beloved for elevations and temple work.',
        'content' => [
            'specs' => ['material' => 'Sandstone', 'origin' => 'Jodhpur, Rajasthan', 'colour' => 'Pink with natural layers', 'finishes' => $sandstoneFinishes, 'uses' => ['Elevations and cladding', 'Temple architecture', 'Jaalis', 'Paving']],
            'body' => [
                'Jodhpur Pink is a pink sandstone with gentle natural layering. It gives elevations and temples a warm, graceful look.',
                'It carves well and is used for jaalis, pillars and decorative details as well as cladding.',
            ],
            'pairs' => 'white marble, cream walls and brass.',
        ],
        'faqs' => [
            ['Is Jodhpur Pink good for temples?', 'Yes. It is widely used for temple architecture and carved details.'],
            ['Does Jodhpur Pink vary in colour?', 'Yes. Natural layers vary, so see the stock before choosing.'],
            ['Which finish suits an elevation?', 'Chiselled or rock-face for texture, honed for a smooth modern look.'],
        ],
    ]),

    $variety([
        'path' => 'sandstone/kandla-grey',
        'parent' => 'sandstone',
        'name' => 'Kandla Grey',
        'title' => 'Kandla Grey Sandstone',
        'photo' => 'sandstone-grey',
        'intro' => 'A cool grey sandstone for modern paving, cladding and gardens.',
        'content' => [
            'specs' => ['material' => 'Sandstone', 'colour' => 'Cool grey', 'finishes' => $sandstoneFinishes, 'uses' => ['Outdoor paving', 'Garden landscaping', 'Cladding']],
            'body' => [
                'Kandla Grey is a grey sandstone with a fine, even texture. It suits modern homes and gardens where a neutral, cool tone is wanted.',
                'It is popular for patios, paths and driveway paving.',
            ],
            'pairs' => 'white walls, black fittings and green planting.',
        ],
        'faqs' => [
            ['Is Kandla Grey good for patios?', 'Yes. It is a popular paving stone with natural or sandblasted finishes.'],
            ['Does Kandla Grey suit modern homes?', 'Yes. Its neutral grey pairs well with clean, contemporary designs.'],
            ['Can it be used for cladding?', 'Yes.'],
        ],
    ]),

    $variety([
        'path' => 'sandstone/raj-green',
        'parent' => 'sandstone',
        'name' => 'Raj Green',
        'title' => 'Raj Green Sandstone',
        'photo' => 'stone-cladding',
        'intro' => 'A green-grey Rajasthan sandstone for natural-looking paving and walls.',
        'content' => [
            'specs' => ['material' => 'Sandstone', 'origin' => 'Rajasthan', 'colour' => 'Green-grey', 'finishes' => $sandstoneFinishes, 'uses' => ['Garden paving', 'Cladding', 'Boundary walls']],
            'body' => [
                'Raj Green is a sandstone in muted green-grey tones. It blends naturally into gardens and landscaped areas.',
                'It is used for paths, cladding and boundary walls where a calm, earthy colour is wanted.',
            ],
            'pairs' => 'greenery, wood and cream walls.',
        ],
        'faqs' => [
            ['What colour is Raj Green?', 'A muted green-grey.'],
            ['Is Raj Green good for gardens?', 'Yes. Its earthy tone blends with planting.'],
            ['Can it be used for walls?', 'Yes, as cladding or boundary walls.'],
        ],
    ]),

];

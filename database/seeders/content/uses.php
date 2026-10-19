<?php

/*
| Shop by use: each page recommends materials, services and supplies
| (from the "Shop By Use" table in business-brief.md).
*/

return [

    [
        'path' => 'kitchen',
        'name' => 'Kitchen',
        'title' => 'Kitchen platform stone and supplies',
        'seo_title' => 'Kitchen Granite & Platform Stone in Kutch | Shyam Granite',
        'meta_description' => 'Granite, Nano White and artificial granite for kitchen platforms in Kutch, with sinks, epoxy grout, cut-outs and edge moulding from one shop.',
        'summary' => 'Platforms, sinks and grout',
        'intro' => 'Everything for a stone kitchen platform in one place: the granite or Nano White, the sink, the cut-outs and edge work, and the grout for your backsplash.',
        'photo' => 'kitchen-island',
        'content' => [
            'product' => 'a kitchen platform',
            'blocks' => [
                [
                    'type' => 'links',
                    'title' => 'Recommended stone',
                    'intro' => 'Dense South Indian granite is the classic platform stone. Nano White suits a bright white kitchen.',
                    'paths' => ['granite/black-galaxy', 'granite/tan-brown', 'granite/steel-grey', 'granite/absolute-black', 'granite/nano-white', 'granite/artificial-granite'],
                ],
                [
                    'type' => 'features',
                    'title' => 'Decisions to make',
                    'items' => [
                        ['icon' => 'stack', 'title' => 'Colour and pattern', 'text' => 'Speckled granites hide crumbs and spills; solid colours look cleaner but show marks.'],
                        ['icon' => 'sparkle', 'title' => 'Finish', 'text' => 'Polished is easiest to wipe. Leather hides fingerprints on dark stone.'],
                        ['icon' => 'bezier-curve', 'title' => 'Edge', 'text' => 'Half bullnose is the most popular. Double-edge makes an island look thicker.'],
                        ['icon' => 'ruler', 'title' => 'Sink and hob', 'text' => 'Choose the sink first so the cut-out is made to fit it exactly.'],
                    ],
                ],
                [
                    'type' => 'links',
                    'title' => 'Sinks, processing and supplies',
                    'paths' => ['kitchen-sinks', 'services/granite-cutting', 'services/granite-moulding', 'epoxy-grout'],
                ],
            ],
        ],
        'faqs' => [
            ['What is the best granite colour for a kitchen?', 'Black Galaxy, Tan Brown, Steel Grey and Absolute Black are the most popular. Speckled stones hide everyday marks best.'],
            ['Granite or Nano White for a kitchen?', 'Granite is natural and very heat-resistant with a speckled pattern. Nano White is a bright, solid white that doesn’t absorb stains.'],
            ['How do I measure my kitchen for granite?', 'Measure each run of wall, mark the sink and hob positions, and note corners and wall ends. Send a sketch on WhatsApp and we will confirm.'],
        ],
    ],

    [
        'path' => 'flooring',
        'name' => 'Flooring',
        'title' => 'Flooring stone in Kutch',
        'seo_title' => 'Flooring Stone & Marble Flooring in Kutch | Shyam Granite',
        'meta_description' => 'Italian and Indian marble, granite and Kota stone flooring in Kutch, with tile adhesive, cutting and polishing from our Adipur showroom and workshop.',
        'summary' => 'Marble, granite and Kota',
        'intro' => 'From Italian marble living rooms to hard-wearing Kota stone parking areas, choose the right flooring stone and the adhesive to lay it.',
        'photo' => 'marble-floor',
        'content' => [
            'product' => 'flooring stone',
            'blocks' => [
                [
                    'type' => 'table',
                    'title' => 'Which floor where?',
                    'head' => ['Space', 'Good choices', 'Why'],
                    'rows' => [
                        ['Living and dining rooms', 'Italian marble, Makrana or Rajnagar white, Nano White', 'Bright, elegant and smooth underfoot'],
                        ['Bedrooms', 'Indian marble, Botticino, Dyna', 'Warm, calm tones'],
                        ['Stairs and entrances', 'Granite, Kota stone', 'Hard-wearing with a grippy finish'],
                        ['Balconies and terraces', 'Kota stone, sandstone, flamed granite', 'Non-slip and weather-resistant'],
                        ['Parking and industrial', 'Kota stone (rough or machine-cut)', 'Takes heavy loads at low cost'],
                    ],
                ],
                [
                    'type' => 'links',
                    'title' => 'Popular flooring stone',
                    'paths' => ['marble/italian-marble', 'marble/indian-marble', 'kota-stone', 'granite/rajasthan-granite'],
                ],
                [
                    'type' => 'links',
                    'title' => 'Processing and supplies',
                    'paths' => ['services/granite-cutting', 'services/granite-polishing', 'chemicals-adhesives'],
                ],
            ],
        ],
        'faqs' => [
            ['Marble or granite for flooring?', 'Marble looks softer and more luxurious; granite is harder and better for heavy traffic, stairs and outdoors.'],
            ['Kota stone or vitrified tiles?', 'Kota stone is natural, non-slip and takes heavy loads. Tiles offer more colours but can chip under heavy use.'],
            ['Should stone floors be laid with adhesive?', 'Many fitters now use tile or stone adhesive instead of cement mortar for a stronger, even bed. We stock UltraTech and Astral adhesives.'],
        ],
    ],

    [
        'path' => 'pooja-home',
        'name' => 'Pooja & Home',
        'title' => 'Pooja room marble and stone for the home',
        'seo_title' => 'Pooja Room Marble & Mandirs in Kutch | Shyam Granite',
        'meta_description' => 'Marble mandirs, murtis, Tulsi kyara and engraved name plates for homes in Kutch, made to order by Shyam Granite in Adipur.',
        'summary' => 'Mandirs, murtis, name plates',
        'intro' => 'Marble mandirs, murtis, Tulsi kyara and name plates: the stone pieces that make a house a home, made to order through our Shilp Kala work.',
        'photo' => 'temple-white',
        'content' => [
            'product' => 'a pooja room piece',
            'blocks' => [
                [
                    'type' => 'links',
                    'title' => 'For the pooja room',
                    'paths' => ['shilp-kala/marble-mandir', 'shilp-kala/murtis', 'shilp-kala/inlay-work'],
                ],
                [
                    'type' => 'links',
                    'title' => 'For the entrance and courtyard',
                    'paths' => ['shilp-kala/name-plates', 'shilp-kala/tulsi-kyara', 'shilp-kala/fountains-planters'],
                ],
                [
                    'type' => 'prose',
                    'title' => 'Planning for Griha Pravesh and Diwali',
                    'body' => [
                        'Custom pieces take time, and demand rises around Diwali and Griha Pravesh muhurats. Share your size and design early so your mandir, murtis or name plate are ready for the day.',
                        'White Makrana and Ambaji marble are the traditional choices for pooja rooms. See them at the showroom before you decide.',
                    ],
                ],
            ],
        ],
        'faqs' => [
            ['Which marble is best for a pooja room?', 'White Makrana and Ambaji marble are the traditional choices for mandirs and murtis.'],
            ['Can I order a name plate for my Griha Pravesh?', 'Yes. Send the exact wording and the date you need it, and order early around popular muhurats.'],
            ['Do you make pooja room flooring?', 'Yes. White Indian marble suits pooja rooms. See our marble range.'],
        ],
    ],

    [
        'path' => 'elevation-outdoor',
        'name' => 'Elevation & Outdoor',
        'title' => 'Elevation and outdoor stone',
        'seo_title' => 'Elevation & Outdoor Paving Stone in Kutch | Shyam Granite',
        'meta_description' => 'Sandstone, Rajasthan granite and Kota stone for house elevations, cladding, outdoor paving and gardens in Kutch, with flamed finishes for grip.',
        'summary' => 'Sandstone and flamed granite',
        'intro' => 'Stone for building fronts, boundary walls, paths and gardens: sandstone for character, Rajasthan granite for strength, and Kota stone for practical paving.',
        'photo' => 'sandstone-arch',
        'content' => [
            'product' => 'elevation and outdoor stone',
            'blocks' => [
                [
                    'type' => 'links',
                    'title' => 'Recommended stone',
                    'paths' => ['sandstone', 'granite/rajasthan-granite', 'kota-stone'],
                ],
                [
                    'type' => 'table',
                    'title' => 'Finishes for outdoors',
                    'head' => ['Finish', 'Stone', 'Why'],
                    'rows' => [
                        ['Flamed', 'Granite', 'Rough, non-slip surface for steps and paving'],
                        ['Rock-face / chiselled', 'Sandstone', 'Bold texture for elevations and walls'],
                        ['Natural / sandblasted', 'Sandstone, Kota stone', 'Grip for paths, patios and parking'],
                        ['Lapotra', 'Granite, Kota stone', 'Semi-polished with grip for steps'],
                    ],
                ],
                [
                    'type' => 'links',
                    'title' => 'Garden and heritage details',
                    'paths' => ['shilp-kala/jaali-work', 'shilp-kala/fountains-planters', 'services/granite-cutting'],
                ],
            ],
        ],
        'faqs' => [
            ['Which stone is best for a house elevation?', 'Sandstone such as Dholpur Beige, Jodhpur Pink or Gwalior Mint is popular for character; Rajasthan granite like Lakha Red is stronger and lower-maintenance.'],
            ['Which finish stops outdoor steps being slippery?', 'Flamed granite, lapotra or natural sandstone and Kota finishes give good grip.'],
            ['Does outdoor stone need sealing?', 'Sealing helps sandstone and light granite resist water and stains. We stock sealers.'],
        ],
    ],

    [
        'path' => 'commercial',
        'name' => 'Commercial',
        'title' => 'Commercial stone supplier in Kutch',
        'seo_title' => 'Commercial Stone Supplier in Kutch | Shyam Granite',
        'meta_description' => 'Granite counters, table tops, marble and Kota stone flooring for restaurants, offices and showrooms in Kutch, with cutting and moulding in-house.',
        'summary' => 'Counters, table tops, floors',
        'intro' => 'Restaurants, offices, hotels and showrooms need stone that looks good and takes daily wear. We supply counters, table tops and flooring, cut and moulded to size.',
        'photo' => 'lobby-marble',
        'content' => [
            'product' => 'a commercial project',
            'blocks' => [
                [
                    'type' => 'features',
                    'title' => 'What businesses order',
                    'items' => [
                        ['icon' => 'storefront', 'title' => 'Counters', 'text' => 'Reception desks, bar and service counters in granite, marble or onyx.'],
                        ['icon' => 'check', 'title' => 'Table tops', 'text' => 'Café and restaurant tops in granite and Nano White, cut to size in bulk.'],
                        ['icon' => 'stack', 'title' => 'Flooring', 'text' => 'Marble for lobbies; granite and Kota stone for high-traffic and service areas.'],
                        ['icon' => 'truck', 'title' => 'Bulk orders', 'text' => 'Large slab orders for builders and contractors.'],
                    ],
                ],
                [
                    'type' => 'links',
                    'title' => 'Popular for commercial spaces',
                    'paths' => ['table-tops', 'kota-stone', 'marble/onyx', 'granite/south-indian-granite'],
                ],
                [
                    'type' => 'links',
                    'title' => 'Processing',
                    'paths' => ['services/granite-cutting', 'services/granite-moulding', 'services/granite-polishing'],
                ],
            ],
        ],
        'faqs' => [
            ['Do you take bulk orders?', 'Yes. We serve single-piece buyers and large project orders for builders, contractors and businesses.'],
            ['Which stone is best for restaurant table tops?', 'Dark granite and Nano White are the most practical: they resist stains and heat.'],
            ['Can you supply matching tops for many tables?', 'Yes. We cut and mould table tops in bulk to the same size and edge.'],
        ],
    ],

];

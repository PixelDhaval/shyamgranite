<?php

/*
| Area pages (strategy: six at launch, maximum ten).
| Distances are approximate road distances from Adipur and should be
| checked by the owners, along with local landmarks and photos of supplies
| delivered to each town, before launch (SEO-STRATEGY.md §6).
*/

$area = fn (array $page): array => [
    'template' => 'page',
    ...$page,
    'content' => ['schema' => 'area', 'generic_cta' => true, ...$page['content']],
];

$visitBlock = [
    'type' => 'locations',
    'title' => 'Visit us in Adipur',
    'intro' => 'See the slabs at the showroom on Rambaug Road; processing happens at our GIDC workshop.',
];

return [

    $area([
        'path' => 'areas/gandhidham',
        'name' => 'Gandhidham',
        'title' => 'Granite dealer for Gandhidham',
        'seo_title' => 'Granite Dealer in Gandhidham | Shyam Granite',
        'meta_description' => 'Granite, marble, Kota stone and sandstone for Gandhidham homes and businesses, from Shyam Granite in neighbouring Adipur. WhatsApp for today’s rate.',
        'summary' => 'Stone for Gandhidham homes, offices and commercial projects.',
        'intro' => 'Gandhidham and Adipur are twin towns, and our showroom on Rambaug Road is a short drive from anywhere in Gandhidham. Many customers simply call it their local granite shop.',
        'photo' => 'lobby-floor',
        'content' => [
            'blocks' => [
                [
                    'type' => 'prose',
                    'title' => 'Stone for a busy commercial town',
                    'body' => [
                        'As Kutch’s main commercial centre near Deendayal Port at Kandla, Gandhidham is always building: offices, shops, showrooms, apartments and new homes. That means steady demand for hard-wearing granite, marble flooring and Kota stone.',
                        'For shops and offices, granite and Kota stone handle heavy footfall. For homes, customers often pair a South Indian granite kitchen platform with Italian or Indian marble floors.',
                        'Because Gandhidham is right next to Adipur, you can visit the showroom, choose the actual slabs and have them processed at our GIDC workshop without travelling far.',
                    ],
                ],
                [
                    'type' => 'links',
                    'title' => 'Often chosen in Gandhidham',
                    'paths' => ['granite/south-indian-granite', 'marble/italian-marble', 'kota-stone', 'commercial'],
                ],
                $visitBlock,
            ],
        ],
        'faqs' => [
            ['How far is your showroom from Gandhidham?', 'Adipur is Gandhidham’s twin town, so the Rambaug Road showroom is a short drive from most of Gandhidham.'],
            ['Do you supply commercial projects in Gandhidham?', 'Yes. We supply counters, table tops and flooring for offices, shops and restaurants, and bulk slabs for builders.'],
            ['How do I get today’s rate?', 'WhatsApp the stone name and measurements to +91 78787 78287.'],
        ],
    ]),

    $area([
        'path' => 'areas/adipur',
        'name' => 'Adipur',
        'title' => 'Granite shop in Adipur',
        'seo_title' => 'Granite Shop in Adipur, Kutch | Shyam Granite',
        'meta_description' => 'Shyam Granite’s showroom and workshop are in Adipur: granite, marble, Kota stone and sandstone, cut and polished to size on Rambaug Road and in GIDC.',
        'summary' => 'Our home town: showroom on Rambaug Road, workshop in GIDC.',
        'intro' => 'Adipur is home to both our showroom on Rambaug Road and our processing workshop in GIDC. Since 2005, Adipur families have come to us for kitchens, floors, mandirs and name plates.',
        'photo' => 'kitchen-hero',
        'content' => [
            'blocks' => [
                [
                    'type' => 'prose',
                    'title' => 'Your local stone shop',
                    'body' => [
                        'Being in Adipur means you can see the stone, talk to Pravin or Chirag Sorathiya in person and drop off measurements the same day. Our workshop in GIDC Adipur then cuts, polishes and moulds your pieces.',
                        'Adipur customers often come for kitchen platforms in Black Galaxy, Tan Brown or Nano White, marble flooring for new homes, and Shilp Kala pieces such as marble mandirs, Tulsi kyara and name plates around festivals and Griha Pravesh.',
                    ],
                ],
                [
                    'type' => 'links',
                    'title' => 'Popular with Adipur customers',
                    'paths' => ['kitchen', 'marble/indian-marble', 'shilp-kala', 'kitchen-sinks'],
                ],
                $visitBlock,
            ],
        ],
        'faqs' => [
            ['Where in Adipur are you?', 'The showroom is at Plot No. 494, Ward 5/B, Rambaug Road, and the workshop at Plot No. 45, Ward 1/B, GIDC, Adipur.'],
            ['Is the showroom open on Sunday?', 'Yes, from 9 AM to 1 PM. Monday to Saturday it is open from 9 AM to 7 PM.'],
            ['Can I bring my measurements to the workshop?', 'Yes. The workshop is open Sunday to Friday 9 AM to 6 PM and Saturday 9 AM to 1 PM.'],
        ],
    ]),

    $area([
        'path' => 'areas/anjar',
        'name' => 'Anjar',
        'title' => 'Granite dealer for Anjar',
        'seo_title' => 'Granite Dealer in Anjar, Kutch | Shyam Granite',
        'meta_description' => 'Granite, marble, sandstone and Kota stone for Anjar homes, temples and shops, from Shyam Granite in Adipur, about 15 km away. WhatsApp for rates.',
        'summary' => 'Stone for Anjar homes, temples and shops.',
        'intro' => 'Anjar is about 15 km from our Adipur showroom. Customers from Anjar come to us for kitchen granite, marble flooring, sandstone elevations and temple work.',
        'photo' => 'sandstone-arch',
        'content' => [
            'blocks' => [
                [
                    'type' => 'prose',
                    'title' => 'An old town with new homes',
                    'body' => [
                        'Anjar is one of Kutch’s oldest towns, largely rebuilt after the 2001 earthquake. Today it mixes traditional neighbourhoods with new housing, which brings demand for both heritage-style sandstone and modern granite and marble.',
                        'For temples and traditional homes, Jodhpur Pink and Dholpur sandstone, jaali work and white marble mandirs are popular. For new homes, granite kitchen platforms and marble or Kota stone floors are the usual choices.',
                    ],
                ],
                [
                    'type' => 'links',
                    'title' => 'Often chosen in Anjar',
                    'paths' => ['sandstone', 'shilp-kala/marble-mandir', 'granite', 'kota-stone'],
                ],
                $visitBlock,
            ],
        ],
        'faqs' => [
            ['How far is Shyam Granite from Anjar?', 'Our Adipur showroom is about 15 km from Anjar.'],
            ['Do you supply stone for temples in Anjar?', 'Yes. We supply sandstone and marble and make mandirs, jaali and Shila Lekh through our Shilp Kala work.'],
            ['Can I get photos of slabs before travelling?', 'Yes. WhatsApp us on +91 78787 78287 and we will send photos of current stock.'],
        ],
    ]),

    $area([
        'path' => 'areas/bhuj',
        'name' => 'Bhuj',
        'title' => 'Granite dealer for Bhuj',
        'seo_title' => 'Granite Dealer for Bhuj, Kutch | Shyam Granite',
        'meta_description' => 'Granite, Italian and Indian marble, sandstone and Kota stone for Bhuj projects, from Shyam Granite in Adipur. WhatsApp measurements for today’s rate.',
        'summary' => 'Stone for Bhuj homes, institutions and heritage-style buildings.',
        'intro' => 'Bhuj, the district headquarters of Kutch, is about 50 km from our Adipur showroom. Customers from Bhuj often send their measurements on WhatsApp first, then visit once to choose the slabs.',
        'photo' => 'temple-pillars',
        'content' => [
            'blocks' => [
                [
                    'type' => 'prose',
                    'title' => 'Planning a Bhuj order from a distance',
                    'body' => [
                        'Because Bhuj is a drive away, it helps to plan: send the stone you are considering, your measurements and the finish you want on WhatsApp. We reply with today’s rate and photos of the slabs in stock.',
                        'Make one visit to the showroom to confirm the actual slabs, and our workshop processes everything to size so your fitter in Bhuj receives pieces ready to lay.',
                        'Bhuj has a strong heritage character, and sandstone elevations, carved jaali and marble temple work are as popular as modern granite kitchens and Italian marble floors.',
                    ],
                ],
                [
                    'type' => 'links',
                    'title' => 'Often chosen in Bhuj',
                    'paths' => ['marble/italian-marble', 'sandstone', 'shilp-kala', 'granite/south-indian-granite'],
                ],
                $visitBlock,
            ],
        ],
        'faqs' => [
            ['How far is your showroom from Bhuj?', 'About 50 km by road to Adipur.'],
            ['Can I order without visiting?', 'You can start on WhatsApp with photos and rates. Natural stone varies, so we recommend one visit to confirm the slabs.'],
            ['How do I get the stone to Bhuj?', 'Ask us about getting your order to Bhuj when you confirm it.'],
        ],
    ]),

    $area([
        'path' => 'areas/mundra',
        'name' => 'Mundra',
        'title' => 'Granite supplier for Mundra',
        'seo_title' => 'Granite Supplier for Mundra, Kutch | Shyam Granite',
        'meta_description' => 'Kota stone, granite and marble for Mundra homes, offices and industrial units, from Shyam Granite in Adipur. Bulk and single-piece orders.',
        'summary' => 'Stone for Mundra homes, offices and industrial floors.',
        'intro' => 'Mundra, with its port and industrial area, is about 60 km from our Adipur showroom. We supply stone for homes, offices and industrial units there, from single pieces to bulk orders.',
        'photo' => 'kota-floor',
        'content' => [
            'blocks' => [
                [
                    'type' => 'prose',
                    'title' => 'Hard-wearing stone for a working town',
                    'body' => [
                        'Mundra’s port and industrial growth means plenty of warehouses, offices, staff housing and new homes. For industrial floors, parking and service areas, Kota stone in rough or machine-cut finishes takes heavy loads at low cost.',
                        'For offices and homes, granite kitchen platforms and marble or granite floors are the usual choices. Builders and contractors can order bulk slabs, and our workshop cuts everything to size.',
                    ],
                ],
                [
                    'type' => 'links',
                    'title' => 'Often chosen in Mundra',
                    'paths' => ['kota-stone', 'granite/rajasthan-granite', 'commercial', 'chemicals-adhesives'],
                ],
                $visitBlock,
            ],
        ],
        'faqs' => [
            ['Do you supply bulk Kota stone for Mundra projects?', 'Yes. We supply Kota stone and granite in bulk for builders and contractors.'],
            ['How far is Shyam Granite from Mundra?', 'About 60 km by road to our Adipur showroom.'],
            ['Can you cut stone to size before it goes to Mundra?', 'Yes. Our workshop cuts, polishes and moulds pieces to your measurements.'],
        ],
    ]),

    $area([
        'path' => 'areas/mandvi',
        'name' => 'Mandvi',
        'title' => 'Granite dealer for Mandvi',
        'seo_title' => 'Granite Dealer for Mandvi, Kutch | Shyam Granite',
        'meta_description' => 'Granite, marble, sandstone and Shilp Kala for Mandvi homes and temples, from Shyam Granite in Adipur. WhatsApp measurements for today’s rate.',
        'summary' => 'Stone for Mandvi homes, temples and coastal houses.',
        'intro' => 'Mandvi, the coastal town known for its beach and traditional shipbuilding, is about 90 km from our Adipur showroom. Customers from Mandvi often start on WhatsApp and visit once to choose.',
        'photo' => 'stone-paving',
        'content' => [
            'blocks' => [
                [
                    'type' => 'prose',
                    'title' => 'Stone for the coast',
                    'body' => [
                        'Near the sea, stone needs to handle humidity and salty air. Granite is a strong choice for outdoor steps, paving and elevations, and a flamed finish keeps it from becoming slippery.',
                        'Inside, Mandvi homes favour marble floors, granite kitchens and Shilp Kala pieces such as marble mandirs and Tulsi kyara. Sealing light stones helps them stay fresh in coastal conditions.',
                    ],
                ],
                [
                    'type' => 'links',
                    'title' => 'Often chosen in Mandvi',
                    'paths' => ['elevation-outdoor', 'marble', 'pooja-home', 'granite'],
                ],
                $visitBlock,
            ],
        ],
        'faqs' => [
            ['How far is your showroom from Mandvi?', 'About 90 km by road to Adipur.'],
            ['Which stone suits a coastal home?', 'Granite is very durable outdoors; flamed finishes add grip. Seal light-coloured stones to protect them from moisture.'],
            ['Can I see slabs before travelling from Mandvi?', 'Yes. WhatsApp +91 78787 78287 for photos of current stock.'],
        ],
    ]),

];

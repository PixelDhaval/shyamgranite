<?php

/*
| Services: processing done in-house at the GIDC workshop. Installation is
| never included. Turnaround depends on the work queue, so no fixed times.
*/

$materialsProcessed = ['Granite', 'Marble', 'Kota stone', 'Nano White', 'Engineered stone'];

return [

    [
        'path' => 'services',
        'template' => 'collection',
        'name' => 'Services',
        'title' => 'Granite cutting, polishing and moulding in Adipur',
        'seo_title' => 'Granite Cutting, Polishing & Moulding in Kutch',
        'meta_description' => 'Stone processing at our GIDC Adipur workshop: cutting to size, sink and hob cut-outs, mirror, leather and lapotra polishing, and edge moulding.',
        'summary' => 'Processing to your measurements at our GIDC workshop.',
        'intro' => 'Our workshop in GIDC Adipur cuts, polishes and moulds stone to your measurements, so your fitter receives pieces that are ready to lay.',
        'photo' => 'stone-cutting',
        'content' => [
            'range_title' => 'What the workshop does',
            'blocks' => [
                [
                    'type' => 'features',
                    'title' => 'How it works',
                    'items' => [
                        ['icon' => 'storefront', 'title' => 'Choose the stone', 'text' => 'Pick your slab at the Rambaug Road showroom, or bring stone you already own.'],
                        ['icon' => 'ruler', 'title' => 'Share measurements', 'text' => 'Give us the sizes, cut-outs, finish and edge profile, or a sketch from your fitter.'],
                        ['icon' => 'factory', 'title' => 'We process it', 'text' => 'The workshop cuts, polishes and moulds each piece to your measurements.'],
                        ['icon' => 'truck', 'title' => 'Collect and fit', 'text' => 'Pieces are ready for your own fitter. Installation is not included.'],
                    ],
                ],
                [
                    'type' => 'chips',
                    'title' => 'Materials we process',
                    'intro' => 'All three services work on the same range of stone.',
                    'items' => $materialsProcessed,
                ],
                [
                    'type' => 'callout',
                    'text' => 'Installation is not included in any of our services. Turnaround depends on the size of the job and the workshop queue, so ask for a date when you confirm the order.',
                    'icon' => 'clock',
                ],
            ],
        ],
        'faqs' => [
            ['Can you process stone I bought elsewhere?', 'Ask us with details of the stone and the work you need. We process granite, marble, Kota stone, Nano White and engineered stone.'],
            ['Where is the workshop?', 'Plot No. 45, Ward 1/B, GIDC, Adipur, Kutch, Gujarat 370205. It is open Sunday to Friday from 9 AM to 6 PM and on Saturday from 9 AM to 1 PM.'],
            ['How long does processing take?', 'It depends on the amount of cutting and edge work and on the workshop queue. We give you a date when you confirm the order.'],
        ],
    ],

    [
        'path' => 'services/granite-cutting',
        'parent' => 'services',
        'name' => 'Granite Cutting',
        'title' => 'Granite cutting to size in Adipur',
        'seo_title' => 'Granite Cutting in Gandhidham & Adipur | Shyam Granite',
        'meta_description' => 'Granite and marble cut to size at our Adipur workshop: kitchen platforms, sink and hob cut-outs, steps, risers, skirting and custom shapes.',
        'summary' => 'Cut to size, sink and hob cut-outs, steps, risers and skirting.',
        'intro' => 'We cut slabs to your exact measurements at our GIDC workshop, including sink and hob cut-outs, steps, risers, skirting strips and custom shapes.',
        'photo' => 'stone-cutting',
        'content' => [
            'schema' => 'service',
            'product' => 'granite cutting',
            'blocks' => [
                [
                    'type' => 'features',
                    'title' => 'What we cut',
                    'items' => [
                        ['icon' => 'ruler', 'title' => 'Slabs cut to size', 'text' => 'Kitchen platforms, vanity tops, window sills and door frames cut to your measurements.'],
                        ['icon' => 'check', 'title' => 'Sink and hob cut-outs', 'text' => 'Openings for top-mount and under-mount sinks and for built-in hobs.'],
                        ['icon' => 'stack', 'title' => 'Steps and risers', 'text' => 'Treads and risers for staircases, entrance steps and temple platforms.'],
                        ['icon' => 'bezier-curve', 'title' => 'Skirting strips', 'text' => 'Matching skirting cut from the same stone as the floor.'],
                        ['icon' => 'sparkle', 'title' => 'Custom shapes', 'text' => 'Round and oval table tops, curved platforms and pieces cut from a template.'],
                        ['icon' => 'storefront', 'title' => 'Table tops', 'text' => 'Dining, coffee, office and café tops in granite, marble, tiles and Nano White.'],
                    ],
                ],
                [
                    'type' => 'prose',
                    'title' => 'Measurements that save a second trip',
                    'photo' => 'kitchen-marble-island',
                    'body' => [
                        'For a kitchen platform, measure each run of wall separately and mark where the sink, hob and any corner joins sit. Note whether the platform meets a wall on one side or both.',
                        'If you are buying a sink from us, we cut the opening to fit that exact model. If you already have a sink or hob, bring it or its cut-out template so the opening is right first time.',
                        'Your fitter’s sketch is the best guide. Send it on WhatsApp and we will confirm the sizes before cutting.',
                    ],
                ],
                [
                    'type' => 'chips',
                    'title' => 'Materials we cut',
                    'items' => $materialsProcessed,
                ],
                [
                    'type' => 'links',
                    'title' => 'Often ordered with cutting',
                    'paths' => ['services/granite-moulding', 'kitchen-sinks', 'table-tops'],
                ],
            ],
        ],
        'faqs' => [
            ['Can you cut a sink opening for a sink I already have?', 'Yes. Bring the sink or its cut-out template and we cut the opening to fit it.'],
            ['Do you cut marble and Kota stone too?', 'Yes. Our workshop cuts granite, marble, Kota stone, Nano White and engineered stone.'],
            ['Can you cut round or curved shapes?', 'Yes. We cut round, oval and custom shapes for table tops and platforms. A paper or board template helps for unusual shapes.'],
            ['Do you fit the platform after cutting?', 'No. Installation is not included. Your fitter installs the cut pieces, and we stock the stone adhesive and epoxy they need.'],
        ],
    ],

    [
        'path' => 'services/granite-polishing',
        'parent' => 'services',
        'name' => 'Granite Polishing',
        'title' => 'Granite and marble polishing in Kutch',
        'seo_title' => 'Granite & Marble Polishing in Kutch | Shyam Granite',
        'meta_description' => 'Mirror, honed, leather and lapotra finishes on granite, marble and Kota stone at our Adipur workshop, plus re-polishing of dull or worn slabs.',
        'summary' => 'Mirror, honed, leather and lapotra finishes; re-polishing.',
        'intro' => 'The finish changes how a stone looks and how it feels underfoot. We give granite, marble and Kota stone a mirror, honed, leather or lapotra finish, and re-polish dull or worn slabs.',
        'photo' => 'marble-floor',
        'content' => [
            'schema' => 'service',
            'product' => 'granite polishing',
            'blocks' => [
                [
                    'type' => 'table',
                    'title' => 'Choosing a finish',
                    'intro' => 'The same stone can look quite different in each finish. Ask to see samples at the showroom.',
                    'head' => ['Finish', 'Look and feel', 'Good for'],
                    'rows' => [
                        ['Mirror polish', 'High gloss that deepens the colour and pattern', 'Kitchen platforms, table tops, feature walls, living-room floors'],
                        ['Honed (matt)', 'Smooth with little or no shine', 'Bathrooms, contemporary interiors, floors where glare is a concern'],
                        ['Leather', 'Soft texture with a low sheen that hides fingerprints', 'Kitchen platforms and dark granite in busy homes'],
                        ['Lapotra', 'Semi-polished surface that keeps some texture', 'Steps, outdoor areas and floors that need more grip'],
                    ],
                ],
                [
                    'type' => 'prose',
                    'title' => 'Re-polishing dull or worn slabs',
                    'body' => [
                        'Granite and marble lose their shine over time, especially where acidic spills or daily cleaning wear the surface. A dull slab can often be brought back by re-polishing.',
                        'Bring the slab to our GIDC workshop and we will check its condition and tell you which finish it can take. Deep chips can be filled with matching epoxy before polishing.',
                    ],
                ],
                [
                    'type' => 'chips',
                    'title' => 'Materials we polish',
                    'items' => $materialsProcessed,
                ],
                [
                    'type' => 'links',
                    'title' => 'Related',
                    'paths' => ['services/granite-cutting', 'services/granite-moulding', 'chemicals-adhesives'],
                ],
            ],
        ],
        'faqs' => [
            ['Which finish is best for a kitchen platform?', 'Mirror polish is the most popular because it is easy to wipe clean. Leather finish suits dark granite if you prefer a softer look that hides fingerprints.'],
            ['Is a polished floor slippery?', 'A mirror polish is smoother than honed or lapotra, especially when wet. For bathrooms, steps and outdoor areas we usually suggest honed, lapotra or flamed.'],
            ['Can marble be polished as well as granite?', 'Yes. We polish granite, marble, Kota stone, Nano White and engineered stone.'],
        ],
    ],

    [
        'path' => 'services/granite-moulding',
        'parent' => 'services',
        'name' => 'Granite Moulding',
        'title' => 'Granite edge moulding and profiles',
        'seo_title' => 'Granite Edge Moulding & Profiles | Shyam Granite',
        'meta_description' => 'Granite and marble edge profiles made at our Adipur workshop: half and full bullnose, bevel, ogee, double-edge and waterfall edges.',
        'summary' => 'Bullnose, bevel, ogee, double-edge and waterfall edges.',
        'intro' => 'The edge profile finishes a platform, table top or step. We shape granite, marble and engineered stone edges at our workshop to the profile you choose.',
        'photo' => 'table-tops',
        'content' => [
            'schema' => 'service',
            'product' => 'granite edge moulding',
            'blocks' => [
                [
                    'type' => 'table',
                    'title' => 'Edge profiles we make',
                    'head' => ['Profile', 'Shape', 'Where it suits'],
                    'rows' => [
                        ['Half bullnose', 'Top edge rounded, bottom edge square', 'Kitchen platforms and vanity tops'],
                        ['Full bullnose', 'Fully rounded from top to bottom', 'Table tops, steps and homes with small children'],
                        ['Bevel / chamfer', 'Angled cut along the top edge', 'Clean, modern platforms and window sills'],
                        ['Ogee', 'Decorative S-shaped curve', 'Traditional interiors, dining tables and temple work'],
                        ['Double-edge (laminated)', 'A second strip bonded below for a thicker look', 'Kitchen islands and statement table tops'],
                        ['Waterfall', 'Stone continues down the side of a counter', 'Islands and reception counters'],
                    ],
                ],
                [
                    'type' => 'prose',
                    'title' => 'Choosing an edge',
                    'photo' => 'kitchen-island',
                    'body' => [
                        'Rounded edges such as half or full bullnose are kind to hips and small hands and chip less easily. Sharper profiles like bevel give a crisper, modern line.',
                        'A double-edge makes a standard slab look much thicker, which suits islands and dining tables. Decorative ogee edges work best on pieces people see from the side.',
                    ],
                ],
                [
                    'type' => 'links',
                    'title' => 'Often ordered with moulding',
                    'paths' => ['table-tops', 'services/granite-cutting', 'kitchen'],
                ],
            ],
        ],
        'faqs' => [
            ['Which edge is most popular for kitchens?', 'Half bullnose is the most common choice for kitchen platforms because it looks neat and is comfortable to lean against.'],
            ['Can you make a thicker-looking edge?', 'Yes. A double-edge (laminated) profile bonds a second strip under the edge so the top looks thicker.'],
            ['Do you mould marble and Nano White too?', 'Yes. Moulding works on granite, marble, Kota stone, Nano White and engineered stone.'],
        ],
    ],

];

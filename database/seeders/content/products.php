<?php

/*
| Finished products (table tops, kitchen sinks) and installation supplies
| (chemicals & adhesives, epoxy grout). Supplies are sold only, not applied.
| Sink and grout brands are still to be confirmed (business-brief.md).
*/

return [

    [
        'path' => 'table-tops',
        'name' => 'Table Tops',
        'title' => 'Granite and marble table tops',
        'seo_title' => 'Granite & Marble Table Tops in Kutch | Shyam Granite',
        'meta_description' => 'Dining, coffee, office and café table tops in granite, Italian and Indian marble, tiles and Nano White, cut to any size and shape in Adipur, Kutch.',
        'summary' => 'Dining, coffee, office and café tops cut to any size.',
        'intro' => 'Ready-made or cut to size, our table tops come in granite, Italian marble, Indian marble, tiles and Nano White, with any of our edge profiles.',
        'photo' => 'table-tops',
        'content' => [
            'product' => 'a table top',
            'blocks' => [
                [
                    'type' => 'table',
                    'title' => 'Options',
                    'head' => ['Choice', 'Available'],
                    'rows' => [
                        ['Types', 'Dining, centre / coffee, side, office, restaurant and café, outdoor'],
                        ['Shapes', 'Rectangle, square, round, oval, custom'],
                        ['Materials', 'Granite, Italian marble, Indian marble, tiles, Nano White'],
                        ['Edges', 'Half bullnose, full bullnose, bevel / chamfer, ogee, double-edge, waterfall'],
                    ],
                ],
                [
                    'type' => 'prose',
                    'title' => 'Choosing the right stone',
                    'photo' => 'marble-counter',
                    'body' => [
                        'For everyday dining tables, granite and Nano White shrug off stains and heat. Marble looks beautiful but needs coasters and a sealer, as it can etch with acidic food and drink.',
                        'For cafés and restaurants, dark granite with a full bullnose edge is hard-wearing and comfortable. For outdoor tables, choose granite with a leather or flamed finish.',
                    ],
                ],
                [
                    'type' => 'links',
                    'title' => 'Related',
                    'paths' => ['services/granite-moulding', 'commercial', 'granite/nano-white'],
                ],
            ],
        ],
        'faqs' => [
            ['Can you make a round marble table top?', 'Yes. We cut round, oval and custom shapes in marble, granite and Nano White.'],
            ['Do you sell table bases or legs?', 'We supply the stone top. Your carpenter or fabricator makes or fits the base.'],
            ['Which table top material is easiest to maintain?', 'Granite and Nano White are the easiest; they resist stains and heat.'],
        ],
    ],

    [
        'path' => 'kitchen-sinks',
        'name' => 'Kitchen Sinks',
        'title' => 'Kitchen sinks in Adipur',
        'seo_title' => 'Kitchen Sinks in Adipur, Kutch | Shyam Granite',
        'meta_description' => 'Stainless steel and quartz composite kitchen sinks sized for granite platforms, with sink cut-outs made in-house at our Adipur workshop.',
        'summary' => 'Steel and quartz sinks, with cut-outs made in-house.',
        'intro' => 'Kitchen sinks sized to fit granite and stone countertops. Buy the sink and the platform together and we cut the opening in-house to fit it exactly.',
        'photo' => 'sink-steel',
        'content' => [
            'product' => 'a kitchen sink',
            'blocks' => [
                [
                    'type' => 'table',
                    'title' => 'Sink options',
                    'head' => ['Type', 'Options'],
                    'rows' => [
                        ['Stainless steel', 'Single bowl, double bowl, with drainboard, handmade'],
                        ['Quartz / granite composite', 'Single and double bowl, in black, grey and white'],
                        ['Mounting', 'Top-mount and under-mount'],
                    ],
                ],
                [
                    'type' => 'prose',
                    'title' => 'Steel or quartz?',
                    'photo' => 'sink-composite',
                    'body' => [
                        'Stainless steel sinks are tough, easy to clean and suit busy Indian kitchens with large utensils. Handmade steel sinks have crisp corners for a modern look.',
                        'Quartz composite sinks come in black, grey and white to match your platform, and hide water spots well. Under-mount sinks give a seamless edge; top-mount sinks are simpler to fit.',
                    ],
                ],
                [
                    'type' => 'links',
                    'title' => 'Often ordered together',
                    'paths' => ['services/granite-cutting', 'kitchen', 'epoxy-grout'],
                ],
            ],
        ],
        'faqs' => [
            ['Will you cut the platform for my sink?', 'Yes. Buy the sink with your platform and our workshop cuts the opening to fit.'],
            ['Under-mount or top-mount?', 'Under-mount gives a seamless look and easy wiping; top-mount is simpler to install and replace.'],
            ['Do quartz sinks scratch?', 'Quartz composite sinks are hard-wearing and hide marks well. Avoid dragging heavy metal pans across them.'],
        ],
    ],

    [
        'path' => 'chemicals-adhesives',
        'name' => 'Chemicals & Adhesives',
        'title' => 'Tile and stone adhesives, sealers and chemicals',
        'seo_title' => 'UltraTech Tile & Stone Adhesive in Kutch | Shyam Granite',
        'meta_description' => 'UltraTech and Astral tile adhesive, stone adhesive, epoxy glue, sealers and cleaners in Adipur, Kutch, for fitters, masons and homeowners.',
        'summary' => 'UltraTech and Astral adhesives, glue, sealers and cleaners.',
        'intro' => 'Everything your fitter needs to fix and protect stone and tiles. We stock mostly UltraTech products, with a few from Astral. These are sold only; we don’t apply them.',
        'photo' => 'tiles-grey',
        'content' => [
            'product' => 'tile adhesive and stone chemicals',
            'blocks' => [
                [
                    'type' => 'table',
                    'title' => 'What we stock',
                    'head' => ['Product', 'Use'],
                    'rows' => [
                        ['Tile adhesive', 'Fixing tiles on floors and walls instead of cement mortar'],
                        ['Stone adhesive', 'Fixing heavy granite, marble and large-format slabs'],
                        ['Epoxy / knife-grade glue', 'Joining stone pieces, repairing chips and cracks'],
                        ['Stone sealer / impregnator', 'Protecting marble and granite from stains and water'],
                        ['Stone cleaner and stain remover', 'Cleaning and maintenance'],
                    ],
                ],
                [
                    'type' => 'prose',
                    'title' => 'Why fitters are switching from cement',
                    'body' => [
                        'Tile and stone adhesives are applied in a thin, even bed, so they need less water, hold better and help avoid hollow spots under tiles and slabs.',
                        'Heavy stone and large-format slabs need a stone adhesive rated for the weight. Ask us which product suits your job.',
                    ],
                ],
                [
                    'type' => 'links',
                    'title' => 'Related',
                    'paths' => ['epoxy-grout', 'flooring', 'services/granite-polishing'],
                ],
            ],
        ],
        'faqs' => [
            ['Which brands do you stock?', 'Mostly UltraTech, with a few products from Astral.'],
            ['Do you apply the adhesive or sealer?', 'No. Supplies are sold only. Your fitter or mason applies them.'],
            ['Which adhesive is right for granite slabs?', 'Use a stone adhesive made for heavy stone. Tell us the stone and slab size and we will suggest the product.'],
        ],
    ],

    [
        'path' => 'epoxy-grout',
        'name' => 'Epoxy Grout',
        'title' => 'Epoxy grout in Kutch',
        'seo_title' => 'Epoxy Grout in Kutch | Shyam Granite',
        'meta_description' => 'Stain-resistant, waterproof epoxy grout in white, ivory, grey, black, beige, brown and metallic shades for kitchens, bathrooms and pools in Kutch.',
        'summary' => 'Stain-resistant, waterproof grout in many colours.',
        'intro' => 'Epoxy grout fills tile and stone joints with a stain-resistant, waterproof finish that stays clean far longer than cement grout. Sold only; your fitter applies it.',
        'photo' => 'tiles-grout',
        'content' => [
            'product' => 'epoxy grout',
            'blocks' => [
                [
                    'type' => 'chips',
                    'title' => 'Colours',
                    'intro' => 'Plus many more shades to match your tiles. Metallic and glitter grout is also available.',
                    'items' => ['White', 'Ivory', 'Grey', 'Black', 'Beige', 'Brown', 'Metallic / glitter'],
                ],
                [
                    'type' => 'features',
                    'title' => 'Where epoxy grout is worth it',
                    'items' => [
                        ['icon' => 'check', 'title' => 'Kitchens', 'text' => 'Resists oil, turmeric and food stains on backsplashes and floors.'],
                        ['icon' => 'check', 'title' => 'Bathrooms', 'text' => 'Waterproof joints that resist mould and discolouring.'],
                        ['icon' => 'check', 'title' => 'Swimming pools', 'text' => 'Holds up to constant water.'],
                        ['icon' => 'check', 'title' => 'High-traffic floors', 'text' => 'Hard-wearing joints that don’t crumble or darken.'],
                    ],
                ],
            ],
        ],
        'faqs' => [
            ['Is epoxy grout better than cement grout?', 'For kitchens, bathrooms and busy floors, yes. It is stain-resistant and waterproof, and it doesn’t crumble or darken like cement grout.'],
            ['Can I get grout to match my tiles?', 'Yes. We stock many shades, including white, ivory, grey, black, beige and brown.'],
            ['Do you apply the grout?', 'No. It is sold only; your fitter applies it.'],
        ],
    ],

];

<?php

/*
| Shilp Kala (stone art): custom carved and engraved craft in marble and sandstone.
*/

return [

    [
        'path' => 'shilp-kala',
        'template' => 'collection',
        'name' => 'Shilp Kala',
        'title' => 'Shilp Kala: marble and stone art in Kutch',
        'seo_title' => 'Marble Handicraft & Stone Art in Kutch | Shyam Granite',
        'meta_description' => 'Marble mandirs, murtis, name plates, Tulsi kyara, Shila Lekh, jaali, inlay work and fountains, carved and engraved to order in Adipur, Kutch.',
        'summary' => 'Mandirs, murtis, name plates, Tulsi kyara and more.',
        'intro' => 'Shilp Kala is our custom carved and engraved stone craft in marble and sandstone, from home pooja mandirs and murtis to name plates, foundation stones and garden pieces.',
        'photo' => 'stone-carving',
        'content' => [
            'range_title' => 'What we make',
            'blocks' => [
                [
                    'type' => 'features',
                    'title' => 'How a custom piece comes together',
                    'items' => [
                        ['icon' => 'ruler', 'title' => 'Share the space', 'text' => 'Tell us where the piece will go and the size available, with a photo if you can.'],
                        ['icon' => 'sparkle', 'title' => 'Choose design and stone', 'text' => 'Pick a style and the marble or sandstone. We show you options at the showroom.'],
                        ['icon' => 'seal-check', 'title' => 'Confirm the details', 'text' => 'For engraved work, confirm the exact wording, language and layout before we begin.'],
                        ['icon' => 'storefront', 'title' => 'Collect your piece', 'text' => 'We tell you when it is ready. Installation is not included.'],
                    ],
                ],
                [
                    'type' => 'chips',
                    'title' => 'Stones we work in',
                    'items' => ['Makrana white marble', 'Ambaji white marble', 'Udaipur Green marble', 'Jodhpur Pink sandstone', 'Dholpur sandstone', 'Agra Red sandstone'],
                ],
                [
                    'type' => 'links',
                    'title' => 'Related',
                    'paths' => ['pooja-home', 'marble/makrana-white', 'marble/ambaji-white'],
                ],
            ],
        ],
        'faqs' => [
            ['Do you make custom designs?', 'Yes. Shilp Kala pieces are made to order. Share the size, style and stone you want.'],
            ['Which stone is best for a murti?', 'White marble, such as Makrana or Ambaji, is the traditional choice for murtis.'],
            ['Do you do community temple work?', 'Yes. Besides home mandirs, we take on community temple work. Contact us to discuss the project.'],
        ],
    ],

    [
        'path' => 'shilp-kala/marble-mandir',
        'parent' => 'shilp-kala',
        'name' => 'Marble Mandir',
        'title' => 'Marble mandir for home',
        'seo_title' => 'Marble Mandir for Home in Kutch | Shyam Granite',
        'meta_description' => 'Home pooja mandirs and community temple work in marble, made to your size in Adipur, Kutch. Choose the design, stone and finish.',
        'summary' => 'Home pooja mandirs and community temple work.',
        'intro' => 'A marble mandir is the heart of a pooja room. We make home mandirs to your size and take on community temple work in marble and sandstone.',
        'photo' => 'temple-white',
        'content' => [
            'blocks' => [
                [
                    'type' => 'features',
                    'title' => 'Planning your mandir',
                    'items' => [
                        ['icon' => 'ruler', 'title' => 'Measure the space', 'text' => 'Width, depth and height available, and whether the mandir sits on the floor or a wall.'],
                        ['icon' => 'stack', 'title' => 'Choose the marble', 'text' => 'White Makrana and Ambaji are the classic choices. Green or coloured inlays add detail.'],
                        ['icon' => 'sparkle', 'title' => 'Pick a style', 'text' => 'Simple and modern, or carved with pillars, domes and jaali panels.'],
                        ['icon' => 'check', 'title' => 'Add murtis and accessories', 'text' => 'Matching murtis and engraved details can be made alongside.'],
                    ],
                ],
                [
                    'type' => 'links',
                    'title' => 'Often ordered together',
                    'paths' => ['shilp-kala/murtis', 'shilp-kala/inlay-work', 'pooja-home'],
                ],
            ],
        ],
        'faqs' => [
            ['Can you make a mandir to fit my pooja room?', 'Yes. Share the space available and we make the mandir to fit.'],
            ['Which marble is best for a home mandir?', 'White Makrana and Ambaji marble are the traditional choices.'],
            ['Do you install the mandir?', 'Installation is not included. We can advise your fitter on fixing and the supplies needed.'],
        ],
    ],

    [
        'path' => 'shilp-kala/name-plates',
        'parent' => 'shilp-kala',
        'name' => 'Name Plates',
        'title' => 'Marble and stone name plates',
        'seo_title' => 'Marble & Stone Name Plates in Kutch | Shyam Granite',
        'meta_description' => 'Engraved house and office name plates in marble, granite and sandstone, made to order in Adipur, Kutch, with your exact wording.',
        'summary' => 'Engraved house and office name plates.',
        'intro' => 'An engraved stone name plate welcomes visitors for years. We engrave house and office name plates in marble, granite and sandstone.',
        'photo' => 'stone-engraving',
        'content' => [
            'blocks' => [
                [
                    'type' => 'features',
                    'title' => 'What to decide',
                    'items' => [
                        ['icon' => 'check', 'title' => 'Wording and language', 'text' => 'Family or business name, house name and number. Send the exact text, spelled as it should appear.'],
                        ['icon' => 'stack', 'title' => 'Stone', 'text' => 'White marble for a classic look; Absolute Black granite for crisp, high-contrast lettering.'],
                        ['icon' => 'ruler', 'title' => 'Size and shape', 'text' => 'Measure the wall or gate space. Rectangles, ovals and custom shapes are possible.'],
                        ['icon' => 'sparkle', 'title' => 'Motifs', 'text' => 'Add an Om, Swastik, Ganesha or a simple border.'],
                    ],
                ],
            ],
        ],
        'faqs' => [
            ['Can the name plate be in Gujarati or Hindi?', 'Send us the exact wording in the language you want and we will confirm what we can engrave before starting.'],
            ['Which stone gives the clearest lettering?', 'Absolute Black granite gives crisp, high-contrast lettering; white marble gives a classic look.'],
            ['Do you make office signs too?', 'Yes. We engrave office name plates as well as house name plates.'],
        ],
    ],

    [
        'path' => 'shilp-kala/tulsi-kyara',
        'parent' => 'shilp-kala',
        'name' => 'Tulsi Kyara',
        'title' => 'Marble Tulsi kyara (Tulsi pot)',
        'seo_title' => 'Marble Tulsi Kyara & Tulsi Pots | Shyam Granite',
        'meta_description' => 'Traditional Tulsi kyara planters in marble and sandstone, made to order in Adipur, Kutch, for courtyards, terraces and entrances.',
        'summary' => 'Traditional Tulsi planters in marble and sandstone.',
        'intro' => 'A Tulsi kyara gives the sacred Tulsi plant a place of honour. We make traditional Tulsi planters in marble and sandstone for courtyards, terraces and entrances.',
        'photo' => 'temple-pillars',
        'content' => [
            'blocks' => [
                [
                    'type' => 'prose',
                    'title' => 'Marble or sandstone?',
                    'body' => [
                        'White marble suits courtyards and terraces where a bright, traditional look is wanted, and it can be carved with motifs or inlaid with colour.',
                        'Sandstone in pink, red or beige gives a warm, earthy look that sits naturally in gardens. Ask for drainage holes and a size that suits your plant.',
                    ],
                ],
            ],
        ],
        'faqs' => [
            ['What sizes of Tulsi kyara can you make?', 'Tell us where it will stand and the height you want; we make it to suit.'],
            ['Can a Tulsi kyara be carved?', 'Yes. Motifs, jaali panels and engraved verses can be added.'],
            ['Is marble good outdoors for a Tulsi pot?', 'Yes. Sandstone is also a good outdoor choice.'],
        ],
    ],

    [
        'path' => 'shilp-kala/shila-lekh',
        'parent' => 'shilp-kala',
        'name' => 'Shila Lekh',
        'title' => 'Shila Lekh: foundation stones and plaques',
        'seo_title' => 'Shila Lekh & Foundation Stone Plaques | Shyam Granite',
        'meta_description' => 'Engraved Shila Lekh: foundation stones, inauguration and commemorative plaques in granite and marble, made to order in Adipur, Kutch.',
        'summary' => 'Foundation stones, inauguration and commemorative plaques.',
        'intro' => 'A Shila Lekh records a moment in stone: a foundation, an inauguration or a dedication. We engrave foundation stones and commemorative plaques in granite and marble.',
        'photo' => 'stone-engraving',
        'content' => [
            'blocks' => [
                [
                    'type' => 'features',
                    'title' => 'What to send us',
                    'items' => [
                        ['icon' => 'check', 'title' => 'Exact wording', 'text' => 'Names, titles, date and occasion, checked for spelling and in the language you want.'],
                        ['icon' => 'stack', 'title' => 'Stone', 'text' => 'Absolute Black or Imperial Red granite, or white marble.'],
                        ['icon' => 'ruler', 'title' => 'Size', 'text' => 'The space on the wall or pedestal where it will be fixed.'],
                        ['icon' => 'clock', 'title' => 'Event date', 'text' => 'Tell us when you need it so we can plan the work.'],
                    ],
                ],
            ],
        ],
        'faqs' => [
            ['What is a Shila Lekh?', 'An engraved stone plaque that marks a foundation, inauguration or dedication.'],
            ['Which stone is best for a foundation plaque?', 'Absolute Black granite gives the crispest lettering; white marble and Imperial Red are also popular.'],
            ['Can you add a logo or emblem?', 'Ask us with the artwork and we will advise what can be engraved.'],
        ],
    ],

    [
        'path' => 'shilp-kala/murtis',
        'parent' => 'shilp-kala',
        'name' => 'Murtis',
        'title' => 'Marble murtis',
        'seo_title' => 'Marble Murtis in Kutch | Shyam Granite',
        'meta_description' => 'White marble murtis of deities for home mandirs and temples, available to order in Adipur, Kutch, in sizes to suit your mandir.',
        'summary' => 'Marble idols of deities for homes and temples.',
        'intro' => 'Marble murtis of deities for home mandirs and temples, in sizes to suit your space.',
        'photo' => 'murtis',
        'content' => [
            'blocks' => [
                [
                    'type' => 'prose',
                    'title' => 'Choosing a murti',
                    'body' => [
                        'White marble is the traditional stone for murtis. Size the murti to your mandir, leaving space around it for decoration and pooja items.',
                        'If you are setting up a full mandir, ask about matching murtis so the set sits together well.',
                    ],
                ],
                [
                    'type' => 'links',
                    'title' => 'Often ordered together',
                    'paths' => ['shilp-kala/marble-mandir', 'pooja-home'],
                ],
            ],
        ],
        'faqs' => [
            ['Which deities do you have murtis of?', 'Ask us on WhatsApp for current pieces and made-to-order options.'],
            ['Can I order a murti to a particular size?', 'Ask us with the size you need and we will tell you what we can supply.'],
            ['What size murti suits my mandir?', 'Share your mandir’s inner dimensions and we will suggest suitable sizes.'],
        ],
    ],

    [
        'path' => 'shilp-kala/jaali-work',
        'parent' => 'shilp-kala',
        'name' => 'Jaali Work',
        'title' => 'Stone jaali screens and panels',
        'seo_title' => 'Stone Jaali Screens & Panels | Shyam Granite',
        'meta_description' => 'Carved marble and sandstone jaali screens and panels for temples, homes, facades and gardens, made to order in Adipur, Kutch.',
        'summary' => 'Carved stone screens and panels.',
        'intro' => 'Carved jaali screens filter light and air while adding pattern. We make jaali panels in marble and sandstone for temples, homes, facades and gardens.',
        'photo' => 'sandstone-jaali',
        'content' => [
            'blocks' => [
                [
                    'type' => 'chips',
                    'title' => 'Where jaalis work',
                    'items' => ['Temple walls', 'Facades and balconies', 'Staircase screens', 'Garden boundaries', 'Pooja room doors'],
                ],
                [
                    'type' => 'links',
                    'title' => 'Stones for jaali work',
                    'paths' => ['sandstone/agra-red', 'sandstone/jodhpur-pink', 'marble/ambaji-white'],
                ],
            ],
        ],
        'faqs' => [
            ['Which stone is best for jaali?', 'Sandstone such as Agra Red or Jodhpur Pink suits exteriors; white marble suits temples and interiors.'],
            ['Can you match an existing jaali design?', 'Share a photo and measurements and we will advise.'],
            ['Are jaalis strong enough for facades?', 'Yes, when sized and fixed correctly. Discuss thickness and fixing with your contractor.'],
        ],
    ],

    [
        'path' => 'shilp-kala/inlay-work',
        'parent' => 'shilp-kala',
        'name' => 'Inlay Work',
        'title' => 'Marble inlay work',
        'seo_title' => 'Marble Inlay Work (Pietra Dura Style) | Shyam Granite',
        'meta_description' => 'Pietra dura-style marble inlay work for table tops, mandirs, floors and wall panels, made to order in Adipur, Kutch.',
        'summary' => 'Pietra dura-style inlaid marble.',
        'intro' => 'Inlay work sets coloured stone into white marble to form patterns and flowers, in the pietra dura tradition. It turns table tops, mandirs and floors into heirloom pieces.',
        'photo' => 'marble-green',
        'content' => [
            'blocks' => [
                [
                    'type' => 'chips',
                    'title' => 'Popular inlay pieces',
                    'items' => ['Table tops', 'Mandir panels', 'Floor medallions', 'Wall panels', 'Gift plates'],
                ],
            ],
        ],
        'faqs' => [
            ['What is pietra dura?', 'A technique of setting cut, coloured stones into marble to make patterns and pictures.'],
            ['Can inlay be added to a mandir?', 'Yes. Inlaid panels are a popular way to decorate a marble mandir.'],
            ['Can I choose my own design?', 'Yes. Share your idea and we will advise on colours and size.'],
        ],
    ],

    [
        'path' => 'shilp-kala/fountains-planters',
        'parent' => 'shilp-kala',
        'name' => 'Fountains & Planters',
        'title' => 'Stone fountains and planters',
        'seo_title' => 'Stone Fountains & Planters in Kutch | Shyam Granite',
        'meta_description' => 'Marble and sandstone fountains and planters for gardens and courtyards, made to order in Adipur, Kutch.',
        'summary' => 'Garden and courtyard pieces in marble and sandstone.',
        'intro' => 'Stone fountains and planters bring calm and character to gardens and courtyards. We make them in marble and sandstone to suit your space.',
        'photo' => 'fountain',
        'content' => [
            'blocks' => [
                [
                    'type' => 'prose',
                    'title' => 'Planning a garden piece',
                    'body' => [
                        'Measure the space and think about where water and power will reach for a fountain. Sandstone gives a natural, earthy look; marble a brighter, formal one.',
                        'Planters can be sized for trees, shrubs or a Tulsi plant, with drainage built in.',
                    ],
                ],
                [
                    'type' => 'links',
                    'title' => 'Related',
                    'paths' => ['shilp-kala/tulsi-kyara', 'elevation-outdoor', 'sandstone'],
                ],
            ],
        ],
        'faqs' => [
            ['Do fountains come with a pump?', 'Ask us about the pump and plumbing when you order. Installation is not included.'],
            ['Which stone lasts best outdoors?', 'Sandstone and granite both weather well; marble suits sheltered courtyards.'],
            ['Can planters have drainage holes?', 'Yes, we add drainage as needed.'],
        ],
    ],

];

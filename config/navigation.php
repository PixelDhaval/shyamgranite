<?php

/*
|--------------------------------------------------------------------------
| Site navigation
|--------------------------------------------------------------------------
|
| Drives the desktop mega navigation, the mobile menu and the footer.
| URLs follow content/seo/SITE-STRUCTURE.md. Variety links are a curated
| selection of best sellers; each column also links to its full hub page.
| Remove any variety that is not in stock (strategy rule).
|
*/

return [

    'main' => [

        [
            'label' => 'Granite',
            'url' => '/granite',
            'mega' => [
                'columns' => [
                    [
                        'title' => 'South Indian Granite',
                        'url' => '/granite/south-indian-granite',
                        'links' => [
                            ['label' => 'Black Galaxy', 'url' => '/granite/black-galaxy'],
                            ['label' => 'Absolute Black', 'url' => '/granite/absolute-black'],
                            ['label' => 'Telephone Black', 'url' => '/granite/telephone-black'],
                            ['label' => 'Tan Brown', 'url' => '/granite/tan-brown'],
                            ['label' => 'Steel Grey', 'url' => '/granite/steel-grey'],
                            ['label' => 'Kashmir White', 'url' => '/granite/kashmir-white'],
                            ['label' => 'Imperial Red', 'url' => '/granite/imperial-red'],
                        ],
                    ],
                    [
                        'title' => 'Rajasthan Granite',
                        'url' => '/granite/rajasthan-granite',
                        'links' => [
                            ['label' => 'Lakha Red', 'url' => '/granite/lakha-red'],
                            ['label' => 'Jhansi Red', 'url' => '/granite/jhansi-red'],
                            ['label' => 'Rosy Pink', 'url' => '/granite/rosy-pink'],
                            ['label' => 'R Black', 'url' => '/granite/r-black'],
                            ['label' => 'P White', 'url' => '/granite/p-white'],
                            ['label' => 'Royal Cream', 'url' => '/granite/royal-cream'],
                            ['label' => 'Crystal Yellow', 'url' => '/granite/crystal-yellow'],
                        ],
                    ],
                    [
                        'title' => 'Engineered Stone',
                        'url' => '/granite/engineered-stone',
                        'links' => [
                            ['label' => 'Nano White', 'url' => '/granite/nano-white'],
                            ['label' => 'Artificial Granite', 'url' => '/granite/artificial-granite'],
                            ['label' => 'Composite Marble', 'url' => '/granite/composite-marble'],
                        ],
                    ],
                ],
                'feature' => [
                    'title' => 'All granite',
                    'text' => 'South Indian, Rajasthan and engineered slabs for kitchens, floors and stairs.',
                    'url' => '/granite',
                    'photo' => 'granite-black',
                ],
            ],
        ],

        [
            'label' => 'Marble',
            'url' => '/marble',
            'mega' => [
                'columns' => [
                    [
                        'title' => 'Italian & Imported Marble',
                        'url' => '/marble/italian-marble',
                        'links' => [
                            ['label' => 'Statuario', 'url' => '/marble/statuario'],
                            ['label' => 'Carrara', 'url' => '/marble/carrara'],
                            ['label' => 'Calacatta', 'url' => '/marble/calacatta'],
                            ['label' => 'Botticino', 'url' => '/marble/botticino'],
                            ['label' => 'Dyna (Royal Diana)', 'url' => '/marble/dyna'],
                            ['label' => 'Armani Grey', 'url' => '/marble/armani-grey'],
                            ['label' => 'Emperador', 'url' => '/marble/emperador'],
                            ['label' => 'Onyx', 'url' => '/marble/onyx'],
                        ],
                    ],
                    [
                        'title' => 'Indian Marble',
                        'url' => '/marble/indian-marble',
                        'links' => [
                            ['label' => 'Makrana White', 'url' => '/marble/makrana-white'],
                            ['label' => 'Ambaji White', 'url' => '/marble/ambaji-white'],
                            ['label' => 'Rajnagar White', 'url' => '/marble/rajnagar-white'],
                            ['label' => 'Morwad White', 'url' => '/marble/morwad-white'],
                            ['label' => 'Banswara White', 'url' => '/marble/banswara-white'],
                            ['label' => 'Udaipur Green', 'url' => '/marble/udaipur-green'],
                            ['label' => 'Katni Beige', 'url' => '/marble/katni-beige'],
                        ],
                    ],
                ],
                'feature' => [
                    'title' => 'All marble',
                    'text' => 'Italian and Indian marble for flooring, feature walls and temples.',
                    'url' => '/marble',
                    'photo' => 'marble-floor',
                ],
            ],
        ],

        [
            'label' => 'Natural Stone',
            'url' => '/kota-stone',
            'mega' => [
                'columns' => [
                    [
                        'title' => 'Kota Stone',
                        'url' => '/kota-stone',
                        'links' => [
                            ['label' => 'Green Kota (Kota Blue)', 'url' => '/kota-stone'],
                        ],
                        'note' => 'Rough, machine-cut, semi-polished, mirror polished and lapotra finishes.',
                    ],
                    [
                        'title' => 'Sandstone',
                        'url' => '/sandstone',
                        'links' => [
                            ['label' => 'Dholpur Beige', 'url' => '/sandstone/dholpur-beige'],
                            ['label' => 'Gwalior Mint', 'url' => '/sandstone/gwalior-mint'],
                            ['label' => 'Lalitpur Yellow', 'url' => '/sandstone/lalitpur-yellow'],
                            ['label' => 'Agra Red', 'url' => '/sandstone/agra-red'],
                            ['label' => 'Dholpur Red & Pink', 'url' => '/sandstone/dholpur-red-pink'],
                            ['label' => 'Jodhpur Pink', 'url' => '/sandstone/jodhpur-pink'],
                            ['label' => 'Kandla Grey', 'url' => '/sandstone/kandla-grey'],
                            ['label' => 'Raj Green', 'url' => '/sandstone/raj-green'],
                        ],
                    ],
                ],
                'feature' => [
                    'title' => 'Sandstone',
                    'text' => 'For elevations, paving, boundary walls and temple architecture.',
                    'url' => '/sandstone',
                    'photo' => 'sandstone-texture',
                ],
            ],
        ],

        [
            'label' => 'Shilp Kala',
            'url' => '/shilp-kala',
            'mega' => [
                'columns' => [
                    [
                        'title' => 'Devotional',
                        'url' => '/shilp-kala',
                        'links' => [
                            ['label' => 'Marble Mandir', 'url' => '/shilp-kala/marble-mandir'],
                            ['label' => 'Murtis', 'url' => '/shilp-kala/murtis'],
                            ['label' => 'Tulsi Kyara', 'url' => '/shilp-kala/tulsi-kyara'],
                            ['label' => 'Shila Lekh', 'url' => '/shilp-kala/shila-lekh'],
                        ],
                    ],
                    [
                        'title' => 'Home & Garden',
                        'url' => '/shilp-kala',
                        'links' => [
                            ['label' => 'Name Plates', 'url' => '/shilp-kala/name-plates'],
                            ['label' => 'Jaali Work', 'url' => '/shilp-kala/jaali-work'],
                            ['label' => 'Inlay Work', 'url' => '/shilp-kala/inlay-work'],
                            ['label' => 'Fountains & Planters', 'url' => '/shilp-kala/fountains-planters'],
                        ],
                    ],
                ],
                'feature' => [
                    'title' => 'Shilp Kala',
                    'text' => 'Carved and engraved stone craft in marble and sandstone.',
                    'url' => '/shilp-kala',
                    'photo' => 'stone-carving',
                ],
            ],
        ],

        [
            'label' => 'Kitchen & Supplies',
            'url' => '/kitchen',
            'mega' => [
                'columns' => [
                    [
                        'title' => 'Finished Products',
                        'url' => '/table-tops',
                        'links' => [
                            ['label' => 'Table Tops', 'url' => '/table-tops'],
                            ['label' => 'Kitchen Sinks', 'url' => '/kitchen-sinks'],
                        ],
                    ],
                    [
                        'title' => 'Installation Supplies',
                        'url' => '/chemicals-adhesives',
                        'links' => [
                            ['label' => 'Chemicals & Adhesives', 'url' => '/chemicals-adhesives'],
                            ['label' => 'Epoxy Grout', 'url' => '/epoxy-grout'],
                        ],
                    ],
                    [
                        'title' => 'Shop by Use',
                        'url' => '/kitchen',
                        'links' => [
                            ['label' => 'Kitchen', 'url' => '/kitchen'],
                            ['label' => 'Flooring', 'url' => '/flooring'],
                            ['label' => 'Pooja & Home', 'url' => '/pooja-home'],
                            ['label' => 'Elevation & Outdoor', 'url' => '/elevation-outdoor'],
                            ['label' => 'Commercial', 'url' => '/commercial'],
                        ],
                    ],
                ],
                'feature' => [
                    'title' => 'Kitchen stone',
                    'text' => 'Granite, Nano White, sinks and grout for a complete platform.',
                    'url' => '/kitchen',
                    'photo' => 'kitchen-island',
                ],
            ],
        ],

        [
            'label' => 'Services',
            'url' => '/services',
            'dropdown' => [
                ['label' => 'Granite Cutting', 'url' => '/services/granite-cutting', 'text' => 'Cut to size, sink and hob cut-outs'],
                ['label' => 'Granite Polishing', 'url' => '/services/granite-polishing', 'text' => 'Mirror, honed, leather and lapotra'],
                ['label' => 'Granite Moulding', 'url' => '/services/granite-moulding', 'text' => 'Bullnose, bevel, ogee and more'],
                ['label' => 'All services', 'url' => '/services', 'text' => 'Processing at our GIDC workshop'],
            ],
        ],

        [
            'label' => 'Contact',
            'url' => '/contact',
        ],

    ],

    'footer' => [
        'Products' => [
            ['label' => 'Granite', 'url' => '/granite'],
            ['label' => 'Marble', 'url' => '/marble'],
            ['label' => 'Kota Stone', 'url' => '/kota-stone'],
            ['label' => 'Sandstone', 'url' => '/sandstone'],
            ['label' => 'Shilp Kala', 'url' => '/shilp-kala'],
            ['label' => 'Table Tops', 'url' => '/table-tops'],
            ['label' => 'Kitchen Sinks', 'url' => '/kitchen-sinks'],
            ['label' => 'Chemicals & Adhesives', 'url' => '/chemicals-adhesives'],
            ['label' => 'Epoxy Grout', 'url' => '/epoxy-grout'],
        ],
        'Services' => [
            ['label' => 'Granite Cutting', 'url' => '/services/granite-cutting'],
            ['label' => 'Granite Polishing', 'url' => '/services/granite-polishing'],
            ['label' => 'Granite Moulding', 'url' => '/services/granite-moulding'],
        ],
        'Company' => [
            ['label' => 'About us', 'url' => '/about'],
            ['label' => 'Gallery', 'url' => '/gallery'],
            ['label' => 'Buying guides', 'url' => '/blog'],
            ['label' => 'FAQs', 'url' => '/faq'],
            ['label' => 'Contact', 'url' => '/contact'],
        ],
    ],

];

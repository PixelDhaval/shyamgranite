<?php

/*
| Core pages: About, Contact, FAQ, Gallery, Guides (blog).
| Facts come from content/business-brief.md only. No prices, no GST number.
*/

return [

    [
        'path' => 'about',
        'name' => 'About us',
        'title' => 'Stone experts in Kutch since 2005',
        'seo_title' => 'About Shyam Granite: Stone Experts in Kutch Since 2005',
        'meta_description' => 'Shyam Granite has supplied granite, marble, Kota stone and sandstone across Kutch since 2005, with a showroom and processing workshop in Adipur.',
        'summary' => 'Since 2005, from a showroom on Rambaug Road and a workshop in GIDC Adipur.',
        'intro' => 'Shyam Granite supplies and processes granite, marble, Kota stone and sandstone for homes, temples, offices and commercial projects across Kutch.',
        'photo' => 'marble-white',
        'content' => [
            'product' => null,
            'schema' => 'about',
            'blocks' => [
                [
                    'type' => 'prose',
                    'title' => 'Two decades in the stone trade',
                    'photo' => 'stone-cutting',
                    'body' => [
                        'Shyam Granite was established in 2005 in Adipur, Kutch, and is run by Pravin Sorathiya and Chirag Sorathiya. Our tagline, "A House of Color Granite", describes what customers find at the showroom: a wide range of colours and materials in one place.',
                        'Customers choose their stone at our showroom on Rambaug Road. Our processing workshop in GIDC Adipur then cuts, polishes and moulds it to their measurements, so they can buy raw slabs or pieces finished to size and ready for their own fitter.',
                        'Alongside the stone we stock kitchen sinks, tile and stone adhesives, chemicals and epoxy grout, which makes Shyam Granite a single source for a stone project: choose the material, have it finished to size and buy the installation supplies in one visit.',
                    ],
                ],
                [
                    'type' => 'features',
                    'title' => 'What we do',
                    'items' => [
                        ['icon' => 'stack', 'title' => 'Supply stone', 'text' => 'South Indian and Rajasthan granite, Nano White and engineered stone, Italian and Indian marble, Kota stone and sandstone.'],
                        ['icon' => 'ruler', 'title' => 'Process it in-house', 'text' => 'Cutting, polishing and moulding at our GIDC workshop, worked to your measurements.'],
                        ['icon' => 'storefront', 'title' => 'Finished products', 'text' => 'Table tops in granite, marble, tiles and Nano White, and kitchen sinks sized for stone platforms.'],
                        ['icon' => 'sparkle', 'title' => 'Shilp Kala', 'text' => 'Marble mandirs, murtis, name plates, Tulsi kyara, Shila Lekh, jaali, inlay work and garden pieces.'],
                        ['icon' => 'check', 'title' => 'Installation supplies', 'text' => 'Mostly UltraTech, with some Astral products: tile and stone adhesives, epoxy glue, sealers, cleaners and epoxy grout.'],
                        ['icon' => 'truck', 'title' => 'Retail to bulk', 'text' => 'A single table top for a homeowner or a large order of slabs for a building project.'],
                    ],
                ],
                [
                    'type' => 'table',
                    'title' => 'Who we work with',
                    'head' => ['Customer', 'What they usually come for'],
                    'rows' => [
                        ['Homeowners', 'Kitchen platforms, flooring, home temples, name plates and Tulsi pots'],
                        ['Builders and contractors', 'Bulk slabs, flooring stone, elevation and cladding material'],
                        ['Architects and interior designers', 'Italian marble, premium granite and custom finishes'],
                        ['Fitters and masons', 'Stone cut and finished to size, plus adhesives and grout'],
                        ['Temples, trusts and institutions', 'Mandir work, Shila Lekh, sandstone and marble craft'],
                        ['Commercial spaces', 'Table tops, flooring and counters for restaurants, offices and showrooms'],
                    ],
                ],
                [
                    'type' => 'callout',
                    'title' => 'What we don’t do',
                    'text' => 'We supply and process stone. Installation and fitting are not included, so your own fitter or mason lays the finished pieces. We are happy to talk your fitter through the sizes and supplies they need.',
                    'icon' => 'seal-check',
                ],
                [
                    'type' => 'locations',
                    'title' => 'Visit the showroom and the workshop',
                    'intro' => 'Both are in Adipur. Browse slabs, sinks and supplies at the showroom; processing happens at the workshop.',
                ],
            ],
        ],
        'faqs' => [
            ['Who runs Shyam Granite?', 'Shyam Granite is run by Pravin Sorathiya and Chirag Sorathiya. You can call Pravin on +91 98242 83804 or Chirag on +91 78787 78287.'],
            ['Where are you located?', 'The showroom is at Plot No. 494, Ward 5/B, Rambaug Road, Adipur, and the workshop is at Plot No. 45, Ward 1/B, GIDC, Adipur, Kutch, Gujarat 370205.'],
            ['Do you sell to individual homeowners?', 'Yes. We serve single-piece buyers, such as a homeowner who needs one table top, as well as builders placing large project orders.'],
        ],
    ],

    [
        'path' => 'contact',
        'name' => 'Contact',
        'title' => 'Contact and visit Shyam Granite',
        'seo_title' => 'Contact & Visit Our Showroom in Adipur, Kutch',
        'meta_description' => 'Call, WhatsApp or visit Shyam Granite in Adipur: showroom on Rambaug Road, workshop in GIDC. Opening hours, phone numbers and directions.',
        'summary' => 'Phone, WhatsApp, email, both addresses and opening hours.',
        'intro' => 'Call or WhatsApp us for today’s rate, or visit the showroom on Rambaug Road to see the slabs in person. The showroom is open on Sunday mornings too.',
        'content' => [
            'product' => null,
            'schema' => 'contact',
            'local_business' => true,
            'hide_cta' => true,
            'blocks' => [
                [
                    'type' => 'contact',
                    'title' => 'Talk to us directly',
                    'intro' => 'Most customers start on WhatsApp. Send a photo or the stone name and we reply with the rate and what is in stock.',
                ],
                [
                    'type' => 'features',
                    'title' => 'What to send for a quick rate',
                    'intro' => 'The more of these you include, the faster and more accurate our reply.',
                    'items' => [
                        ['icon' => 'stack', 'title' => 'The stone', 'text' => 'Name or colour (for example Black Galaxy or Statuario), or a photo of what you like.'],
                        ['icon' => 'ruler', 'title' => 'Measurements', 'text' => 'Length and width of each piece, or a simple sketch of the kitchen platform, steps or floor.'],
                        ['icon' => 'sparkle', 'title' => 'Finish and edge', 'text' => 'Polished, honed, leather, flamed or lapotra, and the edge profile you want if it is a top.'],
                        ['icon' => 'map-pin', 'title' => 'Your town', 'text' => 'Where the stone is going in Kutch, so we can plan your order.'],
                    ],
                ],
            ],
        ],
        'faqs' => [
            ['When is the showroom open?', 'Monday to Saturday from 9 AM to 7 PM, and Sunday from 9 AM to 1 PM.'],
            ['When is the workshop open?', 'Sunday to Friday from 9 AM to 6 PM, and Saturday from 9 AM to 1 PM.'],
            ['Which number should I WhatsApp?', 'Send WhatsApp messages to +91 78787 78287. For calls you can use either +91 98242 83804 or +91 78787 78287.'],
        ],
    ],

    [
        'path' => 'faq',
        'name' => 'FAQs',
        'title' => 'Stone buying FAQs',
        'seo_title' => 'Stone Buying FAQs | Shyam Granite',
        'meta_description' => 'Answers to common questions about buying granite, marble, Kota stone and sandstone in Kutch: rates, cutting, polishing, finishes, Shilp Kala and visiting.',
        'summary' => 'Rates, choosing stone, processing, Shilp Kala and visiting us.',
        'intro' => 'Answers to the questions customers ask us most often, from rates and finishes to processing and visiting the showroom.',
        'photo' => null,
        'content' => [
            'product' => null,
            'blocks' => [
                [
                    'type' => 'faq-groups',
                    'groups' => [
                        [
                            'title' => 'Rates and ordering',
                            'items' => [
                                ['question' => 'Why don’t you show prices on the website?', 'answer' => 'Stone rates change with stock, origin, slab size, thickness and finish, so a printed price would quickly be wrong. WhatsApp us the stone name and your measurements on +91 78787 78287 and we reply with today’s rate.'],
                                ['question' => 'What affects the cost of granite or marble?', 'answer' => 'The main factors are where the stone is quarried, how rare the colour is, the slab size and thickness, the finish, and how much cutting and edge work your pieces need.'],
                                ['question' => 'Do you supply small quantities?', 'answer' => 'Yes. We sell single pieces such as one table top or a name plate, as well as bulk slabs for builders and contractors.'],
                                ['question' => 'Do you install the stone?', 'answer' => 'No. We supply stone and cut, polish and mould it to size. Your own fitter or mason installs it. We stock the adhesives and epoxy grout they need.'],
                            ],
                        ],
                        [
                            'title' => 'Choosing stone',
                            'items' => [
                                ['question' => 'Which stone is best for a kitchen platform?', 'answer' => 'Dense South Indian granite such as Black Galaxy, Absolute Black, Tan Brown or Steel Grey is the usual choice because it is hard-wearing and easy to clean. Nano White suits a bright white kitchen and does not absorb liquids.'],
                                ['question' => 'Granite or marble for flooring?', 'answer' => 'Marble gives a softer, more luxurious look and suits living rooms and temples. Granite is harder and handles heavy traffic, stairs and outdoor areas better. Kota stone is the practical, non-slip choice for large or industrial floors.'],
                                ['question' => 'What is the difference between South Indian and Rajasthan granite?', 'answer' => 'South Indian granite is quarried mainly in Andhra Pradesh, Tamil Nadu and Karnataka and is the first choice for kitchen platforms. Rajasthan granite usually costs less and is popular for flooring, stairs and exteriors.'],
                                ['question' => 'What is Nano White?', 'answer' => 'Nano White is a crystallised glass stone with a bright milky white, high-gloss finish. It does not absorb liquids, so it resists stains, and it is a popular budget alternative to white marble.'],
                                ['question' => 'Can I see the actual slab before buying?', 'answer' => 'Yes. Natural stone varies from lot to lot, so we recommend seeing the slabs at the showroom on Rambaug Road. If you can’t visit, ask us for photos on WhatsApp.'],
                            ],
                        ],
                        [
                            'title' => 'Cutting, polishing and moulding',
                            'items' => [
                                ['question' => 'Which materials can you process?', 'answer' => 'Our workshop cuts, polishes and moulds granite, marble, Kota stone, Nano White and engineered stone.'],
                                ['question' => 'Can you make sink and hob cut-outs?', 'answer' => 'Yes. We cut sink and hob openings, steps, risers, skirting strips and custom shapes to your measurements.'],
                                ['question' => 'Which finishes can you give?', 'answer' => 'Mirror polish, honed (matt), leather and lapotra finishes. We can also re-polish dull or worn slabs.'],
                                ['question' => 'Which edge profiles do you offer?', 'answer' => 'Half bullnose, full bullnose, bevel or chamfer, ogee, double-edge (laminated) and waterfall edges.'],
                            ],
                        ],
                        [
                            'title' => 'Shilp Kala',
                            'items' => [
                                ['question' => 'Do you make custom marble mandirs?', 'answer' => 'Yes. We make home pooja mandirs and take on community temple work in marble and sandstone. Share the space available and the style you like.'],
                                ['question' => 'Can you engrave name plates and foundation stones?', 'answer' => 'Yes. We engrave house and office name plates, and Shila Lekh such as foundation stones, inauguration and commemorative plaques.'],
                                ['question' => 'Which stones are used for Shilp Kala work?', 'answer' => 'Mostly marble and sandstone. White marble suits murtis, mandirs and inlay work; sandstone suits jaali screens, planters and outdoor pieces.'],
                            ],
                        ],
                        [
                            'title' => 'Visiting us',
                            'items' => [
                                ['question' => 'Where is the showroom?', 'answer' => 'Plot No. 494, Ward 5/B, Rambaug Road, Adipur, Gandhidham, Kutch, Gujarat 370205.'],
                                ['question' => 'What are your opening hours?', 'answer' => 'Showroom: Monday to Saturday 9 AM to 7 PM, Sunday 9 AM to 1 PM. Workshop: Sunday to Friday 9 AM to 6 PM, Saturday 9 AM to 1 PM.'],
                                ['question' => 'Which areas do you supply?', 'answer' => 'All of Kutch, including Adipur, Gandhidham, Anjar, Bhuj, Mundra, Mandvi, Bhachau, Rapar, Nakhatrana and Madhapar.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],

    [
        'path' => 'gallery',
        'name' => 'Gallery',
        'title' => 'Granite, marble and stone work',
        'seo_title' => 'Gallery: Granite, Marble & Stone Work | Shyam Granite',
        'summary' => 'Kitchens, floors, stone craft and exteriors.',
        'intro' => 'Ideas for kitchens, floors, temples and exteriors in granite, marble and natural stone.',
        'photo' => 'kitchen-island',
        // Placeholder photos until the photo day; keep out of search until real work is shown.
        'noindex' => true,
        'content' => [
            'product' => null,
            'blocks' => [
                ['type' => 'photos', 'title' => 'Kitchens', 'items' => ['kitchen-hero', 'kitchen-island', 'kitchen-marble-island', 'sink-composite', 'marble-counter']],
                ['type' => 'photos', 'title' => 'Floors and stairs', 'items' => ['marble-floor', 'lobby-floor', 'stone-staircase', 'kota-floor', 'tiles-grey']],
                ['type' => 'photos', 'title' => 'Stone craft', 'items' => ['stone-carving', 'murtis', 'temple-pillars', 'sandstone-jaali', 'stone-engraving']],
                ['type' => 'photos', 'title' => 'Exteriors and gardens', 'items' => ['sandstone-arch', 'stone-cladding', 'fountain', 'stone-paving', 'stone-steps']],
            ],
        ],
    ],

    [
        'path' => 'blog',
        'name' => 'Guides',
        'title' => 'Stone buying guides',
        'seo_title' => 'Stone Buying Guides | Shyam Granite',
        'summary' => 'Practical guides from the Shyam Granite team.',
        'intro' => 'Practical guides on choosing, processing and caring for stone, written from two decades in the trade in Kutch.',
        'photo' => 'marble-carrara',
        // No guides published yet; index once the first posts go live.
        'noindex' => true,
        'content' => [
            'product' => null,
            'blocks' => [
                [
                    'type' => 'features',
                    'title' => 'Coming first',
                    'intro' => 'The first guides answer the questions we hear most often at the showroom.',
                    'items' => [
                        ['icon' => 'stack', 'title' => 'What affects granite cost?', 'text' => 'Origin, thickness, finish and slab size explained.'],
                        ['icon' => 'check', 'title' => 'Best granite colours for kitchen platforms', 'text' => 'Colours that stay good-looking with daily use.'],
                        ['icon' => 'sparkle', 'title' => 'Nano White vs granite', 'text' => 'Which is better for your kitchen.'],
                        ['icon' => 'seal-check', 'title' => 'Marble mandir for home', 'text' => 'Sizes, designs and Vastu tips.'],
                    ],
                ],
                [
                    'type' => 'links',
                    'title' => 'Start with the range',
                    'paths' => ['granite', 'marble', 'kota-stone', 'shilp-kala'],
                ],
            ],
        ],
    ],

];

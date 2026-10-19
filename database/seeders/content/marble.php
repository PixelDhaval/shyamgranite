<?php

/*
| Marble: hub, Italian & imported, Indian, and varieties.
| Publish only stocked varieties ('published' => false for the rest).
*/

$italianFinishes = ['Polished', 'Honed', 'Brushed'];
$indianFinishes = ['Polished', 'Honed'];

$variety = fn (array $page): array => ['template' => 'variety', ...$page];

return [

    [
        'path' => 'marble',
        'template' => 'collection',
        'name' => 'Marble',
        'title' => 'Marble in Gandhidham and Adipur',
        'seo_title' => 'Marble Dealer in Gandhidham & Adipur, Kutch | Shyam Granite',
        'meta_description' => 'Italian and Indian marble in Adipur, Kutch: Statuario, Carrara, Botticino, Makrana, Ambaji and more for floors, walls and temples. WhatsApp for rates.',
        'summary' => 'Italian and Indian marble for floors, walls and temples.',
        'intro' => 'Marble brings softness and light to a home. Choose premium Italian and imported marble for luxury interiors, or Indian marble such as Makrana and Ambaji for floors, temples and carving.',
        'photo' => 'marble-floor',
        'content' => [
            'range_title' => 'Italian and Indian marble',
            'blocks' => [
                [
                    'type' => 'table',
                    'title' => 'Italian or Indian marble?',
                    'head' => ['', 'Italian & imported', 'Indian'],
                    'rows' => [
                        ['Look', 'Bold veining, glossy whites, rich beiges, browns and onyx', 'Classic whites, greens and beiges with gentler veining'],
                        ['Typical uses', 'Living-room floors, feature walls, staircases, bathrooms, table tops', 'Flooring, temples, carving, cladding and paving'],
                        ['Cost', 'Premium', 'Usually costs less than imported marble'],
                    ],
                ],
                [
                    'type' => 'prose',
                    'title' => 'Living with marble',
                    'photo' => 'lobby-floor',
                    'body' => [
                        'Marble is softer and more porous than granite. It suits floors, walls, bathrooms and temples beautifully, but in kitchens it can etch with lemon, vinegar and other acids.',
                        'A stone sealer protects marble from stains, and a honed finish hides small scratches better than a mirror polish. We stock sealers and cleaners made for marble.',
                    ],
                ],
                [
                    'type' => 'chips',
                    'title' => 'Finishes',
                    'items' => ['Polished', 'Honed (matt)', 'Brushed'],
                ],
                [
                    'type' => 'links',
                    'title' => 'Marble by use',
                    'paths' => ['flooring', 'pooja-home', 'commercial'],
                ],
            ],
        ],
        'faqs' => [
            ['Is marble good for flooring?', 'Yes. Marble makes elegant floors for living rooms, bedrooms, temples and lobbies. Use a sealer and soft cleaning products to keep it at its best.'],
            ['Is marble good for kitchen platforms?', 'It can etch with acids such as lemon and vinegar, so for kitchens we usually suggest granite or Nano White. Marble suits table tops and islands with care.'],
            ['What is the price of Italian marble?', 'It depends on the variety, slab size and thickness. We don’t publish prices; WhatsApp us for today’s rate.'],
            ['Which white marble is best?', 'Statuario and Calacatta are the premium Italian whites. Makrana is the classic Indian white, and Ambaji white is excellent for carving.'],
        ],
    ],

    [
        'path' => 'marble/italian-marble',
        'parent' => 'marble',
        'template' => 'collection',
        'name' => 'Italian Marble',
        'title' => 'Italian and imported marble in Kutch',
        'seo_title' => 'Italian Marble in Gandhidham & Adipur | Shyam Granite',
        'meta_description' => 'Statuario, Carrara, Calacatta, Botticino, Dyna, Crema Marfil, Armani and Emperador marble in Adipur, Kutch for luxury floors and walls.',
        'summary' => 'Premium marble for luxury floors, feature walls and interiors.',
        'intro' => 'Premium Italian and imported marble for luxury flooring, feature walls, staircases, bathrooms and high-end interiors.',
        'photo' => 'marble-carrara',
        'content' => [
            'range_title' => 'Italian and imported varieties',
            'blocks' => [
                [
                    'type' => 'table',
                    'title' => 'Colour families',
                    'head' => ['Colour', 'Varieties'],
                    'rows' => [
                        ['White', 'Statuario, Carrara, Calacatta, Perlato'],
                        ['Beige / cream', 'Botticino, Dyna (Royal Diana), Crema Marfil'],
                        ['Grey', 'Armani Grey'],
                        ['Brown / dark', 'Armani Brown (Bronze Armani), Emperador Dark, Emperador Light'],
                        ['Exotic', 'Onyx (backlit feature walls)'],
                    ],
                ],
                [
                    'type' => 'chips',
                    'title' => 'Where it works',
                    'items' => ['Living-room flooring', 'Feature walls', 'Staircases', 'Bathrooms', 'Table tops'],
                ],
            ],
        ],
        'faqs' => [
            ['Which Italian marble is most popular?', 'Statuario and Carrara are the most requested whites; Botticino and Dyna are popular beiges.'],
            ['Is Italian marble worth it?', 'For living rooms, lobbies and feature walls, its veining and depth are hard to match. For large utility areas, Indian marble or granite is more economical.'],
            ['Do slabs vary?', 'Yes. Natural veining differs, so choose your slabs at the showroom.'],
        ],
    ],

    $variety([
        'path' => 'marble/statuario',
        'parent' => 'marble/italian-marble',
        'name' => 'Statuario',
        'title' => 'Statuario Marble',
        'photo' => 'marble-white',
        'featured' => true,
        'intro' => 'Bright white Italian marble with bold grey veins: the classic choice for luxury floors and feature walls.',
        'content' => [
            'specs' => ['material' => 'Marble', 'origin' => 'Italy', 'colour' => 'White with bold grey veins', 'finishes' => $italianFinishes, 'uses' => ['Living-room flooring', 'Feature walls', 'Bathrooms', 'Table tops']],
            'body' => [
                'Statuario is one of the most prized Italian marbles, with a bright white background and bold, dramatic grey veining. Book-matched slabs make spectacular feature walls.',
                'Polished, it fills a room with light. Like all marble, it should be sealed and cleaned with pH-neutral products.',
            ],
            'pairs' => 'gold or brass fittings, walnut wood and soft grey upholstery.',
            'similar' => ['marble/calacatta', 'marble/carrara', 'marble/perlato', 'marble/makrana-white', 'granite/nano-white', 'granite/composite-marble'],
        ],
        'faqs' => [
            ['How is Statuario different from Carrara?', 'Statuario has a brighter white background and bolder veins; Carrara is greyer with softer, finer veining.'],
            ['Is Statuario good for bathrooms?', 'Yes, for walls and floors. A honed finish adds grip on bathroom floors.'],
            ['Does Statuario need sealing?', 'Yes. Sealing helps protect it from stains. We stock sealers made for marble.'],
        ],
    ]),

    $variety([
        'path' => 'marble/carrara',
        'parent' => 'marble/italian-marble',
        'name' => 'Carrara',
        'title' => 'Carrara Marble',
        'photo' => 'marble-carrara',
        'intro' => 'Soft white-grey Italian marble with fine, feathery veins, timeless and versatile.',
        'content' => [
            'specs' => ['material' => 'Marble', 'origin' => 'Carrara, Italy', 'colour' => 'White-grey with fine grey veins', 'finishes' => $italianFinishes, 'uses' => ['Flooring', 'Bathrooms', 'Table tops', 'Wall cladding']],
            'body' => [
                'Carrara marble has a white to light grey background with fine, soft grey veins. It is calmer than Statuario and blends easily into most interiors.',
                'It is a versatile marble for floors, bathrooms and table tops.',
            ],
            'pairs' => 'chrome or black fittings, white walls and light wood.',
        ],
        'faqs' => [
            ['Is Carrara marble expensive?', 'It is a premium Italian marble, but usually more accessible than Statuario or Calacatta. Ask us for today’s rate.'],
            ['Is Carrara good for table tops?', 'Yes. Seal it and use coasters to avoid rings from acidic drinks.'],
            ['Polished or honed Carrara?', 'Polished brightens floors; honed hides small scratches and suits bathrooms.'],
        ],
    ]),

    $variety([
        'path' => 'marble/calacatta',
        'parent' => 'marble/italian-marble',
        'name' => 'Calacatta',
        'title' => 'Calacatta Marble',
        'photo' => 'marble-white',
        'intro' => 'Luxurious white Italian marble with bold grey and gold veins.',
        'content' => [
            'specs' => ['material' => 'Marble', 'origin' => 'Italy', 'colour' => 'White with grey and gold veins', 'finishes' => $italianFinishes, 'uses' => ['Feature walls', 'Islands and table tops', 'Bathrooms', 'Flooring']],
            'body' => [
                'Calacatta has a bright white background with thick, dramatic veins in grey and warm gold tones. It is among the most luxurious white marbles.',
                'It is often used where it will be admired: feature walls, statement islands and bathrooms.',
            ],
            'pairs' => 'brass, warm wood and cream furnishings.',
        ],
        'faqs' => [
            ['What makes Calacatta different?', 'Its bold veining often carries warm gold tones, unlike the cooler grey veins of Carrara.'],
            ['Is Calacatta good for islands?', 'Yes, as a statement piece. Seal it and wipe acidic spills quickly.'],
            ['Calacatta or Statuario?', 'Both are premium whites; Calacatta usually has warmer, thicker veining. Compare slabs at the showroom.'],
        ],
    ]),

    $variety([
        'path' => 'marble/perlato',
        'parent' => 'marble/italian-marble',
        'name' => 'Perlato',
        'title' => 'Perlato Marble',
        'photo' => 'marble-beige',
        'intro' => 'Light cream-white Italian marble with a fine, speckled texture for calm, bright floors.',
        'content' => [
            'specs' => ['material' => 'Marble', 'origin' => 'Italy', 'colour' => 'Light cream-white', 'finishes' => $italianFinishes, 'uses' => ['Flooring', 'Wall cladding', 'Staircases']],
            'body' => [
                'Perlato is a light cream-white marble with a fine, subtle texture rather than bold veins. It gives floors and walls a calm, even brightness.',
                'Its gentle look suits large rooms and staircases where a uniform surface is wanted.',
            ],
            'pairs' => 'beige and cream furnishings and warm lighting.',
        ],
        'faqs' => [
            ['Does Perlato have veins?', 'Very few. It has a fine, even texture with a light cream tone.'],
            ['Is Perlato good for large floors?', 'Yes. Its uniform look suits large rooms.'],
            ['Which finish suits Perlato?', 'Polished for living rooms; honed for a softer look.'],
        ],
    ]),

    $variety([
        'path' => 'marble/botticino',
        'parent' => 'marble/italian-marble',
        'name' => 'Botticino',
        'title' => 'Botticino Marble',
        'photo' => 'marble-beige',
        'featured' => true,
        'intro' => 'Warm cream-beige Italian marble with fine veins, a favourite for elegant floors.',
        'content' => [
            'specs' => ['material' => 'Marble', 'origin' => 'Italy', 'colour' => 'Cream-beige with fine veins', 'finishes' => $italianFinishes, 'uses' => ['Flooring', 'Staircases', 'Wall cladding', 'Bathrooms']],
            'body' => [
                'Botticino is a classic cream-beige marble with delicate veins and occasional fossil marks. Its warm tone makes rooms feel welcoming.',
                'It is a popular choice for living-room floors and staircases.',
            ],
            'pairs' => 'wood, brass and warm white walls.',
            'similar' => ['marble/dyna', 'marble/crema-marfil', 'marble/perlato', 'marble/katni-beige', 'marble/emperador', 'sandstone/dholpur-beige'],
        ],
        'faqs' => [
            ['Is Botticino beige or white?', 'It is a warm cream-beige.'],
            ['Is Botticino good for stairs?', 'Yes. Ask for a honed finish or anti-slip strips if the stairs get wet.'],
            ['Botticino or Dyna?', 'Both are beiges; compare the tone of the current slabs at the showroom.'],
        ],
    ]),

    $variety([
        'path' => 'marble/dyna',
        'parent' => 'marble/italian-marble',
        'name' => 'Dyna',
        'title' => 'Dyna Marble (Royal Diana)',
        'photo' => 'marble-beige',
        'intro' => 'A soft beige imported marble, also sold as Royal Diana, for warm, elegant floors.',
        'content' => [
            'specs' => ['material' => 'Marble', 'origin' => 'Imported', 'colour' => 'Soft beige', 'aka' => ['Royal Diana', 'Diana Royal'], 'finishes' => $italianFinishes, 'uses' => ['Flooring', 'Wall cladding', 'Staircases']],
            'body' => [
                'Dyna marble, also known as Royal Diana, has a soft beige tone with light veining. It gives floors a warm, refined look.',
                'It is a dependable beige for living rooms, bedrooms and staircases.',
            ],
            'pairs' => 'cream and brown furnishings and gold accents.',
        ],
        'faqs' => [
            ['Is Dyna the same as Royal Diana?', 'Yes. Both names are used for this beige imported marble.'],
            ['Is Dyna marble good for flooring?', 'Yes. It is widely used for living-room and bedroom floors.'],
            ['How do I keep Dyna marble clean?', 'Use pH-neutral cleaners and seal it to resist stains. We stock both.'],
        ],
    ]),

    $variety([
        'path' => 'marble/crema-marfil',
        'parent' => 'marble/italian-marble',
        'name' => 'Crema Marfil',
        'title' => 'Crema Marfil Marble',
        'photo' => 'marble-beige',
        'intro' => 'Classic Spanish cream marble with an even tone and soft veins.',
        'content' => [
            'specs' => ['material' => 'Marble', 'origin' => 'Spain', 'colour' => 'Cream with soft veins', 'finishes' => $italianFinishes, 'uses' => ['Flooring', 'Bathrooms', 'Wall cladding']],
            'body' => [
                'Crema Marfil is a cream marble from Spain with a fairly even tone and soft, light veining. It is known for its calm, classic look.',
                'It suits floors and bathrooms where a warm, consistent cream is wanted.',
            ],
            'pairs' => 'brown wood, gold fittings and beige walls.',
        ],
        'faqs' => [
            ['Where does Crema Marfil come from?', 'Spain.'],
            ['Is Crema Marfil good for bathrooms?', 'Yes. A honed finish adds grip on floors.'],
            ['Crema Marfil or Botticino?', 'Both are cream marbles; Crema Marfil is often more even in tone.'],
        ],
    ]),

    $variety([
        'path' => 'marble/armani-grey',
        'parent' => 'marble/italian-marble',
        'name' => 'Armani Grey',
        'title' => 'Armani Grey Marble',
        'photo' => 'marble-dark-grey',
        'intro' => 'A modern grey marble with white veins for contemporary floors and walls.',
        'content' => [
            'specs' => ['material' => 'Marble', 'origin' => 'Imported', 'colour' => 'Grey with white veins', 'finishes' => $italianFinishes, 'uses' => ['Flooring', 'Feature walls', 'Bathrooms', 'Table tops']],
            'body' => [
                'Armani Grey has a cool grey background with fine white veins. It gives a sleek, contemporary feel to floors, walls and bathrooms.',
                'It pairs well with white, black and wood in modern interiors.',
            ],
            'pairs' => 'white walls, black fittings and light oak.',
        ],
        'faqs' => [
            ['Is Armani Grey a dark marble?', 'It is a mid-to-dark grey with white veins.'],
            ['Is Armani Grey good for bathrooms?', 'Yes. Honed or brushed finishes add grip on floors.'],
            ['Is there an Armani Brown too?', 'Yes. Armani Brown, also called Bronze Armani, is the brown version.'],
        ],
    ]),

    $variety([
        'path' => 'marble/armani-brown',
        'parent' => 'marble/italian-marble',
        'name' => 'Armani Brown',
        'title' => 'Armani Brown Marble (Bronze Armani)',
        'photo' => 'marble-brown',
        'intro' => 'Rich brown imported marble with fine veins, also sold as Bronze Armani.',
        'content' => [
            'specs' => ['material' => 'Marble', 'origin' => 'Imported', 'colour' => 'Brown with fine veins', 'aka' => ['Bronze Armani'], 'finishes' => $italianFinishes, 'uses' => ['Feature walls', 'Flooring', 'Table tops', 'Bathrooms']],
            'body' => [
                'Armani Brown is a warm brown marble with fine, light veining. It brings depth and richness to feature walls, floors and bathrooms.',
                'It works especially well as a contrast to cream or beige marble.',
            ],
            'pairs' => 'cream marble, brass and warm lighting.',
        ],
        'faqs' => [
            ['Is Armani Brown the same as Bronze Armani?', 'Yes.'],
            ['Can Armani Brown be combined with beige marble?', 'Yes. It makes elegant borders and inlays with Botticino or Dyna.'],
            ['Is Armani Brown good for table tops?', 'Yes. Seal it and use coasters.'],
        ],
    ]),

    $variety([
        'path' => 'marble/emperador',
        'parent' => 'marble/italian-marble',
        'name' => 'Emperador',
        'title' => 'Emperador Marble (Dark and Light)',
        'photo' => 'marble-brown',
        'intro' => 'Spanish brown marble with cream veins, in a deep Dark and a softer Light version.',
        'content' => [
            'specs' => ['material' => 'Marble', 'origin' => 'Spain', 'colour' => 'Brown with cream and white veins', 'aka' => ['Emperador Dark', 'Emperador Light'], 'finishes' => $italianFinishes, 'uses' => ['Feature walls', 'Flooring', 'Table tops', 'Bathrooms']],
            'body' => [
                'Emperador marble comes in two tones. Emperador Dark is a deep chocolate brown with fine cream veins; Emperador Light is a lighter, warmer brown.',
                'Both are classic choices for feature walls, bathrooms and luxurious floors, and they combine well with cream marble.',
            ],
            'pairs' => 'cream marble, gold fittings and dark wood.',
        ],
        'faqs' => [
            ['What is the difference between Emperador Dark and Light?', 'Dark is a deep chocolate brown; Light is a softer, lighter brown. Both have cream veining.'],
            ['Is Emperador good for flooring?', 'Yes, especially as a border or feature with lighter marble.'],
            ['Does Emperador show scratches?', 'Dark polished marble can show fine scratches; a honed finish hides them better.'],
        ],
    ]),

    $variety([
        'path' => 'marble/onyx',
        'parent' => 'marble/italian-marble',
        'name' => 'Onyx',
        'title' => 'Onyx Marble',
        'photo' => 'marble-onyx',
        'intro' => 'Translucent onyx that glows when backlit: the showpiece stone for feature walls and bars.',
        'content' => [
            'specs' => ['material' => 'Onyx', 'origin' => 'Imported', 'colour' => 'Translucent creams, honeys and whites', 'finishes' => ['Polished'], 'uses' => ['Backlit feature walls', 'Bar counters', 'Reception desks', 'Table tops']],
            'body' => [
                'Onyx is a translucent stone with flowing bands of colour. Lit from behind, it glows, which makes it the go-to stone for backlit feature walls, bar counters and reception desks.',
                'It is softer than granite, so it is best used where it won’t take heavy wear.',
            ],
            'pairs' => 'warm LED backlighting, dark wood and simple surroundings.',
        ],
        'faqs' => [
            ['Can onyx be backlit?', 'Yes. Its translucency is why it is used for glowing feature walls and counters.'],
            ['Is onyx good for flooring?', 'It is softer than marble and granite, so it is better for walls, counters and feature pieces.'],
            ['Is every onyx slab different?', 'Yes. Choose your slab in person or ask for photos on WhatsApp.'],
        ],
    ]),

    [
        'path' => 'marble/indian-marble',
        'parent' => 'marble',
        'template' => 'collection',
        'name' => 'Indian Marble',
        'title' => 'Indian marble in Kutch',
        'seo_title' => 'Indian Marble in Gandhidham & Adipur | Shyam Granite',
        'meta_description' => 'Makrana, Ambaji, Rajnagar, Morwad, Banswara, Udaipur Green and Katni marble in Adipur, Kutch for floors, temples and carving.',
        'summary' => 'Makrana, Ambaji, Rajnagar and more for floors, temples and carving.',
        'intro' => 'Indian marble costs less than imported marble and is used across India for floors, temples and carving. Our range covers classic whites, a green and a beige.',
        'photo' => 'temple-white',
        'content' => [
            'range_title' => 'Indian marble varieties',
            'blocks' => [
                [
                    'type' => 'table',
                    'title' => 'Varieties at a glance',
                    'head' => ['Variety', 'Origin', 'Character'],
                    'rows' => [
                        ['Makrana White', 'Rajasthan', 'Pure white, the classic temple marble'],
                        ['Ambaji White', 'Gujarat', 'White, very good for carving'],
                        ['Rajnagar White', 'Rajasthan', 'White with a sparkle when polished'],
                        ['Morwad / Agaria White', 'Rajasthan', 'Affordable white flooring marble'],
                        ['Banswara White', 'Rajasthan', 'Off-white, used for cladding'],
                        ['Udaipur Green', 'Rajasthan', 'Green with white and black veining'],
                        ['Katni Beige', 'Madhya Pradesh', 'Beige, for flooring and paving'],
                    ],
                ],
            ],
        ],
        'faqs' => [
            ['Which Indian marble is best for temples?', 'Makrana white is the classic temple marble. Ambaji white is excellent for carved work.'],
            ['Is Indian marble cheaper than Italian?', 'Yes, generally. Ask us for today’s rates to compare.'],
            ['Which Indian marble suits a budget floor?', 'Morwad (Agaria) white is an affordable white flooring marble.'],
        ],
    ],

    $variety([
        'path' => 'marble/makrana-white',
        'parent' => 'marble/indian-marble',
        'name' => 'Makrana White',
        'title' => 'Makrana White Marble',
        'photo' => 'temple-white',
        'featured' => true,
        'intro' => 'The classic pure white marble of Rajasthan, used for temples, murtis and fine floors.',
        'content' => [
            'specs' => ['material' => 'Marble', 'origin' => 'Makrana, Rajasthan', 'colour' => 'Pure white', 'aka' => ['Albeta', 'Adanga', 'Dungri'], 'finishes' => $indianFinishes, 'uses' => ['Temples and mandirs', 'Murtis', 'Flooring', 'Inlay work']],
            'body' => [
                'Makrana marble from Rajasthan is India’s most famous white marble and the classic choice for temples. Grades such as Albeta, Adanga and Dungri differ in whiteness and veining.',
                'It is dense and takes a lasting polish, which makes it ideal for mandirs, murtis, inlay work and heirloom floors.',
            ],
            'pairs' => 'gold, saffron and deep red accents in pooja rooms.',
            'similar' => ['marble/ambaji-white', 'marble/rajnagar-white', 'marble/morwad-white', 'marble/banswara-white', 'marble/statuario', 'granite/nano-white'],
        ],
        'faqs' => [
            ['What are Albeta, Adanga and Dungri?', 'They are grades of Makrana marble that differ in whiteness and veining. See them side by side at the showroom.'],
            ['Is Makrana marble good for a home mandir?', 'Yes. It is the classic temple marble, and we make mandirs to order through our Shilp Kala work.'],
            ['Does Makrana marble turn yellow?', 'Good-quality Makrana keeps its colour well. Seal it and clean with pH-neutral products.'],
        ],
    ]),

    $variety([
        'path' => 'marble/ambaji-white',
        'parent' => 'marble/indian-marble',
        'name' => 'Ambaji White',
        'title' => 'Ambaji White Marble',
        'photo' => 'stone-carving',
        'intro' => 'Gujarat’s own white marble from Ambaji, especially valued for carving.',
        'content' => [
            'specs' => ['material' => 'Marble', 'origin' => 'Ambaji, Gujarat', 'colour' => 'White', 'finishes' => $indianFinishes, 'uses' => ['Carving and murtis', 'Temples', 'Flooring', 'Jaali work']],
            'body' => [
                'Ambaji white marble comes from north Gujarat and is very good for carving, which is why it is widely used for murtis, temple work and jaali screens.',
                'It also makes bright, durable floors for homes and temples.',
            ],
            'pairs' => 'carved details, brass diyas and saffron accents.',
        ],
        'faqs' => [
            ['Why is Ambaji marble good for carving?', 'Its texture lets carvers achieve fine detail, so it is popular for murtis and temple work.'],
            ['Is Ambaji marble from Gujarat?', 'Yes, from the Ambaji area in north Gujarat.'],
            ['Ambaji or Makrana for a mandir?', 'Both are excellent. Ask us to show you finished pieces in each.'],
        ],
    ]),

    $variety([
        'path' => 'marble/rajnagar-white',
        'parent' => 'marble/indian-marble',
        'name' => 'Rajnagar White',
        'title' => 'Rajnagar White Marble',
        'photo' => 'marble-white',
        'intro' => 'White Rajasthan marble with a fine sparkle when polished.',
        'content' => [
            'specs' => ['material' => 'Marble', 'origin' => 'Rajasthan', 'colour' => 'White with a crystalline sparkle', 'finishes' => $indianFinishes, 'uses' => ['Flooring', 'Wall cladding', 'Temples']],
            'body' => [
                'Rajnagar white marble has a crystalline texture that sparkles when polished. It gives floors and walls a bright, lively finish.',
                'It is a popular white for homes and temples.',
            ],
            'pairs' => 'white walls and light wood.',
        ],
        'faqs' => [
            ['Why does Rajnagar marble sparkle?', 'Its crystalline structure catches the light once polished.'],
            ['Is Rajnagar marble good for floors?', 'Yes. It is widely used for homes and temples.'],
            ['Rajnagar or Makrana?', 'Makrana is the classic pure white; Rajnagar has more sparkle. Compare them at the showroom.'],
        ],
    ]),

    $variety([
        'path' => 'marble/morwad-white',
        'parent' => 'marble/indian-marble',
        'name' => 'Morwad White',
        'title' => 'Morwad White Marble (Agaria)',
        'photo' => 'marble-grey',
        'intro' => 'An affordable white flooring marble from Rajasthan, also sold as Agaria.',
        'content' => [
            'specs' => ['material' => 'Marble', 'origin' => 'Rajasthan', 'colour' => 'White with light grey veins', 'aka' => ['Agaria White'], 'finishes' => $indianFinishes, 'uses' => ['Flooring', 'Staircases', 'Wall cladding']],
            'body' => [
                'Morwad, also called Agaria white, is a white marble with light grey veins. It is a budget-friendly way to get a white marble floor.',
                'It suits bedrooms, living rooms and staircases in homes where cost matters.',
            ],
            'pairs' => 'neutral walls and simple furniture.',
        ],
        'faqs' => [
            ['Is Morwad the same as Agaria?', 'Yes. Both names are used for this affordable white marble.'],
            ['Is Morwad marble good quality?', 'It is a well-used flooring marble that offers a white look at a lower cost.'],
            ['Can Morwad marble be used on stairs?', 'Yes.'],
        ],
    ]),

    $variety([
        'path' => 'marble/banswara-white',
        'parent' => 'marble/indian-marble',
        'name' => 'Banswara White',
        'title' => 'Banswara White Marble',
        'photo' => 'marble-carrara',
        'intro' => 'Off-white Rajasthan marble widely used for wall cladding.',
        'content' => [
            'specs' => ['material' => 'Marble', 'origin' => 'Banswara, Rajasthan', 'colour' => 'Off-white', 'finishes' => $indianFinishes, 'uses' => ['Wall cladding', 'Flooring', 'Elevations']],
            'body' => [
                'Banswara white is an off-white marble from southern Rajasthan. Its soft tone suits wall cladding and floors.',
                'It is often chosen for large cladding areas where an even off-white is wanted.',
            ],
            'pairs' => 'warm lighting and wood details.',
        ],
        'faqs' => [
            ['Is Banswara marble pure white?', 'It is off-white.'],
            ['Is Banswara marble used for cladding?', 'Yes. It is widely used for wall cladding.'],
            ['Can it be used for flooring?', 'Yes.'],
        ],
    ]),

    $variety([
        'path' => 'marble/udaipur-green',
        'parent' => 'marble/indian-marble',
        'name' => 'Udaipur Green',
        'title' => 'Udaipur Green Marble',
        'photo' => 'marble-green',
        'intro' => 'Deep green Rajasthan marble with white and black veins, for borders, inlays and feature pieces.',
        'content' => [
            'specs' => ['material' => 'Marble', 'origin' => 'Udaipur, Rajasthan', 'colour' => 'Green with white and black veins', 'finishes' => $indianFinishes, 'uses' => ['Flooring borders', 'Inlay work', 'Table tops', 'Feature walls']],
            'body' => [
                'Udaipur Green is a rich green marble with white and black veining. It is a favourite for floor borders, inlays and table tops.',
                'Paired with white marble, it gives a classic, elegant contrast.',
            ],
            'pairs' => 'white Makrana or Ambaji marble and brass.',
        ],
        'faqs' => [
            ['Where is Udaipur Green quarried?', 'In the Udaipur region of Rajasthan.'],
            ['Is Udaipur Green used for inlay?', 'Yes. It is popular for inlay and borders with white marble.'],
            ['Can Udaipur Green be a full floor?', 'It can, though it is most often used as a border or feature.'],
        ],
    ]),

    $variety([
        'path' => 'marble/katni-beige',
        'parent' => 'marble/indian-marble',
        'name' => 'Katni Beige',
        'title' => 'Katni Beige Marble',
        'photo' => 'marble-beige',
        'intro' => 'Beige marble from Madhya Pradesh for floors and paving.',
        'content' => [
            'specs' => ['material' => 'Marble', 'origin' => 'Katni, Madhya Pradesh', 'colour' => 'Beige', 'finishes' => $indianFinishes, 'uses' => ['Flooring', 'Paving', 'Staircases']],
            'body' => [
                'Katni marble from Madhya Pradesh has a warm beige tone. It is used for flooring and paving where a soft, natural colour is wanted.',
                'It is a practical, economical beige compared with imported beige marbles.',
            ],
            'pairs' => 'cream walls and wood.',
        ],
        'faqs' => [
            ['Where does Katni marble come from?', 'Katni, in Madhya Pradesh.'],
            ['Is Katni marble good for paving?', 'Yes, it is used for flooring and paving.'],
            ['Katni or Botticino?', 'Botticino is an imported premium beige; Katni is an economical Indian beige.'],
        ],
    ]),

];

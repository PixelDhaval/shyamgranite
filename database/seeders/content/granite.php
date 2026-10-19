<?php

/*
| Granite: hub, three sub-categories and their varieties.
| Varieties sit directly under /granite/ (SITE-STRUCTURE.md); parent_id
| links each one to its sub-category. Publish only stocked varieties:
| set 'published' => false for anything not carried.
*/

$southFinishes = ['Polished', 'Honed', 'Leather', 'Flamed'];
$rajasthanFinishes = ['Polished', 'Flamed', 'Lapotra'];

$variety = fn (array $page): array => ['template' => 'variety', ...$page];

return [

    [
        'path' => 'granite',
        'template' => 'collection',
        'name' => 'Granite',
        'title' => 'Granite in Gandhidham and Adipur',
        'seo_title' => 'Granite in Gandhidham & Adipur, Kutch | Shyam Granite',
        'meta_description' => 'South Indian, Rajasthan and engineered granite in Adipur, Kutch. Kitchen, flooring and stair colours, cut and polished to size. WhatsApp for today’s rate.',
        'summary' => 'South Indian, Rajasthan and engineered stone, including Nano White.',
        'intro' => 'Granite is the hard-wearing stone behind most kitchen platforms, staircases and busy floors in Kutch. Choose from South Indian, Rajasthan and engineered slabs at our Adipur showroom.',
        'photo' => 'granite-black',
        'content' => [
            'range_title' => 'Three families of granite',
            'range_intro' => 'Each family suits different jobs and budgets. Every colour can be cut, polished and moulded at our workshop.',
            'blocks' => [
                [
                    'type' => 'table',
                    'title' => 'Granite at a glance',
                    'head' => ['Family', 'Typical colours', 'Usually chosen for'],
                    'rows' => [
                        ['South Indian granite', 'Black, brown, grey, white, red and exotic blues', 'Kitchen platforms, flooring, staircases, wall cladding, door and window frames'],
                        ['Rajasthan & North Indian granite', 'Red, pink, black, white, cream and yellow', 'Flooring, steps and risers, elevations, outdoor paving, budget kitchen platforms'],
                        ['Engineered stone', 'Bright white and uniform patterns', 'Modern kitchens, vanity tops, table tops, feature walls'],
                    ],
                ],
                [
                    'type' => 'chips',
                    'title' => 'Finishes',
                    'intro' => 'Polished is the most popular. Honed, leather, flamed and lapotra change the look and grip.',
                    'items' => ['Polished', 'Honed (matt)', 'Leather', 'Flamed', 'Lapotra'],
                ],
                [
                    'type' => 'prose',
                    'title' => 'Choosing granite for your project',
                    'photo' => 'kitchen-hero',
                    'body' => [
                        'For kitchen platforms, dense South Indian granite such as Black Galaxy, Absolute Black, Tan Brown or Steel Grey resists heat and scratches and is easy to keep clean.',
                        'For large floors, stairs and outdoor areas, Rajasthan granite such as Lakha Red, Rosy Pink or R Black usually costs less and takes a flamed or lapotra finish for extra grip.',
                        'Granite is natural, so colour and pattern vary from lot to lot. See the actual slabs at the showroom before you decide.',
                    ],
                ],
                [
                    'type' => 'links',
                    'title' => 'Granite by use',
                    'paths' => ['kitchen', 'flooring', 'elevation-outdoor'],
                ],
                [
                    'type' => 'links',
                    'title' => 'Processing at our workshop',
                    'paths' => ['services/granite-cutting', 'services/granite-polishing', 'services/granite-moulding'],
                ],
            ],
        ],
        'faqs' => [
            ['Which granite is best for a kitchen platform?', 'Dense South Indian granites such as Black Galaxy, Absolute Black, Tan Brown and Steel Grey are the most common choices. They are hard-wearing, resist heat and are easy to clean.'],
            ['Is Rajasthan granite good quality?', 'Yes. Rajasthan granite is widely used for flooring, steps, elevations and outdoor paving and usually costs less than South Indian granite.'],
            ['What is the price of granite per sq ft?', 'Rates change with origin, colour, thickness, finish and slab size, so we don’t publish prices. WhatsApp us the colour and your measurements for today’s rate.'],
            ['Does granite need sealing?', 'Dark, dense granites rarely need it. Lighter granites such as Kashmir White can absorb oil and water, so a stone sealer is a good idea. We stock sealers and impregnators.'],
        ],
    ],

    // South Indian granite
    [
        'path' => 'granite/south-indian-granite',
        'parent' => 'granite',
        'template' => 'collection',
        'name' => 'South Indian Granite',
        'title' => 'South Indian granite',
        'seo_title' => 'South Indian Granite in Gandhidham & Adipur | Shyam Granite',
        'meta_description' => 'Black Galaxy, Absolute Black, Tan Brown, Steel Grey, Kashmir White and more South Indian granite in Adipur, Kutch. WhatsApp for today’s rate.',
        'summary' => 'Dense, hard-wearing stone: the first choice for kitchen platforms.',
        'intro' => 'Quarried mainly in Andhra Pradesh, Tamil Nadu and Karnataka, South Indian granite is dense and hard-wearing, which makes it the first choice for kitchen platforms.',
        'photo' => 'granite-dark',
        'content' => [
            'range_title' => 'South Indian granite colours',
            'range_intro' => 'Blacks, browns, greys, whites, reds and exotic blues, all available polished, honed, leather or flamed.',
            'blocks' => [
                [
                    'type' => 'table',
                    'title' => 'Colour families',
                    'head' => ['Colour', 'Varieties'],
                    'rows' => [
                        ['Black', 'Black Galaxy, Telephone Black, Absolute Black, Jet Black, Black Pearl'],
                        ['Brown', 'Tan Brown, Coffee Brown, Ivory Brown, Baltic Brown'],
                        ['Grey', 'Steel Grey, Silver Grey'],
                        ['White / cream', 'Kashmir White, Colonial White, Viscon White, Moon White'],
                        ['Red, blue and exotic', 'Imperial Red, Ruby Red, Paradiso, Sapphire Blue'],
                    ],
                ],
                [
                    'type' => 'chips',
                    'title' => 'Where it works',
                    'items' => ['Kitchen platforms', 'Flooring', 'Staircases', 'Wall cladding', 'Door and window frames'],
                ],
            ],
        ],
        'faqs' => [
            ['Why is South Indian granite preferred for kitchens?', 'It is dense and hard, so it stands up to heat, knives and daily cleaning better than softer stones.'],
            ['Which South Indian granite hides stains best?', 'Darker, speckled stones such as Black Galaxy, Tan Brown and Steel Grey hide marks better than plain black or white granite.'],
            ['Is South Indian granite more expensive than Rajasthan granite?', 'Usually, yes, although it depends on the colour. Ask us for today’s rates on both to compare.'],
        ],
    ],

    $variety([
        'path' => 'granite/black-galaxy',
        'parent' => 'granite/south-indian-granite',
        'name' => 'Black Galaxy',
        'title' => 'Black Galaxy Granite',
        'photo' => 'granite-black',
        'featured' => true,
        'intro' => 'Deep black granite scattered with golden and copper flecks that catch the light like stars. One of the most asked-for kitchen granites in Kutch.',
        'content' => [
            'specs' => ['material' => 'Granite', 'origin' => 'Andhra Pradesh', 'colour' => 'Black with golden flecks', 'aka' => ['Galaxy Black'], 'finishes' => $southFinishes, 'uses' => ['Kitchen platforms', 'Table tops', 'Staircases', 'Feature flooring']],
            'body' => [
                'Black Galaxy, also sold as Galaxy Black, is a dense black granite with bright metallic flecks scattered through the stone. Polished, the flecks sparkle against the black and give a kitchen platform real depth.',
                'Because it is dense and dark, it shrugs off heat and everyday stains, and the flecks help hide crumbs and water marks between wipes. It is one of the colours customers ask for most at our showroom.',
            ],
            'pairs' => 'white or light grey cabinets, warm wood, and a stainless steel or black quartz sink.',
            'similar' => ['granite/black-pearl', 'granite/absolute-black', 'granite/jet-black', 'granite/telephone-black', 'granite/steel-grey', 'granite/sapphire-blue'],
        ],
        'faqs' => [
            ['Is Black Galaxy good for kitchen platforms?', 'Yes. It is one of the most popular kitchen granites because it is dense, heat-resistant and the flecks hide everyday marks.'],
            ['Is Black Galaxy the same as Galaxy Black?', 'Yes. Both names are used for the same black granite with golden flecks.'],
            ['Can Black Galaxy be given a leather finish?', 'Yes. A leather finish gives a softer, low-sheen look that hides fingerprints. Polished remains the most popular finish.'],
        ],
    ]),

    $variety([
        'path' => 'granite/telephone-black',
        'parent' => 'granite/south-indian-granite',
        'name' => 'Telephone Black',
        'title' => 'Telephone Black Granite',
        'photo' => 'granite-dark',
        'featured' => true,
        'intro' => 'A dark black granite with a fine, even grain, valued as a dependable, good-value black for kitchens and floors.',
        'content' => [
            'specs' => ['material' => 'Granite', 'origin' => 'South India', 'colour' => 'Black with fine grey grain', 'finishes' => $southFinishes, 'uses' => ['Kitchen platforms', 'Flooring', 'Staircases', 'Door and window frames']],
            'body' => [
                'Telephone Black is a dark granite with a fine, even grain that reads as black from a distance and shows a subtle grey texture up close. It takes a high polish.',
                'It is a practical choice when you want a black kitchen platform or staircase without the bold flecks of Black Galaxy, and its tight grain makes it easy to keep clean.',
            ],
            'pairs' => 'white, cream or pastel cabinets, and light marble or vitrified flooring.',
            'similar' => ['granite/absolute-black', 'granite/jet-black', 'granite/black-galaxy', 'granite/r-black', 'granite/black-pearl', 'granite/steel-grey'],
        ],
        'faqs' => [
            ['How is Telephone Black different from Absolute Black?', 'Absolute Black is a more uniform, solid black. Telephone Black shows a fine grain when you look closely. Compare both slabs at the showroom.'],
            ['Is Telephone Black suitable for stairs?', 'Yes. It is hard-wearing; ask for a flamed or leather finish on outdoor steps for better grip.'],
            ['Does Telephone Black need sealing?', 'It is a dense stone and rarely needs sealing indoors. Wipe spills promptly as with any granite.'],
        ],
    ]),

    $variety([
        'path' => 'granite/absolute-black',
        'parent' => 'granite/south-indian-granite',
        'name' => 'Absolute Black',
        'title' => 'Absolute Black Granite',
        'photo' => 'granite-dark',
        'featured' => true,
        'intro' => 'The deepest, most uniform black granite: a clean, solid black that suits modern kitchens and minimalist interiors.',
        'content' => [
            'specs' => ['material' => 'Granite', 'origin' => 'South India', 'colour' => 'Solid black', 'finishes' => $southFinishes, 'uses' => ['Kitchen platforms', 'Table tops', 'Wall cladding', 'Memorial and Shila Lekh plaques']],
            'body' => [
                'Absolute Black is prized for its even, solid black colour with very little visible grain. Polished, it becomes almost mirror-like; with a leather or honed finish it turns a soft, velvety black.',
                'Its uniform surface is also ideal for engraving, which is why it is often used for name plates and Shila Lekh. On a kitchen platform, a leather finish helps hide fingerprints and water spots.',
            ],
            'pairs' => 'white or wood cabinets, brass fittings, and a white or grey backsplash.',
            'similar' => ['granite/jet-black', 'granite/telephone-black', 'granite/black-galaxy', 'granite/black-pearl', 'granite/r-black', 'granite/steel-grey'],
        ],
        'faqs' => [
            ['Does polished Absolute Black show fingerprints?', 'A high polish on a solid black shows smudges more than speckled granite. A leather or honed finish hides them better.'],
            ['Can Absolute Black be engraved?', 'Yes. Its even black surface gives crisp, readable lettering for name plates and plaques.'],
            ['Is Absolute Black good for outdoor use?', 'Yes, with a flamed finish for grip. Polished black stone can get hot in direct sun.'],
        ],
    ]),

    $variety([
        'path' => 'granite/jet-black',
        'parent' => 'granite/south-indian-granite',
        'name' => 'Jet Black',
        'title' => 'Jet Black Granite',
        'photo' => 'granite-dark',
        'intro' => 'A rich, dark black granite with a smooth, consistent look for platforms, cladding and frames.',
        'content' => [
            'specs' => ['material' => 'Granite', 'origin' => 'South India', 'colour' => 'Deep black', 'finishes' => $southFinishes, 'uses' => ['Kitchen platforms', 'Wall cladding', 'Door and window frames', 'Table tops']],
            'body' => [
                'Jet Black is a deep black granite with a consistent appearance across the slab, which makes matching pieces on a long platform or a cladding wall straightforward.',
                'It is a dependable choice for frames and sills where a clean dark line sets off light walls.',
            ],
            'pairs' => 'light walls, white marble flooring and stainless steel fittings.',
        ],
        'faqs' => [
            ['How does Jet Black compare with Absolute Black?', 'Both are deep blacks. The difference is in the grain and shade of each lot, so compare the slabs side by side at the showroom.'],
            ['Is Jet Black good for door and window frames?', 'Yes. It is hard-wearing and gives a crisp dark outline against painted walls.'],
            ['Which finish suits Jet Black best?', 'Polished is the most popular. Honed or leather give a softer, modern look.'],
        ],
    ]),

    $variety([
        'path' => 'granite/black-pearl',
        'parent' => 'granite/south-indian-granite',
        'name' => 'Black Pearl',
        'title' => 'Black Pearl Granite',
        'photo' => 'granite-black',
        'intro' => 'Black granite with silvery and grey crystals that shimmer like pearl when the light moves across it.',
        'content' => [
            'specs' => ['material' => 'Granite', 'origin' => 'South India', 'colour' => 'Black with silver-grey crystals', 'finishes' => $southFinishes, 'uses' => ['Kitchen platforms', 'Flooring', 'Staircases', 'Table tops']],
            'body' => [
                'Black Pearl has a dark base filled with silvery-grey crystals that give a subtle shimmer, softer than the gold flecks of Black Galaxy.',
                'The speckled pattern hides crumbs and marks well, making it a practical, good-looking choice for busy kitchens and stairs.',
            ],
            'pairs' => 'grey or white cabinets, chrome fittings and cool-toned flooring.',
        ],
        'faqs' => [
            ['How is Black Pearl different from Black Galaxy?', 'Black Pearl has silvery-grey crystals; Black Galaxy has golden and copper flecks. Black Pearl suits cooler colour schemes.'],
            ['Is Black Pearl good for stairs?', 'Yes. Its speckled pattern hides wear, and a flamed or leather finish adds grip.'],
            ['Can I use Black Pearl for a dining table?', 'Yes. We cut and mould table tops in Black Pearl to your size and shape.'],
        ],
    ]),

    $variety([
        'path' => 'granite/tan-brown',
        'parent' => 'granite/south-indian-granite',
        'name' => 'Tan Brown',
        'title' => 'Tan Brown Granite',
        'photo' => 'marble-brown',
        'featured' => true,
        'intro' => 'Dark brown granite with black and reddish-brown patches: a warm, forgiving colour for busy kitchens.',
        'content' => [
            'specs' => ['material' => 'Granite', 'origin' => 'South India', 'colour' => 'Dark brown with black and reddish patches', 'finishes' => $southFinishes, 'uses' => ['Kitchen platforms', 'Flooring', 'Staircases', 'Window sills']],
            'body' => [
                'Tan Brown is a dark brown granite with a mix of black, brown and reddish crystals. The busy, warm pattern is very good at hiding spills, oil marks and crumbs, which is why it is a long-time favourite for kitchen platforms.',
                'It pairs naturally with wood and beige tones and suits both traditional and modern kitchens.',
            ],
            'pairs' => 'cream, beige or wood-finish cabinets and warm lighting.',
            'similar' => ['granite/coffee-brown', 'granite/baltic-brown', 'granite/ivory-brown', 'granite/imperial-red', 'granite/black-galaxy', 'granite/merry-gold'],
        ],
        'faqs' => [
            ['Is Tan Brown good for a kitchen platform?', 'Yes. It is one of the most practical kitchen granites because its busy brown pattern hides everyday marks.'],
            ['Does Tan Brown go with white cabinets?', 'Yes, it gives a warm contrast. It also pairs well with cream and wood finishes.'],
            ['Can Tan Brown be used outdoors?', 'Yes, with a flamed finish for grip on steps and paving.'],
        ],
    ]),

    $variety([
        'path' => 'granite/coffee-brown',
        'parent' => 'granite/south-indian-granite',
        'name' => 'Coffee Brown',
        'title' => 'Coffee Brown Granite',
        'photo' => 'marble-brown',
        'intro' => 'Rich brown granite with an even, rounded grain, like coffee beans: warm, uniform and easy to live with.',
        'content' => [
            'specs' => ['material' => 'Granite', 'origin' => 'South India', 'colour' => 'Brown with black grains', 'finishes' => $southFinishes, 'uses' => ['Kitchen platforms', 'Table tops', 'Flooring', 'Vanity tops']],
            'body' => [
                'Coffee Brown has a deep brown base with an even scatter of darker grains. The pattern is more uniform than Tan Brown, so joins on a long platform blend well.',
                'It gives a cosy, warm look and is a sensible choice for kitchens where you want a brown that doesn’t shout.',
            ],
            'pairs' => 'light beige walls, white or cream cabinets and brushed steel.',
        ],
        'faqs' => [
            ['How is Coffee Brown different from Tan Brown?', 'Coffee Brown has a more even grain; Tan Brown has bigger black and reddish patches. Both hide marks well.'],
            ['Does Coffee Brown suit small kitchens?', 'Yes, especially with light cabinets and walls to balance the darker top.'],
            ['Which edge suits a Coffee Brown platform?', 'Half bullnose is the most popular. Our workshop makes all standard edge profiles.'],
        ],
    ]),

    $variety([
        'path' => 'granite/ivory-brown',
        'parent' => 'granite/south-indian-granite',
        'name' => 'Ivory Brown',
        'title' => 'Ivory Brown Granite',
        'photo' => 'granite-cream-speckled',
        'intro' => 'A light cream-to-ivory granite flecked with brown and black: brighter than the classic browns and still forgiving.',
        'content' => [
            'specs' => ['material' => 'Granite', 'origin' => 'South India', 'colour' => 'Ivory with brown and black flecks', 'finishes' => $southFinishes, 'uses' => ['Kitchen platforms', 'Flooring', 'Wall cladding', 'Table tops']],
            'body' => [
                'Ivory Brown combines a light ivory background with brown and black specks, giving a bright surface that still hides everyday marks better than plain white stone.',
                'It suits homes that want a lighter kitchen or floor without moving to marble.',
            ],
            'pairs' => 'wood and cream tones, warm white walls and brass fittings.',
        ],
        'faqs' => [
            ['Is Ivory Brown a light or dark granite?', 'It is a light granite: an ivory base with brown and black flecks.'],
            ['Should Ivory Brown be sealed?', 'Lighter granites can absorb oil over time, so a stone sealer is a good idea on kitchen platforms.'],
            ['Is Ivory Brown suitable for flooring?', 'Yes. It brightens a room and its flecks hide dust between cleans.'],
        ],
    ]),

    $variety([
        'path' => 'granite/baltic-brown',
        'parent' => 'granite/south-indian-granite',
        'name' => 'Baltic Brown',
        'title' => 'Baltic Brown Granite',
        'photo' => 'marble-brown',
        'intro' => 'Granite with large round brown crystals ringed in black and green, giving a bold, distinctive pattern.',
        'content' => [
            'specs' => ['material' => 'Granite', 'colour' => 'Brown with large round crystals', 'finishes' => $southFinishes, 'uses' => ['Kitchen platforms', 'Table tops', 'Wall cladding']],
            'body' => [
                'Baltic Brown is recognised by its large, rounded brown crystals edged in darker tones. The pattern is bold, so it works best where the stone is the feature.',
                'Its mixed colours make it forgiving on a kitchen platform, and it pairs well with plain cabinets that let the pattern stand out.',
            ],
            'pairs' => 'plain cream or olive cabinets and simple tiled backsplashes.',
        ],
        'faqs' => [
            ['What does Baltic Brown look like?', 'A brown granite with large round crystals ringed in black, with flashes of green and grey.'],
            ['Is Baltic Brown good for kitchens?', 'Yes. It is hard-wearing and its busy pattern hides marks.'],
            ['Can I see a Baltic Brown slab first?', 'Yes. Pattern varies a lot by slab, so we recommend choosing the actual slab at the showroom.'],
        ],
    ]),

    $variety([
        'path' => 'granite/steel-grey',
        'parent' => 'granite/south-indian-granite',
        'name' => 'Steel Grey',
        'title' => 'Steel Grey Granite',
        'photo' => 'marble-dark-grey',
        'featured' => true,
        'intro' => 'Dark grey granite with black and silver specks: a cool, modern alternative to black for kitchens and stairs.',
        'content' => [
            'specs' => ['material' => 'Granite', 'origin' => 'South India', 'colour' => 'Dark grey with black and silver specks', 'finishes' => $southFinishes, 'uses' => ['Kitchen platforms', 'Staircases', 'Flooring', 'Wall cladding']],
            'body' => [
                'Steel Grey has a dark grey base with an even mix of black and silvery specks. It reads as a sophisticated charcoal, softer than black and very good at hiding marks.',
                'It suits modern kitchens with white, grey or wood cabinets, and its consistent pattern makes it a good choice for long staircases.',
            ],
            'pairs' => 'white or grey cabinets, wood accents and stainless steel.',
            'similar' => ['granite/silver-grey', 'granite/black-pearl', 'granite/telephone-black', 'granite/black-galaxy', 'granite/viscon-white', 'granite/r-black'],
        ],
        'faqs' => [
            ['Is Steel Grey good for kitchens?', 'Yes. It is dense and its speckled grey pattern hides spills and crumbs well.'],
            ['Is Steel Grey darker than Silver Grey?', 'Yes. Steel Grey is a dark charcoal; Silver Grey is lighter with more white in it.'],
            ['Which finish suits Steel Grey stairs?', 'Polished indoors; flamed or leather outdoors for better grip.'],
        ],
    ]),

    $variety([
        'path' => 'granite/silver-grey',
        'parent' => 'granite/south-indian-granite',
        'name' => 'Silver Grey',
        'title' => 'Silver Grey Granite',
        'photo' => 'marble-grey',
        'intro' => 'Light grey granite speckled with black and white: bright, neutral and easy to pair.',
        'content' => [
            'specs' => ['material' => 'Granite', 'origin' => 'South India', 'colour' => 'Light grey with black and white specks', 'finishes' => $southFinishes, 'uses' => ['Flooring', 'Kitchen platforms', 'Staircases', 'Outdoor paving']],
            'body' => [
                'Silver Grey is a lighter grey granite with a salt-and-pepper look. It brightens a room while keeping the hard-wearing qualities of granite.',
                'It is a popular choice for floors and stairs that need a neutral colour, and it works outdoors with a flamed finish.',
            ],
            'pairs' => 'white walls, black fittings and grey or blue accents.',
        ],
        'faqs' => [
            ['Is Silver Grey good for flooring?', 'Yes. It is light, neutral and hard-wearing, and the specks hide dust.'],
            ['Can Silver Grey be used on outdoor steps?', 'Yes. Choose a flamed finish for grip.'],
            ['Does Silver Grey stain?', 'Lighter granite can absorb oil if left, so wipe spills promptly or apply a sealer on kitchen tops.'],
        ],
    ]),

    $variety([
        'path' => 'granite/kashmir-white',
        'parent' => 'granite/south-indian-granite',
        'name' => 'Kashmir White',
        'title' => 'Kashmir White Granite',
        'photo' => 'granite-cream-speckled',
        'featured' => true,
        'intro' => 'A soft white granite with grey and small burgundy specks, for bright kitchens and floors.',
        'content' => [
            'specs' => ['material' => 'Granite', 'origin' => 'Tamil Nadu', 'colour' => 'White with grey and burgundy specks', 'finishes' => $southFinishes, 'uses' => ['Kitchen platforms', 'Flooring', 'Vanity tops', 'Wall cladding']],
            'body' => [
                'Despite the name, Kashmir White is a South Indian granite. It has a soft white to off-white background with grey crystals and small burgundy specks, giving a bright, gentle look.',
                'Like most light granites it is more porous than the dark ones, so we recommend sealing it on kitchen platforms and wiping spills such as oil and turmeric promptly.',
            ],
            'pairs' => 'grey, navy or wood cabinets and white walls.',
            'similar' => ['granite/colonial-white', 'granite/viscon-white', 'granite/moon-white', 'granite/p-white', 'granite/nano-white', 'granite/silver-grey'],
        ],
        'faqs' => [
            ['Where does Kashmir White granite come from?', 'It is a South Indian granite, quarried in Tamil Nadu, despite its name.'],
            ['Does Kashmir White stain easily?', 'It is lighter and more porous than dark granite. Sealing it and wiping spills quickly keeps it looking clean.'],
            ['Kashmir White or Nano White for a white kitchen?', 'Kashmir White is natural stone with gentle specks; Nano White is an engineered, bright solid white that doesn’t absorb liquids.'],
        ],
    ]),

    $variety([
        'path' => 'granite/colonial-white',
        'parent' => 'granite/south-indian-granite',
        'name' => 'Colonial White',
        'title' => 'Colonial White Granite',
        'photo' => 'marble-grey',
        'intro' => 'White and grey granite with gentle movement and small dark red specks, softer and more varied than Kashmir White.',
        'content' => [
            'specs' => ['material' => 'Granite', 'origin' => 'South India', 'colour' => 'White and grey with dark red specks', 'finishes' => $southFinishes, 'uses' => ['Kitchen platforms', 'Vanity tops', 'Flooring']],
            'body' => [
                'Colonial White mixes white, cream and grey with soft waves of movement and small dark red specks. It gives a calm, natural look that suits light, airy kitchens.',
                'As a lighter granite, it benefits from sealing on kitchen platforms.',
            ],
            'pairs' => 'white cabinets, pale wood and brushed nickel.',
        ],
        'faqs' => [
            ['How does Colonial White differ from Kashmir White?', 'Colonial White has more grey movement and variation; Kashmir White is more even with finer specks.'],
            ['Is Colonial White good for bathrooms?', 'Yes, as a vanity top. A honed finish reduces glare.'],
            ['Should I seal Colonial White?', 'Yes, on kitchen platforms. We stock stone sealers.'],
        ],
    ]),

    $variety([
        'path' => 'granite/viscon-white',
        'parent' => 'granite/south-indian-granite',
        'name' => 'Viscon White',
        'title' => 'Viscon White Granite',
        'photo' => 'marble-carrara',
        'intro' => 'White granite with grey and black waves, giving a marble-like movement with granite toughness.',
        'content' => [
            'specs' => ['material' => 'Granite', 'origin' => 'South India', 'colour' => 'White with grey and black waves', 'finishes' => $southFinishes, 'uses' => ['Kitchen platforms', 'Islands', 'Feature walls', 'Flooring']],
            'body' => [
                'Viscon White has a white background crossed by flowing grey and black veins, so it looks closer to marble than most granites while keeping granite’s hardness.',
                'It is a good choice for statement islands and feature walls, where the veining can be shown off.',
            ],
            'pairs' => 'black or charcoal cabinets, matte black fittings and white walls.',
        ],
        'faqs' => [
            ['Does Viscon White look like marble?', 'Its flowing grey and black veins give a marble-like look, but it is a harder granite.'],
            ['Is Viscon White good for kitchen islands?', 'Yes. The veining makes a strong feature, and it is hard-wearing.'],
            ['Does each slab look the same?', 'No. Veining varies, so choose your slab at the showroom.'],
        ],
    ]),

    $variety([
        'path' => 'granite/moon-white',
        'parent' => 'granite/south-indian-granite',
        'name' => 'Moon White',
        'title' => 'Moon White Granite',
        'photo' => 'marble-white',
        'intro' => 'A bright white granite with fine grey and black dots for a clean, light finish.',
        'content' => [
            'specs' => ['material' => 'Granite', 'origin' => 'South India', 'colour' => 'White with grey and black dots', 'finishes' => $southFinishes, 'uses' => ['Kitchen platforms', 'Flooring', 'Vanity tops']],
            'body' => [
                'Moon White has a bright white base with fine, evenly scattered grey and black dots. It gives a clean, light surface that suits contemporary homes.',
                'Sealing is recommended for kitchen use, as with other light granites.',
            ],
            'pairs' => 'any cabinet colour, especially grey, navy and wood.',
        ],
        'faqs' => [
            ['Is Moon White a pure white granite?', 'It is a bright white with fine grey and black dots, not a solid white. For solid white, consider Nano White.'],
            ['Is Moon White good for floors?', 'Yes. It brightens rooms and the dots help hide dust.'],
            ['Does Moon White need sealing?', 'On kitchen platforms, yes. Wipe oil and turmeric spills promptly.'],
        ],
    ]),

    $variety([
        'path' => 'granite/imperial-red',
        'parent' => 'granite/south-indian-granite',
        'name' => 'Imperial Red',
        'title' => 'Imperial Red Granite',
        'photo' => 'granite-red',
        'intro' => 'A rich red granite with black and grey crystals, used for bold kitchens, frames and cladding.',
        'content' => [
            'specs' => ['material' => 'Granite', 'origin' => 'South India', 'colour' => 'Deep red with black and grey crystals', 'finishes' => $southFinishes, 'uses' => ['Wall cladding', 'Door and window frames', 'Kitchen platforms', 'Monuments and plaques']],
            'body' => [
                'Imperial Red is a deep red granite with a medium grain of black and grey crystals. It holds a strong polish and keeps its colour well, making it a long-lasting choice for cladding and frames.',
                'It is also used for plaques and commemorative stones where a warm, dignified colour is wanted.',
            ],
            'pairs' => 'cream walls, sandstone elevations and black accents.',
        ],
        'faqs' => [
            ['How is Imperial Red different from Lakha Red?', 'Imperial Red is a South Indian granite, typically deeper in colour; Lakha Red is a Rajasthan granite that usually costs less.'],
            ['Can Imperial Red be used outside?', 'Yes. It is hard-wearing and suits cladding and frames.'],
            ['Is Imperial Red used for Shila Lekh?', 'It can be. Ask us about engraving on Imperial Red or Absolute Black.'],
        ],
    ]),

    $variety([
        'path' => 'granite/ruby-red',
        'parent' => 'granite/south-indian-granite',
        'name' => 'Ruby Red',
        'title' => 'Ruby Red Granite',
        'photo' => 'granite-red',
        'intro' => 'A bright red granite with black specks, for frames, cladding and colourful accents.',
        'content' => [
            'specs' => ['material' => 'Granite', 'origin' => 'South India', 'colour' => 'Bright red with black specks', 'finishes' => $southFinishes, 'uses' => ['Door and window frames', 'Wall cladding', 'Steps', 'Table tops']],
            'body' => [
                'Ruby Red is a lively red granite with an even scatter of black specks. Polished, the red becomes richer and more vivid.',
                'It is often used to frame doors and windows or to add a band of colour to a floor or elevation.',
            ],
            'pairs' => 'cream or white walls and grey granite flooring.',
        ],
        'faqs' => [
            ['Is Ruby Red brighter than Imperial Red?', 'Generally yes. Ruby Red is a livelier red; Imperial Red is deeper. Compare the slabs at the showroom.'],
            ['Can Ruby Red be used for flooring borders?', 'Yes. It makes a strong border or inlay band in a grey or white floor.'],
            ['Does Ruby Red fade in the sun?', 'Granite holds its colour well outdoors, which is why red granites are popular for frames and cladding.'],
        ],
    ]),

    $variety([
        'path' => 'granite/paradiso',
        'parent' => 'granite/south-indian-granite',
        'name' => 'Paradiso',
        'title' => 'Paradiso Granite',
        'photo' => 'granite-pink',
        'intro' => 'An exotic granite with flowing waves of purple, grey, pink and black: a statement stone for feature pieces.',
        'content' => [
            'specs' => ['material' => 'Granite', 'origin' => 'South India', 'colour' => 'Purple, grey and pink waves', 'finishes' => $southFinishes, 'uses' => ['Feature walls', 'Table tops', 'Kitchen islands', 'Reception counters']],
            'body' => [
                'Paradiso is known for its swirling, wave-like pattern in shades of purple, grey, pink and black. No two slabs look the same.',
                'It works best as a feature: a reception counter, an island, a dining table or a wall where the movement can be seen in full.',
            ],
            'pairs' => 'plain grey or white surroundings that let the pattern lead.',
        ],
        'faqs' => [
            ['Is Paradiso a natural granite?', 'Yes. Its wavy multicolour pattern is natural, so every slab is different.'],
            ['Is Paradiso suitable for kitchens?', 'Yes, it is hard-wearing, though its bold pattern suits an island or feature counter best.'],
            ['Can I reserve a particular Paradiso slab?', 'Ask us on WhatsApp for photos of the current slabs, then visit the showroom to choose.'],
        ],
    ]),

    $variety([
        'path' => 'granite/sapphire-blue',
        'parent' => 'granite/south-indian-granite',
        'name' => 'Sapphire Blue',
        'title' => 'Sapphire Blue Granite',
        'photo' => 'granite-blue',
        'intro' => 'A dark granite with blue crystals that flash in the light, one of the most striking exotic colours.',
        'content' => [
            'specs' => ['material' => 'Granite', 'origin' => 'South India', 'colour' => 'Dark with blue crystals', 'finishes' => $southFinishes, 'uses' => ['Feature walls', 'Kitchen islands', 'Table tops', 'Reception counters']],
            'body' => [
                'Sapphire Blue has a dark base with blue crystals that shimmer as you move around the stone. The effect is strongest with a mirror polish and good lighting.',
                'It is a statement stone for islands, bar counters, table tops and feature walls.',
            ],
            'pairs' => 'white or light grey cabinets, chrome and warm white lighting.',
        ],
        'faqs' => [
            ['Is Sapphire Blue really blue?', 'It has a dark base with blue crystals that show most clearly when polished and lit.'],
            ['Is Sapphire Blue good for a whole kitchen platform?', 'It can be, though many customers use it for an island or feature counter alongside a plainer granite.'],
            ['Is Sapphire Blue in stock?', 'Exotic colours vary by lot. WhatsApp us to check current stock.'],
        ],
    ]),

    // Rajasthan & North Indian granite
    [
        'path' => 'granite/rajasthan-granite',
        'parent' => 'granite',
        'template' => 'collection',
        'name' => 'Rajasthan Granite',
        'title' => 'Rajasthan and North Indian granite',
        'seo_title' => 'Rajasthan Granite in Gandhidham & Adipur | Shyam Granite',
        'meta_description' => 'Lakha Red, Jhansi Red, Rosy Pink, R Black, P White and more Rajasthan granite in Adipur, Kutch, for floors, stairs and exteriors.',
        'summary' => 'Good-value granite for floors, steps, elevations and paving.',
        'intro' => 'Sourced through the Jalore, Kishangarh and Udaipur hubs, Rajasthan and North Indian granite usually costs less than South Indian granite and is popular for flooring, stairs and exteriors.',
        'photo' => 'granite-pink',
        'content' => [
            'range_title' => 'Rajasthan granite colours',
            'range_intro' => 'Reds, pinks, blacks, whites, creams and yellows, available polished, flamed or lapotra.',
            'blocks' => [
                [
                    'type' => 'table',
                    'title' => 'Colour families',
                    'head' => ['Colour', 'Varieties'],
                    'rows' => [
                        ['Red', 'Lakha Red, Jhansi Red'],
                        ['Pink', 'Rosy Pink'],
                        ['Black', 'R Black (Rajasthan Black)'],
                        ['White / cream / yellow', 'P White, Royal Cream, Crystal Yellow, Merry Gold'],
                    ],
                ],
                [
                    'type' => 'chips',
                    'title' => 'Where it works',
                    'items' => ['Flooring', 'Steps and risers', 'Elevations', 'Outdoor paving', 'Kitchen platforms'],
                ],
            ],
        ],
        'faqs' => [
            ['Why choose Rajasthan granite?', 'It usually costs less than South Indian granite and performs well on floors, stairs and exteriors, especially with a flamed or lapotra finish.'],
            ['Can Rajasthan granite be used in kitchens?', 'Yes. It is used for kitchen platforms, particularly where budget matters.'],
            ['Which finishes are available?', 'Polished, flamed and lapotra.'],
        ],
    ],

    $variety([
        'path' => 'granite/lakha-red',
        'parent' => 'granite/rajasthan-granite',
        'name' => 'Lakha Red',
        'title' => 'Lakha Red Granite',
        'photo' => 'granite-red',
        'featured' => true,
        'intro' => 'Rajasthan’s best-known red granite: warm red with black and grey grains, popular for floors, steps and elevations.',
        'content' => [
            'specs' => ['material' => 'Granite', 'origin' => 'Jalore, Rajasthan', 'colour' => 'Red with black and grey grains', 'finishes' => $rajasthanFinishes, 'uses' => ['Flooring', 'Steps and risers', 'Elevations', 'Outdoor paving']],
            'body' => [
                'Lakha Red is a medium-grained red granite from Rajasthan with black and grey crystals through the red. It is one of the most widely used red granites for floors, staircases and building elevations.',
                'With a flamed finish it makes durable, grippy outdoor steps and paving; polished, it gives a warm, glossy floor.',
            ],
            'pairs' => 'cream sandstone elevations, white walls and black granite borders.',
            'similar' => ['granite/jhansi-red', 'granite/imperial-red', 'granite/ruby-red', 'granite/rosy-pink', 'granite/tan-brown', 'sandstone/agra-red'],
        ],
        'faqs' => [
            ['Is Lakha Red good for outdoor steps?', 'Yes. A flamed finish gives a textured, non-slip surface that suits outdoor steps and paving.'],
            ['Where is Lakha Red quarried?', 'In the Jalore area of Rajasthan.'],
            ['Lakha Red or Imperial Red?', 'Lakha Red usually costs less and is popular for floors and exteriors; Imperial Red is a deeper South Indian red often used for cladding and frames.'],
        ],
    ]),

    $variety([
        'path' => 'granite/jhansi-red',
        'parent' => 'granite/rajasthan-granite',
        'name' => 'Jhansi Red',
        'title' => 'Jhansi Red Granite',
        'photo' => 'granite-pink',
        'intro' => 'A North Indian red-pink granite with black grains, a good-value choice for floors and steps.',
        'content' => [
            'specs' => ['material' => 'Granite', 'origin' => 'Jhansi, Uttar Pradesh', 'colour' => 'Red-pink with black grains', 'finishes' => $rajasthanFinishes, 'uses' => ['Flooring', 'Steps and risers', 'Elevations', 'Outdoor paving']],
            'body' => [
                'Jhansi Red has a red-pink base with scattered black grains. It is a practical granite for large floors, steps and building fronts.',
                'Its lighter red tone suits homes that want warmth without the depth of Imperial Red.',
            ],
            'pairs' => 'cream walls, sandstone and grey granite.',
        ],
        'faqs' => [
            ['Is Jhansi Red from Rajasthan?', 'It comes from the Jhansi area in Uttar Pradesh and is grouped with Rajasthan and North Indian granites.'],
            ['Is Jhansi Red suitable for stairs?', 'Yes. Choose flamed or lapotra for outdoor stairs.'],
            ['How does Jhansi Red compare with Lakha Red?', 'Jhansi Red is lighter and pinker; Lakha Red is a deeper red.'],
        ],
    ]),

    $variety([
        'path' => 'granite/rosy-pink',
        'parent' => 'granite/rajasthan-granite',
        'name' => 'Rosy Pink',
        'title' => 'Rosy Pink Granite',
        'photo' => 'granite-pink',
        'featured' => true,
        'intro' => 'A soft pink granite with grey and black crystals, widely used for floors, stairs and elevations.',
        'content' => [
            'specs' => ['material' => 'Granite', 'origin' => 'Rajasthan', 'colour' => 'Pink with grey and black crystals', 'finishes' => $rajasthanFinishes, 'uses' => ['Flooring', 'Steps and risers', 'Elevations', 'Outdoor paving']],
            'body' => [
                'Rosy Pink is a light pink granite with grey and black crystals. It brings gentle warmth to floors and staircases and is a familiar sight on building elevations across Gujarat.',
                'It is good value for large areas and takes polished, flamed and lapotra finishes.',
            ],
            'pairs' => 'white walls, red granite borders and cream sandstone.',
        ],
        'faqs' => [
            ['Is Rosy Pink good for flooring?', 'Yes. It is hard-wearing, light in tone and good value for large areas.'],
            ['Can Rosy Pink be flamed for outdoor use?', 'Yes. A flamed finish adds grip for steps and paving.'],
            ['Does Rosy Pink suit modern homes?', 'Yes, especially in a honed-look lapotra finish with white walls.'],
        ],
    ]),

    $variety([
        'path' => 'granite/r-black',
        'parent' => 'granite/rajasthan-granite',
        'name' => 'R Black',
        'title' => 'R Black Granite',
        'photo' => 'granite-dark',
        'intro' => 'Rajasthan Black: a good-value black granite with grey specks for floors, steps and platforms.',
        'content' => [
            'specs' => ['material' => 'Granite', 'origin' => 'Rajasthan', 'colour' => 'Black with grey specks', 'aka' => ['Rajasthan Black'], 'finishes' => $rajasthanFinishes, 'uses' => ['Flooring', 'Steps and risers', 'Kitchen platforms', 'Borders and inlays']],
            'body' => [
                'R Black, short for Rajasthan Black, is a dark granite with grey specks. It gives a black look at a lower cost than the South Indian blacks.',
                'It is often used for steps, floor borders and budget kitchen platforms.',
            ],
            'pairs' => 'white marble or light granite floors as a border, and white walls.',
        ],
        'faqs' => [
            ['What does R Black stand for?', 'Rajasthan Black, a black granite from Rajasthan.'],
            ['Is R Black as dark as Absolute Black?', 'No. R Black shows grey specks; Absolute Black is a more solid black.'],
            ['Is R Black good for stairs?', 'Yes. It is hard-wearing and suits steps and risers.'],
        ],
    ]),

    $variety([
        'path' => 'granite/p-white',
        'parent' => 'granite/rajasthan-granite',
        'name' => 'P White',
        'title' => 'P White Granite',
        'photo' => 'granite-cream-speckled',
        'intro' => 'A white Rajasthan granite with black and grey specks, a bright, budget-friendly choice for floors.',
        'content' => [
            'specs' => ['material' => 'Granite', 'origin' => 'Rajasthan', 'colour' => 'White with black and grey specks', 'finishes' => $rajasthanFinishes, 'uses' => ['Flooring', 'Steps and risers', 'Kitchen platforms', 'Outdoor paving']],
            'body' => [
                'P White has a white base with an even scatter of black and grey specks. It brightens floors and stairs and costs less than the South Indian whites.',
                'Like other light granites it benefits from sealing where oil and food are involved.',
            ],
            'pairs' => 'black granite borders, grey walls and wood.',
        ],
        'faqs' => [
            ['Is P White good for large floors?', 'Yes. It is bright, hard-wearing and good value over large areas.'],
            ['Does P White need sealing?', 'On kitchen platforms, yes. On floors, regular cleaning is usually enough.'],
            ['P White or Kashmir White?', 'P White is a Rajasthan granite and usually costs less; Kashmir White is a South Indian granite with a softer look.'],
        ],
    ]),

    $variety([
        'path' => 'granite/royal-cream',
        'parent' => 'granite/rajasthan-granite',
        'name' => 'Royal Cream',
        'title' => 'Royal Cream Granite',
        'photo' => 'granite-cream-speckled',
        'intro' => 'A cream granite with small pink and grey grains, giving a soft, warm floor.',
        'content' => [
            'specs' => ['material' => 'Granite', 'origin' => 'Rajasthan', 'colour' => 'Cream with pink and grey grains', 'finishes' => $rajasthanFinishes, 'uses' => ['Flooring', 'Steps and risers', 'Elevations']],
            'body' => [
                'Royal Cream has a warm cream background with small pink and grey grains. It gives floors and stairs a soft, welcoming look.',
                'It suits homes that want a light floor with more warmth than white granite.',
            ],
            'pairs' => 'wood, beige walls and brown granite borders.',
        ],
        'faqs' => [
            ['Is Royal Cream a light granite?', 'Yes. It is cream with small pink and grey grains.'],
            ['Is Royal Cream good for staircases?', 'Yes. Use lapotra or flamed on outdoor steps for grip.'],
            ['Does Royal Cream go with brown furniture?', 'Yes. Its warm cream tone pairs naturally with wood and brown.'],
        ],
    ]),

    $variety([
        'path' => 'granite/crystal-yellow',
        'parent' => 'granite/rajasthan-granite',
        'name' => 'Crystal Yellow',
        'title' => 'Crystal Yellow Granite',
        'photo' => 'sandstone-yellow',
        'intro' => 'A golden-yellow Rajasthan granite with sparkling crystals, for warm floors and elevations.',
        'content' => [
            'specs' => ['material' => 'Granite', 'origin' => 'Rajasthan', 'colour' => 'Golden yellow with crystals', 'finishes' => $rajasthanFinishes, 'uses' => ['Flooring', 'Elevations', 'Steps and risers']],
            'body' => [
                'Crystal Yellow has a golden-yellow base with visible crystals that sparkle when polished. It brings sunny warmth to floors and building fronts.',
                'It pairs well with cream sandstone and red granite in elevation designs.',
            ],
            'pairs' => 'cream sandstone, red granite bands and white trims.',
        ],
        'faqs' => [
            ['Is Crystal Yellow suitable for elevations?', 'Yes. It is hard-wearing and adds warm colour to a building front.'],
            ['How is Crystal Yellow different from Merry Gold?', 'Both are golden granites; their tone and pattern differ by lot. Compare slabs at the showroom.'],
            ['Which finish suits Crystal Yellow floors?', 'Polished indoors, lapotra or flamed outdoors.'],
        ],
    ]),

    $variety([
        'path' => 'granite/merry-gold',
        'parent' => 'granite/rajasthan-granite',
        'name' => 'Merry Gold',
        'title' => 'Merry Gold Granite',
        'photo' => 'sandstone-yellow',
        'intro' => 'A golden granite with brown and black tones, for warm floors, steps and platforms.',
        'content' => [
            'specs' => ['material' => 'Granite', 'origin' => 'Rajasthan', 'colour' => 'Gold with brown and black tones', 'finishes' => $rajasthanFinishes, 'uses' => ['Flooring', 'Steps and risers', 'Kitchen platforms', 'Elevations']],
            'body' => [
                'Merry Gold combines golden yellow with brown and black tones for a rich, warm look. Its mixed colours hide everyday dust and marks well.',
                'It is a popular choice for steps and floors in homes that favour warm colour schemes.',
            ],
            'pairs' => 'wood, cream walls and brown or black borders.',
        ],
        'faqs' => [
            ['Is Merry Gold good for kitchens?', 'Yes, as a budget kitchen platform. Its mixed colours hide marks.'],
            ['Is Merry Gold the same as Crystal Yellow?', 'No. Both are golden granites but Merry Gold has more brown and black tones.'],
            ['Can Merry Gold be used outdoors?', 'Yes, with a flamed or lapotra finish.'],
        ],
    ]),

    // Engineered stone
    [
        'path' => 'granite/engineered-stone',
        'parent' => 'granite',
        'template' => 'collection',
        'name' => 'Engineered Stone',
        'title' => 'Engineered stone in Kutch',
        'seo_title' => 'Engineered Stone & Nano White in Kutch | Shyam Granite',
        'meta_description' => 'Nano White, artificial granite and composite marble in Adipur, Kutch: consistent colour for modern kitchens, vanities and table tops.',
        'summary' => 'Nano White, artificial granite and composite marble with consistent colour.',
        'intro' => 'Engineered stone is man-made, so its colour and pattern stay consistent from slab to slab. It is popular for a clean, modern look in kitchens, vanities and table tops.',
        'photo' => 'marble-counter',
        'content' => [
            'range_title' => 'Engineered stone types',
            'blocks' => [
                [
                    'type' => 'table',
                    'title' => 'Engineered or natural?',
                    'head' => ['', 'Engineered stone', 'Natural granite'],
                    'rows' => [
                        ['Colour and pattern', 'Consistent from slab to slab', 'Unique; varies by lot'],
                        ['Look', 'Clean, modern, bright whites possible', 'Natural depth, crystals and movement'],
                        ['Popular uses', 'Kitchen tops, vanities, table tops, feature walls', 'Kitchen platforms, floors, stairs, exteriors'],
                    ],
                ],
                [
                    'type' => 'chips',
                    'title' => 'Where it works',
                    'items' => ['Kitchen countertops', 'Vanity tops', 'Table tops', 'Feature walls', 'Flooring'],
                ],
            ],
        ],
        'faqs' => [
            ['What is engineered stone?', 'Man-made slabs with consistent colour and pattern. Nano White, artificial granite and composite marble are all engineered stone.'],
            ['Can engineered stone be cut and moulded?', 'Yes. Our workshop cuts, polishes and moulds engineered stone and Nano White.'],
            ['Is engineered stone good outdoors?', 'It is mainly used indoors. For exteriors, natural granite and sandstone are better choices.'],
        ],
    ],

    $variety([
        'path' => 'granite/nano-white',
        'parent' => 'granite/engineered-stone',
        'name' => 'Nano White',
        'title' => 'Nano White',
        'seo_title' => 'Nano White in Gandhidham & Adipur | Shyam Granite',
        'photo' => 'marble-counter',
        'featured' => true,
        'intro' => 'A bright, milky white crystallised glass stone with a high-gloss finish. Very popular right now as a budget alternative to white marble.',
        'content' => [
            'specs' => ['material' => 'Engineered stone (crystallised glass)', 'colour' => 'Bright milky white', 'aka' => ['Nano Crystal White'], 'finishes' => ['High gloss'], 'uses' => ['Kitchen countertops', 'Vanity tops', 'Table tops', 'Feature walls', 'Flooring']],
            'body' => [
                'Nano White, also called Nano Crystal White, is a crystallised glass stone with a bright, even white colour and a high-gloss surface. Because it doesn’t absorb liquids, it resists stains and acid far better than white marble.',
                'It gives the clean white look of marble at a lower cost, which is why it has become one of the most requested materials for kitchens and vanities in Kutch.',
            ],
            'pairs' => 'grey, navy or wood cabinets, black fittings and warm lighting.',
            'similar' => ['granite/composite-marble', 'granite/artificial-granite', 'granite/kashmir-white', 'granite/moon-white', 'marble/statuario', 'marble/makrana-white'],
        ],
        'faqs' => [
            ['Is Nano White better than granite for kitchens?', 'It depends on the look you want. Nano White gives a bright, solid white that resists stains; granite offers natural pattern and very high heat and scratch resistance.'],
            ['Does Nano White stain?', 'No. It doesn’t absorb liquids, so turmeric, oil and tea wipe off easily.'],
            ['Is Nano White the same as Nano Crystal White?', 'Yes. Both names are used for the same crystallised glass stone.'],
        ],
    ]),

    $variety([
        'path' => 'granite/artificial-granite',
        'parent' => 'granite/engineered-stone',
        'name' => 'Artificial Granite',
        'title' => 'Artificial Granite',
        'seo_title' => 'Artificial Granite in Gandhidham & Adipur | Shyam Granite',
        'photo' => 'granite-dark',
        'intro' => 'Engineered slabs with a uniform, granite-like pattern for a consistent look across large areas.',
        'content' => [
            'specs' => ['material' => 'Engineered stone', 'colour' => 'Granite-like patterns in several colours', 'finishes' => ['Polished'], 'uses' => ['Kitchen countertops', 'Table tops', 'Vanity tops', 'Flooring']],
            'body' => [
                'Artificial granite is an engineered slab made to look like granite, with an even, repeatable pattern. Every slab matches the next, which helps on long platforms and large floors.',
                'It suits customers who like the granite look but want a uniform finish without natural variation.',
            ],
            'pairs' => 'plain cabinets and simple tiled walls.',
        ],
        'faqs' => [
            ['What is artificial granite?', 'An engineered slab with a uniform granite-like pattern, rather than quarried natural granite.'],
            ['Does artificial granite look natural?', 'It looks like granite but with a more regular, repeating pattern.'],
            ['Can it be cut with sink cut-outs?', 'Yes. Our workshop cuts and finishes artificial granite to size.'],
        ],
    ]),

    $variety([
        'path' => 'granite/composite-marble',
        'parent' => 'granite/engineered-stone',
        'name' => 'Composite Marble',
        'title' => 'Composite Marble',
        'seo_title' => 'Composite Marble in Gandhidham & Adipur | Shyam Granite',
        'photo' => 'marble-carrara',
        'intro' => 'Engineered marble-look slabs for floors and walls, with consistent veining from slab to slab.',
        'content' => [
            'specs' => ['material' => 'Engineered stone', 'colour' => 'Marble-look whites and creams', 'finishes' => ['Polished'], 'uses' => ['Flooring', 'Wall cladding', 'Feature walls', 'Table tops']],
            'body' => [
                'Composite marble gives the look of veined marble in an engineered slab. The veining is consistent, so large floors and walls look even.',
                'It is a practical way to get a marble-style interior across big areas.',
            ],
            'pairs' => 'gold or brass fittings and neutral furniture.',
        ],
        'faqs' => [
            ['Is composite marble real marble?', 'No. It is an engineered slab designed to look like marble.'],
            ['Is composite marble good for flooring?', 'Yes. It is used for floors and walls where a consistent marble look is wanted.'],
            ['Composite marble or Italian marble?', 'Italian marble is natural and unique; composite marble is consistent and usually costs less.'],
        ],
    ]),

];

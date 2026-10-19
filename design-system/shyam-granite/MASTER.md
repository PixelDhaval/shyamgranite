# Shyam Granite Design System (Master)

Source of truth for every page on shyamgranite.com. Page-specific overrides go in `design-system/shyam-granite/pages/<page>.md` and win over this file.

**Design read:** a local-business showroom site for homeowners, builders and architects in Kutch. Calm, photo-led and simple, with the brand drawn straight from the logo.
**Dials:** variance 4 · motion 6 · density 3 (spacious; smooth GSAP reveals that guide the eye, never decorative loops).
**Theme:** light only. There is no dark mode.

Implementation: `resources/css/app.css` (tokens), `resources/views/components` (Blade components), `config/site.php`, `config/navigation.php`, `config/photos.php`.

---

## 1. Colour

Three primitive scales, all taken from the logo:

| Scale | Anchor | Use |
| --- | --- | --- |
| `forest-*` | `#4ca58d` (500, logo green) | Brand, buttons, links, tints |
| `gold-*` | `#d99c28` (400, peacock feather) | Accent only: eyebrows, preloader line. Never body text on light. |
| `stone-*` | neutral, faint green tint (hue 170) | Text, surfaces, lines |

Components use **semantic tokens only** (light theme):

| Utility | Value | Role |
| --- | --- | --- |
| `bg-canvas` | stone-50 | Page background |
| `bg-surface` | near-white | Header, footer, alternating sections, cards |
| `bg-surface-muted` | stone-100 | Image placeholders, hover fills |
| `bg-surface-tint` | forest-50 | Services band, CTA band, icon discs |
| `text-ink` | stone-950 | Headings, body emphasis |
| `text-ink-soft` | stone-600 | Body copy, captions (AA on both surfaces) |
| `border-line` / `border-line-strong` | stone-200 / 300 | Dividers, outlines |
| `bg-brand` + `text-on-brand` | forest-700 + white | Primary buttons (AA contrast) |
| `text-brand-ink` | forest-700 | Links, active nav, icon colour |
| `text-accent-ink` / `bg-accent` | gold-700 / gold-400 | Eyebrows, preloader |

Rules: one accent (gold) used sparingly. Never use the logo green `#4ca58d` as a button fill under white text (contrast fails). No raw hex in templates. Do not add `dark:` variants.

## 2. Typography

| Role | Font | Notes |
| --- | --- | --- |
| Display (`font-display`) | Cormorant Garamond 500/600, italic 500 | H1-H3, card titles, mega-menu column titles. Echoes the logo's fine Didone-style wordmark. Only at 20px and up. |
| Body (`font-sans`) | Manrope 400/500/600/700 | Everything else |

Fonts are self-hosted at build time by `laravel-vite-plugin` (`vite.config.js`) and output with `@fonts`.

| Element | Classes |
| --- | --- |
| H1 (home) | `text-[2.75rem] sm:text-6xl lg:text-[4.25rem] leading-[1.05] tracking-tight` |
| H1 (inner) | `text-4xl md:text-5xl lg:text-6xl leading-[1.05]` (`<x-ui.page-header>`) |
| H2 | `text-3xl md:text-4xl lg:text-[2.75rem] leading-[1.1]` (`<x-ui.section-heading>`) |
| H3 / card title | `text-2xl leading-tight` |
| Body | `text-base leading-relaxed text-ink-soft`, max 65ch (`prose-stone`) |
| Eyebrow | `text-xs font-semibold uppercase tracking-[0.18em] text-accent-ink` |

Emphasis inside a headline uses the **italic of the same family** (`<em class="text-brand-ink">`), never a different font. Italic headlines keep `leading-[1.05]` minimum plus `pb-1`.

## 3. Space, shape, elevation

- **Container:** `shell` utility (max 1280px, 16 / 24 / 32px gutters).
- **Section rhythm:** `section-y` utility (64px mobile, 96px desktop). Alternate `bg-canvas` and `bg-surface` sections, separated by `border-line`.
- **Radius:** one scale, `rounded-sm` (4px) on buttons, images, cards and inputs. Circular (`rounded-full`) only for icon discs and the back-to-top button.
- **Shadows:** tinted `shadow-shadow` only, on floating layers (mega menu, sticky header once scrolled, back-to-top). Cards use no shadow.
- **Z-index:** 30 back-to-top · 40 sticky header and mobile action bar · 60 preloader · 70 skip link. The mobile menu uses the `<dialog>` top layer.

## 4. Motion (GSAP)

`resources/js/motion.js` (GSAP 3 with ScrollTrigger, SplitText and ScrollToPlugin). Templates opt in with data attributes; no page-specific JavaScript.

| Attribute | Effect | Used on |
| --- | --- | --- |
| `data-hero` | Scope whose intro plays as the preloader curtain lifts | Home hero, `<x-ui.page-header>` |
| `data-hero-title` | Masked line-by-line reveal, markup restored afterwards | Page H1 |
| `data-hero-item` | Fade up in sequence | Eyebrow, intro, CTAs, breadcrumb |
| `data-hero-media` | Wipe up from the bottom while the photo settles from a 1.3x zoom | Hero photo |
| `data-hero-accent` | Floats in last | Inset swatch |
| `data-split` | Masked line reveal on scroll (re-splits on resize) | Every H2 (`<x-ui.section-heading>`, CTA band) |
| `data-reveal` | Fade up 28px on scroll, batched with a 0.09s stagger | Copy, list items, cards, FAQ rows |
| `data-reveal-image` | Wipe-in plus zoom settle on scroll | Category card photos, feature photos |
| `data-parallax` | Photo drifts ±5% with scroll (scaled 1.12) | Large single photos only |

Other motion:
- **Preloader:** peacock mark lifts away, panel slides up (`expo.inOut`), once per session.
- **Header:** slides away while scrolling down past 480px, returns on scroll up, focus, or an open panel.
- **Mega menu / dropdown:** panel glides in 10px, columns stagger 0.05s; switching panels is instant.
- **Mobile menu:** rows slide in 24px with a 0.045s stagger.
- **In-page links** (`#visit`, `#top`, skip link): ScrollToPlugin glide, offset for the header, then focus moves to the target. CSS `scroll-behavior: smooth` is deliberately off because it fights ScrollTrigger.
- **Hover:** colour/border 200ms; photo zoom `scale-[1.03]` over 700ms `ease-out-soft`. Press: `active:translate-y-px`.
- **Eases:** `expo.out` for entrances, `expo.inOut` for wipes and the curtain, `power3.out` for UI.

Safety rules:
- Everything runs inside `gsap.matchMedia()` for `prefers-reduced-motion: no-preference`. With reduced motion nothing is hidden or animated.
- `.sg-motion` (set in `<head>`) pre-hides animated elements to avoid a flash, and is removed if GSAP hasn't started within 3s, so content can never stay hidden. Content stays in the server-rendered HTML for SEO.
- Animate transforms, opacity and clip-path only. Don't put `data-reveal` on an element that is already inside another `data-reveal` card.
- Don't add new attributes or page scripts without updating this table.

## 5. Icons and imagery

- **Icons:** Phosphor "light" SVGs in `resources/svg/icons`, rendered with `<x-ui.icon name="..." />` (decorative unless `label` is passed). To add one, download it from `@phosphor-icons/core/assets/light/`. Do not hand-draw paths.
- **Photos:** always `<x-ui.photo name="key" ratio="4/3" sizes="..." />`. Keys live in `config/photos.php`. The current images are **Unsplash placeholders**; the photo day (roadmap task 1.7) replaces them with real slab, showroom and workshop photos without touching templates. Variety pages must use real slab photos before they go live (strategy rule).
- Mark only the LCP image as `priority`.

## 6. Components

| Component | Purpose |
| --- | --- |
| `<x-layouts.app>` | Base HTML: meta, canonical, OG, favicon, fonts, `schema` stack, preloader, header, footer, action bar, back-to-top |
| `<x-site.header>` | Utility bar (today's hours, phones, email), sticky main bar, logo, nav, CTA, menu button |
| `<x-site.navigation>` | Desktop nav (xl+), disclosure buttons, driven by `config/navigation.php` |
| `<x-site.mega-menu>` | Full-width panel: link columns + photo feature |
| `<x-site.mobile-menu>` | `<dialog>` menu below xl, `<details>` accordions, contact buttons |
| `<x-site.footer>` | Brand statement, link columns, area pages, both locations |
| `<x-site.location-card>` | One location's NAP, hours and directions (from config) |
| `<x-site.action-bar>` | Phone-only sticky Call / WhatsApp / Directions |
| `<x-site.back-to-top>` | Appears after one screen |
| `<x-site.preloader>` | Peacock mark + gold line, once per session, 3s CSS failsafe |
| `<x-site.breadcrumb>` | Trail + `BreadcrumbList` JSON-LD (Home added automatically) |
| `<x-site.logo>` | `full`, `wordmark` or `mark` variant |
| `<x-ui.button>` | `primary`, `secondary`, `link`; `md` (48px) or `sm` (40px) |
| `<x-ui.whatsapp-button>` | The site's single rate CTA; `product` prefills the message |
| `<x-ui.section-heading>` | Optional eyebrow, H2, intro, stacked |
| `<x-ui.page-header>` | Inner-page hero: breadcrumb, H1, intro, rate CTA, optional photo |
| `<x-ui.category-card>` | Photo-led link card |
| `<x-ui.faq>` | `<details>` accordion + `FAQPage` JSON-LD |
| `<x-ui.cta-band>` | Closing rate / call band for every product page |
| `<x-ui.photo>`, `<x-ui.icon>` | Images and icons (see section 5) |
| `<x-seo.local-business>` | `HomeAndConstructionBusiness` JSON-LD (+ `WebSite` with `website`) |

## 6b. Page system (database pages)

Every page except Home is a `Page` record (`app/Models/Page.php`) served by the catch-all route through `PageController`, using `resources/views/pages/templates/{template}.blade.php`. Content lives in `database/seeders/content/*.php`; re-run `php artisan db:seed --class=PageSeeder` after editing (pages are matched by path).

| Template | Used for | Layout |
| --- | --- | --- |
| `collection` | Hubs and sub-categories (Granite, South Indian Granite, Sandstone, Shilp Kala, Services) | Page header, children (swatch rows / swatches / cards), blocks, FAQs, CTA |
| `variety` | Colour pages (Black Galaxy, Statuario…) | Slab photo + key facts, description, processing links, similar colours, FAQs, CTA |
| `page` | Everything else: product lines, services, uses, areas, About, Contact, FAQ, Gallery, Guides | Page header, blocks, FAQs, CTA |

Content blocks (`content.blocks`, rendered by `<x-blocks.render>`; sections alternate canvas/surface):

| Block | Fields |
| --- | --- |
| `prose` | `title`, `body[]`, optional `photo` |
| `features` | `title`, `intro?`, `items[{title, text, icon?}]` |
| `table` | `title`, `intro?`, `head[]`, `rows[][]` |
| `chips` | `title`, `intro?`, `items[]` |
| `links` | `title`, `intro?`, `paths[]` (photo cards of other pages) |
| `callout` | `title?`, `text`, `icon?` |
| `photos` | `title?`, `items[]` (photo keys) |
| `locations` | `title`, `intro?` (both locations) |
| `contact` | `title`, `intro?` (contact methods + maps) |
| `faq-groups` | `groups[{title, items[{question, answer}]}]` |

Page fields: `parent` (breadcrumb + hub linking, independent of URL), `seo_title` (≤ 60, generated if omitted), `meta_description` (≤ 155, generated if omitted), `summary` (card text), `photo`, `faqs` (`[question, answer]` pairs), `published` (false hides a page and removes it from the sitemap), `noindex`. Variety pages take `content.specs`, `content.body`, `content.pairs`, `content.similar`. `content.schema` picks JSON-LD (`service`, `area`, `about`, `contact`); `content.product` names the item in the WhatsApp message (`null` for none).

Every link in content must resolve to a page; `tests/Feature/SiteContentTest.php` enforces this, the SEO length limits, unique titles, and no prices, GST numbers or em dashes.

## 7. Content and CTA rules

- **No prices and no GST number** anywhere. Price intent goes to `<x-ui.whatsapp-button>` with the label **"WhatsApp for today's rate"**. Use this one label everywhere.
- Other CTA labels: "Call +91 …" (call), "Get directions" (map), "Showroom hours" (anchor to the visit section).
- State that installation is not included wherever processing is described.
- NAP, hours and phones come only from `config/site.php`.
- No em dashes in visible copy. Use the middle dot at most once per line.
- Eyebrows: at most one per three sections.
- No fabricated reviews, figures or customer names.

## 8. Accessibility checklist

- Skip link, visible `:focus-visible` outline in brand colour, keyboard-operable nav (Escape closes; focus returns to the trigger).
- Tap targets 44px or more (buttons 48px, menu rows 56px).
- Text contrast AA; icon-only controls have `sr-only` labels.
- Test at 375, 768, 1024, 1280 and 1440px, and once with reduced motion turned on.

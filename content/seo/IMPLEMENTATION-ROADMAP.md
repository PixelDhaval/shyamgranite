# Shyam Granite — Implementation Roadmap

Back to [SEO Strategy](SEO-STRATEGY.md)

Weeks count from the start of the website build. Owner: **Dev** = website developer, **Biz** = Shyam Granite owners, **Content** = writer or marketer.

---

## Phase 1: Foundation (weeks 1–4)

**Goal:** a fast, technically sound site with the core pages live, and the Google profile fixed.

| # | Task | Owner | Done when |
| --- | --- | --- | --- |
| 1.1 | Point **shyamgranite.com** to hosting, set up HTTPS, choose `www` or non-`www` | Dev | One canonical domain resolves over HTTPS |
| 1.2 | Laravel models for categories, products, services, areas and posts, each with editable SEO title, meta description and slug | Dev | Admin can edit the SEO fields of every page |
| 1.3 | Blade layouts: breadcrumbs, sticky Call/WhatsApp bar, footer with NAP and hours | Dev | Works on a 360 px wide phone |
| 1.4 | Auto `sitemap.xml`, `robots.txt`, canonical tags, custom 404 | Dev | Sitemap validates; no duplicate URLs |
| 1.5 | Image pipeline: WebP, `srcset`, lazy-loading, descriptive alt text | Dev | LCP image < 200 KB |
| 1.6 | JSON-LD: LocalBusiness (below), BreadcrumbList, WebSite | Dev | Passes Google's Rich Results Test |
| 1.7 | **Photo day**: showroom, workshop machines, every stocked slab, finished jobs, owners | Biz | 150+ original photos |
| 1.8 | Write and publish the launch content (see [Content Calendar](CONTENT-CALENDAR.md#launch-content-before-go-live)) | Content | All launch pages live |
| 1.9 | Claim/verify the existing **workshop** Google profile; create and verify a new **showroom** profile; complete every field on both | Biz | Both verified; categories, hours, products and services set |
| 1.10 | Google Search Console, GA4, Bing Webmaster Tools; click events for call, WhatsApp, directions | Dev | Events visible in GA4 |
| 1.11 | Fix NAP on Indian Yellow Pages, ExportersIndia, IndiaMART, JustDial, TradeIndia | Biz | All match the standard NAP |

**Phase 1 KPIs:** site indexed; Core Web Vitals "Good"; GBP 100% complete; 5 listings corrected.

---

## Phase 2: Expansion (weeks 5–12)

**Goal:** full catalogue live, local presence built, reviews flowing.

| # | Task | Owner | Done when |
| --- | --- | --- | --- |
| 2.1 | Publish all remaining **variety pages** (~10 a week), each with real photos | Content | Every stocked variety has a page |
| 2.2 | Publish 6 **area pages**: Gandhidham, Adipur, Anjar, Bhuj, Mundra, Mandvi | Content | ≥ 500 words, ≥ 40% unique each |
| 2.3 | Start the blog: 2 guides a month | Content | 4–6 guides live |
| 2.4 | Internal linking pass: similar colours, related services, guides to products | Dev / Content | Every page has ≥ 3 internal links in and out |
| 2.5 | Product, Service, FAQPage and Article schema | Dev | Valid in the Rich Results Test |
| 2.6 | **Review system**: WhatsApp message with the review link after each sale; reply to all reviews | Biz (owners) | 10+ new reviews a month |
| 2.7 | GBP (both profiles): 1–2 posts and 5–10 photos a week; products added with photos | Biz (owners) | Weekly activity for 8 straight weeks |
| 2.8 | New citations: Bing Places, Apple Business Connect, Sulekha, Facebook, Instagram | Biz | 15+ consistent listings |

**Phase 2 KPIs:** 90+ pages indexed; 15 keywords in the top 10; +25 reviews; first website enquiries tracked.

---

## Phase 3: Scale (weeks 13–24)

**Goal:** authority and wider reach across Kutch.

| # | Task | Owner | Done when |
| --- | --- | --- | --- |
| 3.1 | **Local links**: builders, architects, interior designers and fitters you supply link to you (supplier page, project credit) | Biz | 10+ local links |
| 3.2 | Brand partner listings: ask UltraTech and Astral dealer locators to list Shyam Granite | Biz | Listed on at least one brand's dealer locator |
| 3.3 | Local press and associations: Kutch builders' or stone associations, Gandhidham Chamber of Commerce | Biz | 2+ mentions or listings |
| 3.4 | **Gujarati pages** for the top 6 pages under `/gu/` with `hreflang` | Content / Dev | Live and indexed |
| 3.5 | GEO: direct-answer intros, comparison tables, `/llms.txt` | Content / Dev | All guides follow the template |
| 3.6 | Performance pass using field data in Search Console | Dev | 100% of URLs "Good" on mobile |
| 3.7 | Add area pages 7–10 only if content can be unique | Content | Max 10 area pages total |
| 3.8 | YouTube Shorts / Instagram Reels from the workshop (cutting, polishing) embedded on service pages | Biz | 1 video a week |

**Phase 3 KPIs:** 1,000 organic visits a month; 50 keywords in the top 10; 60 enquiries a month; 30 referring domains.

---

## Phase 4: Authority (months 7–12)

**Goal:** be the clear #1 stone brand for Kutch in Google and in AI answers.

| # | Task | Owner |
| --- | --- | --- |
| 4.1 | **"Kutch Stone Buying Guide"**: one in-depth reference (materials, finishes, care, uses) other sites can cite | Content / Biz |
| 4.2 | Case studies: finished kitchens, temples, elevations, with customer permission and no client names | Content |
| 4.3 | Get onto "best granite dealers in Kutch/Gandhidham" style lists (the top AI-visibility factor) | Biz |
| 4.4 | Review all schema; add `hasOfferCatalog` to LocalBusiness | Dev |
| 4.5 | Content refresh: guides yearly, variety pages twice a year | Content |
| 4.6 | Monthly check of rankings, GBP insights and enquiries; adjust | Biz / Content |

**Phase 4 KPIs:** 2,500 organic visits a month; 120 keywords in the top 10; 150 enquiries a month; 100+ reviews at 4.5★ or higher.

---

## Monthly Reporting

| Metric | Source |
| --- | --- |
| Calls, WhatsApp clicks, direction requests | GA4 events and GBP insights |
| Local pack positions (10 core terms) | Manual check or a rank tracker, Adipur and Gandhidham |
| Keywords in top 10, clicks, impressions | Google Search Console |
| New reviews and average rating | GBP |
| Indexed pages, Core Web Vitals | Search Console |

**Core local-pack terms to track:** granite dealer, marble dealer, Kota stone, granite shop, nano white, Italian marble, granite cutting, sandstone, marble mandir, tile adhesive. Track each in Adipur and in Gandhidham.

---

## Dependencies and Risks

| Dependency | Blocks |
| --- | --- |
| Final stock list | Variety pages (1.8, 2.1) |
| Photo day | Launch content, GBP photos |

---

## LocalBusiness JSON-LD

Starting markup for the home and contact pages. The main entity is the **showroom**. The known coordinates belong to the **workshop**, so they sit on the workshop department. The showroom is identified by its address only, with no coordinates.

```json
{
  "@context": "https://schema.org",
  "@type": "HomeAndConstructionBusiness",
  "@id": "https://shyamgranite.com/#business",
  "name": "Shyam Granite",
  "slogan": "A House of Color Granite",
  "foundingDate": "2005",
  "url": "https://shyamgranite.com/",
  "logo": "https://shyamgranite.com/images/logo.png",
  "image": "https://shyamgranite.com/images/showroom.jpg",
  "email": "shyamgranite@ymail.com",
  "telephone": "+91-98242-83804",
  "founder": [
    { "@type": "Person", "name": "Pravin Sorathiya" },
    { "@type": "Person", "name": "Chirag Sorathiya" }
  ],
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Plot No. 494, Ward 5/B, Rambaug Road",
    "addressLocality": "Adipur",
    "addressRegion": "Gujarat",
    "postalCode": "370205",
    "addressCountry": "IN"
  },
  "openingHoursSpecification": [
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
      "opens": "09:00",
      "closes": "19:00"
    },
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": "Sunday",
      "opens": "09:00",
      "closes": "13:00"
    }
  ],
  "areaServed": [
    { "@type": "City", "name": "Adipur" },
    { "@type": "City", "name": "Gandhidham" },
    { "@type": "City", "name": "Anjar" },
    { "@type": "City", "name": "Bhuj" },
    { "@type": "City", "name": "Mundra" },
    { "@type": "City", "name": "Mandvi" },
    { "@type": "City", "name": "Bhachau" },
    { "@type": "City", "name": "Rapar" },
    { "@type": "City", "name": "Nakhatrana" },
    { "@type": "City", "name": "Madhapar" }
  ],
  "contactPoint": [
    {
      "@type": "ContactPoint",
      "telephone": "+91-98242-83804",
      "contactType": "sales",
      "name": "Pravin Sorathiya"
    },
    {
      "@type": "ContactPoint",
      "telephone": "+91-78787-78287",
      "contactType": "sales",
      "name": "Chirag Sorathiya"
    }
  ],
  "department": {
    "@type": "HomeAndConstructionBusiness",
    "name": "Shyam Granite Workshop",
    "description": "Granite cutting, polishing and moulding",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "Plot No. 45, Ward 1/B, GIDC",
      "addressLocality": "Adipur",
      "addressRegion": "Gujarat",
      "postalCode": "370205",
      "addressCountry": "IN"
    },
    "telephone": "+91-78787-78287",
    "geo": {
      "@type": "GeoCoordinates",
      "latitude": 23.0716481,
      "longitude": 70.0717604
    },
    "hasMap": "https://maps.app.goo.gl/P6c4cnUr499GE9bd7",
    "openingHoursSpecification": [
      {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
        "opens": "09:00",
        "closes": "18:00"
      },
      {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": "Saturday",
        "opens": "09:00",
        "closes": "13:00"
      }
    ]
  }
}
```

{{--
    LocalBusiness (HomeAndConstructionBusiness) JSON-LD, built from
    config/site.php. The showroom is the main entity, identified by address
    only; the known coordinates belong to the workshop department.
    Used on the home and contact pages. Pass :website="true" on home to add
    the WebSite entity.
--}}
@props(['website' => false])

@php
    $dayNames = [1 => 'Monday', 2 => 'Tuesday', 3 => 'Wednesday', 4 => 'Thursday', 5 => 'Friday', 6 => 'Saturday', 7 => 'Sunday'];
    $domain = rtrim(config('site.domain'), '/');

    $address = fn (array $location): array => [
        '@type' => 'PostalAddress',
        'streetAddress' => $location['street'],
        'addressLocality' => $location['locality'],
        'addressRegion' => $location['region'],
        'postalCode' => $location['postal_code'],
        'addressCountry' => 'IN',
    ];

    $openingHours = fn (array $location): array => array_map(fn (array $slot): array => [
        '@type' => 'OpeningHoursSpecification',
        'dayOfWeek' => array_map(fn (int $day): string => $dayNames[$day], $slot['days']),
        'opens' => $slot['opens'],
        'closes' => $slot['closes'],
    ], $location['hours']);

    $showroom = config('site.locations.showroom');
    $workshop = config('site.locations.workshop');

    $business = [
        '@context' => 'https://schema.org',
        '@type' => 'HomeAndConstructionBusiness',
        '@id' => $domain.'/#business',
        'name' => config('site.name'),
        'slogan' => config('site.tagline'),
        'foundingDate' => (string) config('site.founded'),
        'url' => $domain.'/',
        'logo' => asset('img/logo/main-logo.svg'),
        'email' => config('site.email'),
        'telephone' => $showroom['phone'],
        'founder' => array_map(fn (array $owner): array => ['@type' => 'Person', 'name' => $owner['name']], config('site.owners')),
        'address' => $address($showroom),
        'openingHoursSpecification' => $openingHours($showroom),
        'areaServed' => array_map(fn (string $city): array => ['@type' => 'City', 'name' => $city], config('site.areas_served')),
        'contactPoint' => array_map(fn (array $owner): array => [
            '@type' => 'ContactPoint',
            'telephone' => $owner['phone'],
            'contactType' => 'sales',
            'name' => $owner['name'],
        ], config('site.owners')),
        'department' => [
            '@type' => 'HomeAndConstructionBusiness',
            'name' => config('site.name').' Workshop',
            'description' => 'Granite cutting, polishing and moulding',
            'address' => $address($workshop),
            'telephone' => $workshop['phone'],
            'geo' => ['@type' => 'GeoCoordinates', ...$workshop['geo']],
            'hasMap' => $workshop['map_url'],
            'openingHoursSpecification' => $openingHours($workshop),
        ],
    ];

    $site = [
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        '@id' => $domain.'/#website',
        'name' => config('site.name'),
        'url' => $domain.'/',
        'publisher' => ['@id' => $domain.'/#business'],
    ];
@endphp

@push('schema')
    <script type="application/ld+json">@json($business, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)</script>
    @if ($website)
        <script type="application/ld+json">@json($site, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)</script>
    @endif
@endpush

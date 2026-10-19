<?php

use App\Models\Page;
use Database\Seeders\PageSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed(PageSeeder::class);
});

it('renders every seeded page without prices or a GST number', function () {
    Page::query()->published()->pluck('path')->each(function (string $path): void {
        $this->get('/'.$path)
            ->assertOk()
            ->assertDontSee('₹')
            ->assertDontSee('GSTIN')
            ->assertDontSee('—');
    });
});

it('keeps SEO titles and descriptions within the strategy limits', function () {
    $tooLong = Page::query()->get()->filter(
        fn (Page $page): bool => mb_strlen($page->seo_title) > 60 || mb_strlen($page->meta_description) > 155,
    );

    expect($tooLong->pluck('path')->all())->toBe([]);
});

it('gives every page a unique SEO title', function () {
    $duplicates = Page::query()->pluck('seo_title')->duplicates();

    expect($duplicates->all())->toBe([]);
});

it('links only to pages that exist', function () {
    $paths = Page::query()->pluck('path');

    $linked = Page::query()->get()->flatMap(fn (Page $page) => [
        ...collect($page->content['blocks'] ?? [])->flatMap(fn (array $block) => $block['paths'] ?? []),
        ...($page->content['similar'] ?? []),
    ]);

    expect($linked->diff($paths)->values()->all())->toBe([]);
});

it('resolves every navigation and footer link', function () {
    $navigation = config('navigation');

    $urls = collect($navigation['main'])->flatMap(fn (array $item) => [
        $item['url'],
        ...collect($item['mega']['columns'] ?? [])->flatMap(fn (array $column) => [$column['url'], ...array_column($column['links'], 'url')]),
        ...(isset($item['mega']) ? [$item['mega']['feature']['url']] : []),
        ...array_column($item['dropdown'] ?? [], 'url'),
    ])
        ->merge(collect($navigation['footer'])->flatten(1)->pluck('url'))
        ->merge(array_column(config('site.area_pages'), 'url'))
        ->unique();

    $paths = Page::query()->published()->pluck('path')->map(fn (string $path): string => '/'.$path);

    expect($urls->diff($paths)->values()->all())->toBe([]);
});

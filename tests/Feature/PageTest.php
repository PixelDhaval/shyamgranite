<?php

use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('renders a published page by its path', function () {
    $page = Page::factory()->create([
        'path' => 'kota-stone',
        'name' => 'Kota Stone',
        'title' => 'Kota stone in Kutch',
        'seo_title' => 'Kota Stone Supplier in Kutch | Shyam Granite',
        'meta_description' => 'Green Kota stone in Adipur.',
    ]);

    $this->get('/kota-stone')
        ->assertOk()
        ->assertSee('<title>Kota Stone Supplier in Kutch | Shyam Granite</title>', false)
        ->assertSee('<meta name="description" content="Green Kota stone in Adipur.">', false)
        ->assertSee('Kota stone in Kutch');

    expect($page->url())->toBe(url('kota-stone'));
});

it('returns 404 for unpublished and unknown pages', function () {
    Page::factory()->unpublished()->create(['path' => 'draft-page']);

    $this->get('/draft-page')->assertNotFound();
    $this->get('/granite/not-a-stone')->assertNotFound();
});

it('marks noindex pages for robots', function () {
    Page::factory()->create(['path' => 'gallery', 'noindex' => true]);

    $this->get('/gallery')->assertOk()->assertSee('<meta name="robots" content="noindex, follow">', false);
});

it('builds the breadcrumb from the parent chain, not the URL', function () {
    $granite = Page::factory()->create(['path' => 'granite', 'name' => 'Granite', 'template' => 'collection']);
    $southIndian = Page::factory()->create(['parent_id' => $granite->id, 'path' => 'granite/south-indian-granite', 'name' => 'South Indian Granite', 'template' => 'collection']);
    $variety = Page::factory()->variety()->create([
        'parent_id' => $southIndian->id,
        'path' => 'granite/black-galaxy',
        'name' => 'Black Galaxy',
        'title' => 'Black Galaxy Granite',
    ]);

    expect($variety->breadcrumb())->toBe([
        ['label' => 'Granite', 'url' => '/granite'],
        ['label' => 'South Indian Granite', 'url' => '/granite/south-indian-granite'],
        ['label' => 'Black Galaxy'],
    ]);

    $this->get('/granite/black-galaxy')
        ->assertOk()
        ->assertSee('"@type":"BreadcrumbList"', false)
        ->assertSee('"@type":"Product"', false)
        ->assertSee('Black Galaxy Granite');
});

it('lists published children on a collection page', function () {
    $sandstone = Page::factory()->create(['path' => 'sandstone', 'name' => 'Sandstone', 'template' => 'collection']);
    Page::factory()->variety()->create(['parent_id' => $sandstone->id, 'path' => 'sandstone/jodhpur-pink', 'name' => 'Jodhpur Pink']);
    Page::factory()->variety()->unpublished()->create(['parent_id' => $sandstone->id, 'path' => 'sandstone/draft-stone', 'name' => 'Unreleased Draft Stone']);

    $this->get('/sandstone')
        ->assertOk()
        ->assertSee('Jodhpur Pink')
        ->assertDontSee('Unreleased Draft Stone')
        ->assertSee('"@type":"CollectionPage"', false);
});

it('prefills the WhatsApp message with the product name', function () {
    Page::factory()->variety()->create(['path' => 'granite/tan-brown', 'name' => 'Tan Brown', 'title' => 'Tan Brown Granite']);

    $this->get('/granite/tan-brown')
        ->assertOk()
        ->assertSee(rawurlencode("Hello Shyam Granite, I'd like today's rate for Tan Brown Granite."), false);
});

it('renders the custom 404 page', function () {
    $this->get('/no-such-page')
        ->assertNotFound()
        ->assertSee('This page isn’t here')
        ->assertSee('<meta name="robots" content="noindex, follow">', false);
});

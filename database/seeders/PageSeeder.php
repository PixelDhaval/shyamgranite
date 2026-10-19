<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

/**
 * Seeds every public page from the content files in database/seeders/content.
 *
 * Files load in FILES order and a page's parent must appear before it.
 * Pages are matched by path. By default only missing pages are created, so
 * edits made in the admin panel are never overwritten; run
 * PageContentResetSeeder to deliberately re-apply the files to every page.
 * Missing SEO titles and meta descriptions are generated within the
 * strategy limits (60 and 155 characters).
 */
class PageSeeder extends Seeder
{
    /**
     * Overwrite existing pages with the content files.
     */
    protected bool $overwrite = false;

    /**
     * @var list<string>
     */
    private const FILES = [
        'core',
        'services',
        'granite',
        'marble',
        'natural-stone',
        'shilp-kala',
        'products',
        'uses',
        'areas',
    ];

    public function run(): void
    {
        foreach (self::FILES as $file) {
            $entries = require __DIR__."/content/{$file}.php";

            foreach ($entries as $sort => $entry) {
                $this->seedPage($entry, $sort);
            }
        }
    }

    /**
     * @param  array<string, mixed>  $entry
     */
    private function seedPage(array $entry, int $sort): void
    {
        $parentId = isset($entry['parent'])
            ? Page::query()->where('path', $entry['parent'])->value('id')
            : null;

        $existing = Page::query()->where('path', $entry['path'])->exists();

        if ($existing && ! $this->overwrite) {
            return;
        }

        Page::query()->updateOrCreate(
            ['path' => $entry['path']],
            [
                'parent_id' => $parentId,
                'template' => $entry['template'] ?? 'page',
                'name' => $entry['name'],
                'title' => $entry['title'] ?? $entry['name'],
                'seo_title' => $entry['seo_title'] ?? $this->seoTitle($entry['title'] ?? $entry['name']),
                'meta_description' => $entry['meta_description'] ?? $this->metaDescription($entry),
                'summary' => $entry['summary'] ?? null,
                'intro' => $entry['intro'] ?? null,
                'photo' => $entry['photo'] ?? null,
                'content' => $entry['content'] ?? [],
                'faqs' => $this->faqs($entry['faqs'] ?? []),
                'sort' => $sort,
                'is_featured' => $entry['featured'] ?? false,
                'is_published' => $entry['published'] ?? true,
                'noindex' => $entry['noindex'] ?? false,
            ],
        );
    }

    private function seoTitle(string $title): string
    {
        $brand = ' | '.config('site.name');

        foreach ([' in Gandhidham & Adipur', ' in Kutch', ''] as $location) {
            $candidate = $title.$location.$brand;

            if (mb_strlen($candidate) <= 60) {
                return $candidate;
            }
        }

        return Str::limit($title, 60 - mb_strlen($brand), '').$brand;
    }

    /**
     * @param  array<string, mixed>  $entry
     */
    private function metaDescription(array $entry): string
    {
        $specs = $entry['content']['specs'] ?? null;

        if ($specs) {
            $title = $entry['title'] ?? $entry['name'];
            $origin = isset($specs['origin']) ? " from {$specs['origin']}" : '';
            $finishes = isset($specs['finishes']) ? ' '.Str::ucfirst(Str::lower(implode(', ', array_slice($specs['finishes'], 0, 3)))).' finishes.' : '';

            foreach ([
                "{$title}{$origin} at Shyam Granite, Adipur, Kutch.{$finishes} Cut to size in-house. WhatsApp for today’s rate.",
                "{$title}{$origin} at Shyam Granite, Adipur, Kutch. Cut to size in-house. WhatsApp for today’s rate.",
                "{$title} at Shyam Granite, Adipur, Kutch. Cut to size in-house. WhatsApp for today’s rate.",
            ] as $candidate) {
                if (mb_strlen($candidate) <= 155) {
                    return $candidate;
                }
            }
        }

        $text = $entry['summary'] ?? $entry['intro'] ?? $entry['name'];

        return Str::limit($text, 152);
    }

    /**
     * Accepts [question, answer] pairs or {question, answer} arrays.
     *
     * @param  list<array<int|string, string>>  $faqs
     * @return list<array{question: string, answer: string}>
     */
    private function faqs(array $faqs): array
    {
        return array_map(fn (array $faq): array => [
            'question' => $faq['question'] ?? $faq[0],
            'answer' => $faq['answer'] ?? $faq[1],
        ], $faqs);
    }
}

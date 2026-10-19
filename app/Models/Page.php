<?php

namespace App\Models;

use Database\Factories\PageFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * A public page resolved by its URL path (e.g. "granite/black-galaxy").
 *
 * The template decides the Blade view (resources/views/pages/templates);
 * template-specific data lives in the "content" JSON. parent_id drives the
 * breadcrumb and hub-and-spoke linking independently of the URL, so a
 * variety can live at /granite/black-galaxy while its parent is
 * South Indian Granite.
 *
 * @property array<string, mixed>|null $content
 * @property list<array{question: string, answer: string}>|null $faqs
 */
class Page extends Model
{
    /** @use HasFactory<PageFactory> */
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'path',
        'template',
        'name',
        'title',
        'seo_title',
        'meta_description',
        'summary',
        'intro',
        'photo',
        'content',
        'faqs',
        'sort',
        'is_featured',
        'is_published',
        'noindex',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'content' => 'array',
            'faqs' => 'array',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'noindex' => 'boolean',
        ];
    }

    /**
     * @return BelongsTo<Page, $this>
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }

    /**
     * Published children in display order.
     *
     * @return HasMany<Page, $this>
     */
    public function children(): HasMany
    {
        return $this->hasMany(Page::class, 'parent_id')
            ->where('is_published', true)
            ->orderBy('sort')
            ->orderBy('name');
    }

    #[Scope]
    protected function published(Builder $query): void
    {
        $query->where('is_published', true);
    }

    public function url(): string
    {
        return url($this->path);
    }

    /**
     * Ancestors from the top level down, excluding this page.
     *
     * @return Collection<int, Page>
     */
    public function ancestors(): Collection
    {
        $ancestors = collect();
        $parent = $this->parent;

        while ($parent) {
            $ancestors->prepend($parent);
            $parent = $parent->parent;
        }

        return $ancestors;
    }

    /**
     * Breadcrumb items for <x-site.breadcrumb> (Home is added by the component).
     *
     * @return list<array{label: string, url?: string}>
     */
    public function breadcrumb(): array
    {
        return $this->ancestors()
            ->map(fn (Page $page): array => ['label' => $page->name, 'url' => '/'.$page->path])
            ->push(['label' => $this->name])
            ->values()
            ->all();
    }

    /**
     * Other published pages under the same parent, for "similar" links.
     *
     * @return Collection<int, Page>
     */
    public function siblings(int $limit = 4): Collection
    {
        if (! $this->parent_id) {
            return collect();
        }

        return static::query()
            ->published()
            ->where('parent_id', $this->parent_id)
            ->whereKeyNot($this->getKey())
            ->orderBy('sort')
            ->limit($limit)
            ->get();
    }

    /**
     * Published pages for a list of paths, in the order given.
     *
     * @param  list<string>  $paths
     * @return Collection<int, Page>
     */
    public static function forPaths(array $paths): Collection
    {
        if ($paths === []) {
            return collect();
        }

        $pages = static::query()->published()->whereIn('path', $paths)->get()->keyBy('path');

        return collect($paths)->map(fn (string $path) => $pages->get($path))->filter()->values();
    }

    public function documentTitle(): string
    {
        return $this->seo_title ?: $this->title.' | '.config('site.name');
    }

    /**
     * Card text: the summary, or the intro cut to one sentence-length line.
     */
    public function cardText(): ?string
    {
        return $this->summary ?: ($this->intro ? str($this->intro)->limit(110)->toString() : null);
    }
}

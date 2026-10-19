<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use InvalidArgumentException;

/**
 * Responsive <img> for a photo registered in config/photos.php.
 *
 * Builds a width-based srcset, reserves layout space through width/height
 * (CLS) and lazy-loads unless marked as priority (the LCP image).
 *
 * Usage: <x-ui.photo name="kitchen-hero" ratio="4/5" sizes="50vw" priority />
 */
class Photo extends Component
{
    /**
     * @var list<int>
     */
    private const WIDTHS = [480, 768, 1080, 1440, 1920];

    public string $src;

    public string $srcset;

    public string $alt;

    public int $width;

    public int $height;

    public function __construct(
        public string $name,
        public string $ratio = '3/2',
        public string $sizes = '100vw',
        public bool $priority = false,
        ?string $alt = null,
    ) {
        $photo = config("photos.{$name}");

        if (! is_array($photo)) {
            throw new InvalidArgumentException("Photo [{$name}] is not registered in config/photos.php.");
        }

        [$ratioWidth, $ratioHeight] = array_map('floatval', explode('/', $ratio));

        $this->width = 1080;
        $this->height = (int) round($this->width * $ratioHeight / $ratioWidth);
        $this->alt = $alt ?? $photo['alt'];
        $this->src = $this->url($photo['unsplash'], $this->width, $ratioWidth / $ratioHeight);
        $this->srcset = collect(self::WIDTHS)
            ->map(fn (int $width): string => $this->url($photo['unsplash'], $width, $ratioWidth / $ratioHeight)." {$width}w")
            ->implode(', ');
    }

    private function url(string $id, int $width, float $aspect): string
    {
        return 'https://images.unsplash.com/photo-'.$id.'?'.http_build_query([
            'auto' => 'format',
            'fit' => 'crop',
            'q' => 70,
            'w' => $width,
            'h' => (int) round($width / $aspect),
        ]);
    }

    public function render(): View|Closure|string
    {
        return view('components.ui.photo');
    }
}

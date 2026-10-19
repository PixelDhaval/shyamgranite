<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use InvalidArgumentException;

/**
 * Inline SVG icon from resources/svg/icons (Phosphor "light" set, MIT).
 *
 * Usage: <x-ui.icon name="phone" class="size-5" />
 * Icons are decorative by default (aria-hidden). Pass a label to expose
 * the icon to assistive technology when it carries meaning on its own.
 */
class Icon extends Component
{
    /**
     * @var array<string, string>
     */
    private static array $cache = [];

    public function __construct(
        public string $name,
        public ?string $label = null,
    ) {}

    public function svgBody(): string
    {
        if (! isset(self::$cache[$this->name])) {
            $path = resource_path("svg/icons/{$this->name}.svg");

            if (! is_file($path)) {
                throw new InvalidArgumentException("Icon [{$this->name}] does not exist.");
            }

            preg_match('/<svg[^>]*>(.*)<\/svg>/s', file_get_contents($path), $matches);

            self::$cache[$this->name] = trim($matches[1] ?? '');
        }

        return self::$cache[$this->name];
    }

    public function render(): View|Closure|string
    {
        return view('components.ui.icon');
    }
}

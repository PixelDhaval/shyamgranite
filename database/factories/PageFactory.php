<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->words(2, true);

        return [
            'path' => str($name)->slug()->toString(),
            'template' => 'page',
            'name' => str($name)->title()->toString(),
            'title' => str($name)->title()->toString(),
            'summary' => fake()->sentence(),
            'intro' => fake()->paragraph(),
            'photo' => 'granite-black',
            'content' => ['blocks' => []],
            'faqs' => [],
            'is_published' => true,
        ];
    }

    public function unpublished(): static
    {
        return $this->state(fn (array $attributes): array => ['is_published' => false]);
    }

    public function variety(): static
    {
        return $this->state(fn (array $attributes): array => [
            'template' => 'variety',
            'content' => [
                'specs' => ['material' => 'Granite', 'origin' => 'Andhra Pradesh', 'colour' => 'Black', 'finishes' => ['Polished'], 'uses' => ['Kitchen platforms']],
                'body' => [fake()->paragraph()],
            ],
        ]);
    }
}

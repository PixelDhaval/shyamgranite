<?php

namespace Database\Factories;

use App\Enums\EnquiryStatus;
use App\Models\Enquiry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Enquiry>
 */
class EnquiryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'phone' => '+91 98'.fake()->numerify('### #####'),
            'email' => fake()->safeEmail(),
            'town' => fake()->randomElement(['Adipur', 'Gandhidham', 'Anjar', 'Bhuj']),
            'interested_in' => fake()->randomElement(['Black Galaxy granite', 'Italian marble flooring', 'Kota stone']),
            'message' => fake()->paragraph(),
            'source_url' => url('/contact'),
            'status' => EnquiryStatus::New,
        ];
    }

    public function withoutEmail(): static
    {
        return $this->state(fn (array $attributes): array => ['email' => null]);
    }
}

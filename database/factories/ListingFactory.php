<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
// php artisan make:factory ListingFactory
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'tags' => 'laravel, javascript, php, react, node',
            'company' => fake()->company(),
            'location' => fake()->city() . ', ' . fake()->countryISOAlpha3(),
            'email' => fake()->unique()->companyEmail(),
            'website' => fake()->url(),
            'description' => fake()->paragraph(5),
            'created_at' => fake()->time
        ];
    }
}

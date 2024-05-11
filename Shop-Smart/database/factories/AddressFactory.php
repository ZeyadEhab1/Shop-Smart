<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'country' => $this->faker->country,
            'state' => $this->faker->country,
            'city' => $this->faker->city,
            'street_name' => $this->faker->streetName,
            'building_number' => $this->faker->buildingNumber,
            'floor_number' => $this->faker->numberBetween(1, 20),
            'apartment_number' => $this->faker->optional()->numberBetween(1, 100),
            'additional_details' => $this->faker->optional()->realText(200),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

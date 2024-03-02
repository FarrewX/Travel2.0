<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Details>
 */
class DetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->unique()->regexify('[0-9]{10}'),
            'first_name' => fake('th_TH')->firstName,
            'last_name' => fake('th_TH')->lastName,
            'first_name_en' => fake('en_US')->firstName,
            'last_name_en' => fake('en_US')->lastName,
            'idcard' => fake()->unique()->regexify('[0-9]{13}'),
            'birthdate' => fake()->date,
            'age' => fake()->numberBetween(20, 80),
            'address' => fake('th_TH')->address,
            'phone' => fake()->phoneNumber,
            'email' => fake()->unique()->safeEmail,
            'goto' => fake('th_TH')->address,
        ];
    }
}

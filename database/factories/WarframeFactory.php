<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Warframe>
 */
class WarframeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->title,
            'firstAbility' => $this->faker->userName,
            'secondAbility' => $this->faker->userName,
            'thirdAbility' => $this->faker->userName,
            'fourthAbility' => $this->faker->userName,
            'sex' => $this->faker->randomElement(['male', 'female']),
        ];
    }
}

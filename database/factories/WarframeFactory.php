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
            'description' => $this->faker->text,
            'firstAbility' => $this->faker->text,
            'secondAbility' => $this->faker->text,
            'thirdAbility' => $this->faker->text,
            'fourthAbility' => $this->faker->text,
            'sex' => $this->faker->randomElements(['male', 'female']),
        ];
    }
}

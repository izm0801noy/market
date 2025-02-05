<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    protected $model = \App\Models\Item::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'price' => $this->faker->numberBetween(100, 10000),
            'description' => $this->faker->sentence,
            'img_url' => $this->faker->imageUrl(),
            'condition' => $this->faker->randomElement(['new', 'used', 'refurbished']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

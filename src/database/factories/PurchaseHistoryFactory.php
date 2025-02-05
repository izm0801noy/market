<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseHistoryFactory extends Factory
{   protected $model = \App\Models\PurchaseHistory::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10), 
            'item_id' => $this->faker->numberBetween(1, 10), 
            'quantity' => $this->faker->numberBetween(1, 5), 
            'total_price' => $this->faker->numberBetween(1000, 10000), 
            'purchase_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        ];
    }
}

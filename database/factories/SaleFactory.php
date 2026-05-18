<?php

namespace Database\Factories;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    protected $model = Sale::class;

    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 2),
            'post_id' => $this->faker->numberBetween(1, 80),
        ];
    }
}

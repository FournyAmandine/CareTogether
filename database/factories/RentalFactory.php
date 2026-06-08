<?php

namespace Database\Factories;

use App\Models\Rental;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RentalFactory extends Factory
{
    protected $model = Rental::class;

    public function definition(): array
    {
        return [
            'start_date' => Carbon::now(),
            'end_date' => Carbon::create(2026, 06,05, 10, 00),
            'user_id' => $this->faker->numberBetween(1, 2),
            'post_id' => $this->faker->numberBetween(1, 80),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

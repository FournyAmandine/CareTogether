<?php

namespace Database\Factories;

use App\Models\Conversation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ConversationFactory extends Factory
{
    protected $model = Conversation::class;

    public function definition(): array
    {
        return [
            'post_id' => $this->faker->numberBetween(1, 40),
            'buyer_id' => $this->faker->numberBetween(1, 12),
            'seller_id' => $this->faker->numberBetween(1, 12),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

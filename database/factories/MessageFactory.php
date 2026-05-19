<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory

{
    protected $model = Message::class;
    public function definition(): array
    {
        return [
            'text' => $this->faker->text(100),
            'read' => $this->faker->boolean(),
            'post_id' => 1,
            'receiver_id' => $this->faker->randomNumber(1, 10),
            'sender_id' => $this->faker->randomNumber(1, 10),
        ];
    }
}

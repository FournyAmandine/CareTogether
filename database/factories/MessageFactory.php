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
            'conversation_id' => $this->faker->numberBetween(1, 10),
            'sender_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Enums\PostState;
use App\Enums\PostType;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $name = ['Fauteuil roulant pliable', 'Déambulateur 4 roues', 'Lit médicalisé électrique', 'Coussin anti-escarres'];
        $locality = ['Nandrin', 'Seraing', 'Marche-en-Famenne', 'Bastogne'];
        $state = [PostState::Damaged->value, PostState::Good->value, PostState::New->value, PostState::Wear->value];
        $price = [390, 180, 420, 220];
        $img_path = ['assets/img/article-1.jpg', 'assets/img/article-2.jpg', 'assets/img/article-3.jpg', 'assets/img/article-4.jpg'];
        $type = [PostType::Sale->value, PostType::Rental->value, PostType::Loan->value, PostType::Donation->value];

        return [
            'name' => $this->faker->randomElement($name),
            'locality' => $this->faker->randomElement($locality),
            'state' => $this->faker->randomElement($state),
            'price' => $this->faker->randomElement($price),
            'category_id' => $this->faker->numberBetween(1, 6),
            'img_path' => $this->faker->randomElement($img_path),
            'marque' => 'Rolstoel',
            'type' => $this->faker->randomElement($type),
            'description' => $this->faker->text(200),
            'sold' => $this->faker->boolean(),
            'views' => $this->faker->numberBetween(1, 20),
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

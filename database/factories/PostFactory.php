<?php

namespace Database\Factories;

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
        $state = ['Bon état', 'Neuf', 'Trace d’usure'];
        $price = [390, 180, 420, 220];
        $category = ['Mobilité', 'Lit médicalisé', 'Soins et surveillance', 'Salle de bain adaptée', 'Confort et prévention', 'Autre matériel médical'];
        $img_path = ['assets/img/article-1.jpg', 'assets/img/article-2.jpg', 'assets/img/article-3.jpg', 'assets/img/article-4.jpg'];

        return [
            'name' => $this->faker->randomElement($name),
            'locality' => $this->faker->randomElement($locality),
            'state' => $this->faker->randomElement($state),
            'price' => $this->faker->randomElement($price),
            'category' => $this->faker->randomElement($category),
            'img_path' => $this->faker->randomElement($img_path),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

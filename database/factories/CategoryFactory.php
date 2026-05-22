<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        $name = ['Mobilité', 'Lit médicalisé', 'Soins et surveillance', 'Salle de bain adaptée', 'Confort et prévention', 'Autre matériel médical'];

        return [
            'name' => $this->faker->randomElement($name),
        ];
    }
}

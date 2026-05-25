<?php

namespace Database\Factories;

use App\Models\PostImage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PostImageFactory extends Factory
{
    protected $model = PostImage::class;

    public function definition(): array
    {
        $img_path = ['assets/img/article-1.jpg', 'assets/img/article-2.jpg', 'assets/img/article-3.jpg', 'assets/img/article-4.jpg'];

        return [
            'img_path' => $this->faker->randomElement($img_path),
            'post_id' => $this->faker->numberBetween(1, 80),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

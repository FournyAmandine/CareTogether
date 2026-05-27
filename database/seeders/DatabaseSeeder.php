<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Message;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\Rental;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'last_name' => 'Bourguignon',
            'first_name' => 'Anne-Catherine',
            'email' => 'anne@bourguignon.com',
            'role' => UserRole::User,
            'password' => 'user',
            'tel'=> '0473 79 19 38',
            'address' => 'Rue du Spite',
            'postal'=> 6600,
            'locality' => 'Flamierge',
        ]);

        User::factory()->create([
            'last_name' => 'Fourny',
            'first_name' => 'Amandine',
            'email' => 'amandine@fourny.com',
            'role' => UserRole::Administrator,
            'password' => 'admin',
            'tel'=> '0473 79 19 38',
            'address' => 'Rue du Spite',
            'postal'=> 6600,
            'locality' => 'Bertogne',
        ]);

        User::factory(10)->create();

        Category::factory()->create(
            [
                'name' => 'Mobilité'
            ]
        );

        Category::factory()->create(
            [
                'name' => 'Lit médicalisé'
            ]
        );

        Category::factory()->create(
            [
                'name' => 'Soins et surveillance'
            ]
        );

        Category::factory()->create(
            [
                'name' => 'Salle de bain adaptée'
            ]
        );

        Category::factory()->create(
            [
                'name' => 'Confort et prévention'
            ]
        );

        Category::factory()->create(
            [
                'name' => 'Autre matériel médical'
            ]
        );

        Post::factory(80)->create();

        Message::factory(15)->create();

        Rental::factory(10)->create();

        Sale::factory(10)->create();

        PostImage::factory(100)->create();

        ContactMessage::factory(10)->create();
    }
}

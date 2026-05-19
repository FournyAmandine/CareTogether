<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Message;
use App\Models\Post;
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
            'password' => 'user'
        ]);

        User::factory()->create([
            'last_name' => 'Fourny',
            'first_name' => 'Amandine',
            'email' => 'amandine@fourny.com',
            'role' => UserRole::Administrator,
            'password' => 'admin'
        ]);

        User::factory(10)->create();

        Post::factory(80)->create();

        Message::factory(15)->create();

        Rental::factory(10)->create();

        Sale::factory(10)->create();
    }
}

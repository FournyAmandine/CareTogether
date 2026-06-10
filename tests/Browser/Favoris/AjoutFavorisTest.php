<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;

uses(RefreshDatabase::class);

test('allows user to add a post to favorites', function () {

    $category = \App\Models\Category::factory()->create();
    $user = User::factory()->create([
        'password' => Hash::make('password'),
    ]);
    $post = Post::factory()->create([
        'category_id' => $category->id,
        'user_id' => $user->id,
        'sold' => 0
    ]);

    \Pest\Laravel\actingAs($user);

    visit(route('public.posts.show', $post->id))
        ->press('Enregistrer l‘annonce')
        ->assertSee('Enlever des annonces enregistrées');
});


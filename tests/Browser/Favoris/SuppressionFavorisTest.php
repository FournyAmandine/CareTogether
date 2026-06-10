<?php


use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;

uses(RefreshDatabase::class);

test('allows user to remove a post from favorites', function () {

    $category = \App\Models\Category::factory()->create();
    $user = User::factory()->create();
    $post = Post::factory()->create([
            'category_id' => $category->id,
            'user_id' => $user->id
    ]);

    $user->registered_posts()->attach($post->id);

    \Pest\Laravel\actingAs($user);

    visit(route('public.posts.show', $post->id))
        ->press('Enlever des annonces enregistrées')
        ->assertSee('Enregistrer l‘annonce');
});

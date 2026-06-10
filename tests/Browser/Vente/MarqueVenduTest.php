<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;

uses(RefreshDatabase::class);

test('user can make a post sold', function () {

    $user = User::factory()->create();

    $category = Category::factory()->create();

    $post = Post::factory()->create([
        'user_id' => $user->id,
        'name' => 'Annonce à supprimer',
        'category_id' => $category->id,
        'type' => \App\Enums\PostType::Sale->value
    ]);

    \Pest\Laravel\actingAs($user);

    visit(route('user.posts.show', $post->id))
        ->click('Marquer comme vendu')
        ->assertSee('Marquer cette annonce comme vendu');

});

<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('user can update a post', function () {

    $user = User::factory()->create();

    $category = Category::factory()->create();

    $post = Post::factory()->create([
        'user_id' => $user->id,
        'name' => 'Ancien titre',
        'category_id' => $category->id
    ]);

    \Pest\Laravel\actingAs($user);

    visit(route('user.posts.edit', $post->id))
            ->type('post_name', 'Titre modifié')
            ->press('Modifier')
            ->assertSee('Titre modifié');
});

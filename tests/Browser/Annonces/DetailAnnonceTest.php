<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('user can view post', function () {
    $category = Category::factory()->create();
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
            ->assertSee($post->name);
});

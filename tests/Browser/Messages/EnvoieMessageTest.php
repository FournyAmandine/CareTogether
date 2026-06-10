<?php

use App\Models\Conversation;
use App\Models\Message;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('allows user to contact the seller', function () {

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
        ->press('Contacter le vendeur')
        ->assertPathIs('/user/messages1');
});

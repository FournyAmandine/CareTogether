<?php

use App\Models\Conversation;
use App\Models\Message;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('allows user to open a conversation', function () {
    $category = \App\Models\Category::factory()->create();
    $buyer = User::factory()->create();
    $seller = User::factory()->create();
    $post = Post::factory()->create([
        'category_id' => $category->id,
        'user_id' => $seller->id,
        'sold' => 0
    ]);

    $conversation = Conversation::factory()->create([
        'buyer_id' => $buyer->id,
        'seller_id' => $seller->id,
        'post_id' => $post->id
    ]);

    Message::factory()->create([
        'conversation_id' => $conversation->id,
        'sender_id' => $seller->id,
        'text' => 'Bonjour, le produit est-il toujours disponible ?',
    ]);

    \Pest\Laravel\actingAs($buyer);

    visit(route('user.messages'))
        ->click('@conversation')
        ->assertSee('Bonjour, le produit est-il toujours disponible ?');

});

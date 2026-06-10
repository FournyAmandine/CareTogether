<?php

use App\Models\Conversation;
use App\Models\Message;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;

uses(RefreshDatabase::class);

beforeEach(function(){
    $this->user = User::factory()->create(['role' => \App\Enums\UserRole::User]);
    actingAs($this->user);
});

it('renders successfully', function () {

    $post = Post::factory()->create();

    $buyer = User::factory()->create();
    $seller = User::factory()->create();

    $conversation = Conversation::factory()->create([
        'post_id' => $post->id,
        'buyer_id' => $buyer->id,
        'seller_id' => $seller->id,
    ]);

    Livewire::test('pages::user.messages')
        ->assertStatus(200);
});


it('displays successfully the conversations', function () {
    $post = Post::factory()->create();
    $post2 = Post::factory()->create();
    $buyer = User::factory()->create();
    $sender = User::factory()->create();
    $conversation = Conversation::factory()->create([
        'post_id' => $post->id,
        'seller_id' => $this->user->id,
        'buyer_id' => $buyer->id
    ]);
    $conversation2 = Conversation::factory()->create([
        'post_id' => $post2->id,
        'seller_id' => $sender->id,
        'buyer_id' => $this->user->id
    ]);

    Livewire::test('pages::user.messages')
        ->assertStatus(200)
        ->assertSeeHTML($conversation->buyer->first_name)
        ->assertSeeHTML($conversation->buyer->last_name)
        ->assertSeeHTML($conversation2->seller->first_name)
        ->assertSeeHTML($conversation2->seller->last_name);
});

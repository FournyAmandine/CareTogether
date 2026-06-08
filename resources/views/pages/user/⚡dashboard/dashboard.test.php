<?php

use App\Models\Category;
use App\Models\ContactMessage;
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

    $posts  = Post::factory()->count(3)->for($this->user)->create();

    $conversation = Conversation::factory()->create([
        'post_id' => $post->id,
        'seller_id' => $this->user->id,
        'buyer_id' => $buyer->id
    ]);

    $messages  = Message::factory()->count(3)->for($conversation)->for($buyer, 'sender')->create();

    Livewire::test('pages::admin.dashboard')
        ->assertStatus(200)
        ->assertSee($posts[0]->name)
        ->assertSee($posts[1]->name)
        ->assertSee($posts[2]->name)
        ->assertSee($messages[0]->first_name)
        ->assertSee($messages[1]->first_name)
        ->assertSee($messages[2]->first_name);
});

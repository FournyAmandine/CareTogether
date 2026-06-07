<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;

uses(RefreshDatabase::class);

beforeEach(function(){
    $this->user = User::factory()->create(['role' => \App\Enums\UserRole::User]);
    $this->actingAs($this->user);
});


it('renders successfully', function () {

    $post = Post::factory()->for($this->user)->create();

    Livewire::test('pages::user.posts.edit', ['post' => $post->id])
        ->assertStatus(200);
});

it('renders edit page with post data', function () {

    $post = Post::factory()->create([
        'user_id' => $this->user->id,
        'name' => 'Lit',
        'price' => 390
    ]);

    Livewire::test('pages::user.posts.edit', ['post' => $post->id])
        ->assertSee($post->name)
        ->assertSee($post->price)
        ->assertStatus(200);
});

it('prevents users from editing posts they do not own', function () {

    $otherUser = User::factory()->create();

    $post = Post::factory()->create([
        'user_id' => $otherUser->id,
    ]);

    Livewire::test('pages::user.posts.edit', ['post' => $post->id])
        ->assertForbidden();
});

it('updates a post successfully', function () {

    $post = Post::factory()->create([
        'user_id' => $this->user->id,
        'name' => 'Lit',
    ]);

    Livewire::test('pages::user.posts.edit', ['post' => $post->id])
        ->set('form.name', 'Lit médical')
        ->set('form.price', 100)
        ->call('save');

    $this->assertDatabaseHas('posts', [
        'id' => $post->id,
        'name' => 'Lit médical',
        'price' => 100,
    ]);
});

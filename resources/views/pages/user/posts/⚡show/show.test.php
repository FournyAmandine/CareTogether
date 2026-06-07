<?php

use App\Enums\PostType;
use App\Models\Category;
use App\Models\Conversation;
use App\Models\Post;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

beforeEach(function(){
    $this->user = User::factory()->create(['role' => \App\Enums\UserRole::User]);
    $this->actingAs($this->user);
});


it('renders successfully', function () {

    $post = Post::factory()->for($this->user)->create();

    Livewire::test('pages::user.posts.show', ['post' => $post->id])
        ->assertStatus(200);
});


it('renders edit page with post data', function () {

    $post = Post::factory()->create([
        'user_id' => $this->user->id,
        'name' => 'Déambulateur',
        'price' => 290
    ]);

    Livewire::test('pages::user.posts.show', ['post' => $post->id])
        ->assertSee($post->name)
        ->assertSee($post->price)
        ->assertStatus(200);
});


it('display the seller', function () {

    $user = User::factory()->create([
        'first_name' => 'Jean',
        'last_name' => 'Bourguignon'
    ]);

    $post = Post::factory()->for($user)->create();

    Livewire::test('pages::user.posts.show', ['post' => $post->id])
        ->assertSee($post->name)
        ->assertSee($post->price)
        ->assertSee('Jean')
        ->assertSee('Bourguignon')
        ->assertStatus(200);
});

it('opens the filters modal when the method is called', function () {

    Livewire::test('pages::user.registered.index')
        ->assertSet('isOpenFiltersModal', false)
        ->call('toggleModal', 'filters')
        ->assertSet('isOpenFiltersModal', true);
});

it('opens the delete modal when the method is called', function () {

    $post = Post::factory()->for($this->user)->create();

    Livewire::test('pages::user.posts.show', ['post' => $post->id])
        ->assertSet('isOpenDeleteModal', false)
        ->call('toggleModal', 'delete', $post->id)
        ->assertSet('isOpenDeleteModal', true);
});

it('opens the sold modal when the method is called', function () {

    $post = Post::factory()->for($this->user)->create();

    Livewire::test('pages::user.posts.show', ['post' => $post->id])
        ->assertSet('isOpenSoldModal', false)
        ->call('toggleModal', 'sold', $post->id)
        ->assertSet('isOpenSoldModal', true);
});


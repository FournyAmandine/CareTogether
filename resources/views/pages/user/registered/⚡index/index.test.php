<?php

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
    Livewire::test('pages::user.registered.index')
        ->assertStatus(200);
});

it('displays successfully the list of registered posts', function () {

    $post = Post::factory()->create();

    $this->user->registered_posts()->attach($post->id);

    Livewire::test('pages::user.registered.index')
        ->assertSeeHtml($post->name);

});


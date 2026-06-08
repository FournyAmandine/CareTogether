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
    Livewire::test('pages::user.posts.index')
        ->assertStatus(200);
});

it('displays successfully the list of posts', function () {

    $post = Post::factory()->for($this->user)->create();

    Livewire::test('pages::user.posts.index')
        ->assertSeeHtml($post->name);

});

it('opens the filters modal when the method is called', function () {

    Livewire::test('pages::user.posts.index')
        ->assertSet('isOpenFiltersModal', false)
        ->call('toggleModal', 'filters')
        ->assertSet('isOpenFiltersModal', true);
});




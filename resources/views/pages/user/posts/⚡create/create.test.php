<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseEmpty;
use function Pest\Laravel\assertDatabaseHas;

uses(RefreshDatabase::class);

beforeEach(function(){
    $this->user = User::factory()->create(['role' => \App\Enums\UserRole::User]);
    actingAs($this->user);
});

it('renders successfully', function () {
    Livewire::test('pages::user.posts.create')
        ->assertStatus(200);
});

it('creates successfully a post from the data provided by the request', function () {

    $post = Post::factory()->raw();

    Livewire::test('pages::user.posts.create')
        ->set('form.name', $post['name'])
        ->set('form.type', $post['type'])
        ->set('form.state', $post['state'])
        ->set('form.price', $post['price'])
        ->set('form.marque', $post['marque'])
        ->set('form.category_id', $post['category_id'])
        ->set('form.description', $post['description'])
        ->set('form.sold', $post['sold'])
        ->call('store')
        ->assertHasNoErrors();

    assertDatabaseHas('posts', ['name' => $post['name']]);

});

it('fails to create a new post in database when the name is missing in the request', function () {

    $post = Post::factory()->withoutName()->raw();

    Livewire::test('pages::user.posts.create')
        ->set('form.name', $post['name'])
        ->set('form.type', $post['type'])
        ->set('form.state', $post['state'])
        ->set('form.price', $post['price'])
        ->set('form.marque', $post['marque'])
        ->set('form.category_id', $post['category_id'])
        ->set('form.description', $post['description'])
        ->set('form.sold', $post['sold'])
        ->call('store')
        ->assertHasErrors(['form.name' => 'required']);

    assertDatabaseEmpty('posts');

});

it('fails to create a new post in database when the type is missing in the request', function () {

    $post = Post::factory()->withoutType()->raw();

    Livewire::test('pages::user.posts.create')
        ->set('form.name', $post['name'])
        ->set('form.type', $post['type'])
        ->set('form.state', $post['state'])
        ->set('form.price', $post['price'])
        ->set('form.marque', $post['marque'])
        ->set('form.category_id', $post['category_id'])
        ->set('form.description', $post['description'])
        ->set('form.sold', $post['sold'])
        ->call('store')
        ->assertHasErrors(['form.type' => 'required']);

    assertDatabaseEmpty('posts');

});

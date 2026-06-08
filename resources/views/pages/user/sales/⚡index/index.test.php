<?php

use App\Models\Post;
use App\Models\Sale;
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
    Livewire::test('pages::user.sales.index')
        ->assertStatus(200);
});

it('displays successfully the list of sales', function () {

    $post = Post::factory()->create();

    $sale = Sale::factory()->create([
        'user_id' => $this->user->id,
        'post_id' => $post->id
    ]);

    Livewire::test('pages::user.sales.index')
        ->assertSeeHtml($sale->post->name);

});

it('opens the filters modal when the method is called', function () {

    Livewire::test('pages::user.sales.index')
        ->assertSet('isOpenFiltersModal', false)
        ->call('toggleModal', 'filters')
        ->assertSet('isOpenFiltersModal', true);
});


<?php

use App\Models\Post;
use App\Models\Rental;
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
    Livewire::test('pages::user.rentals.index')
        ->assertStatus(200);
});

it('displays successfully the list of rentals', function () {

    $post = Post::factory()->create();

    $rental = Rental::factory()->create([
        'user_id' => $this->user->id,
        'post_id' => $post->id
    ]);

    Livewire::test('pages::user.rentals.index')
        ->assertSeeHtml($rental->post->name);

});

it('opens the filters modal when the method is called', function () {

    Livewire::test('pages::user.rentals.index')
        ->assertSet('isOpenFiltersModal', false)
        ->call('toggleModal', 'filters')
        ->assertSet('isOpenFiltersModal', true);
});



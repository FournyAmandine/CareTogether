<?php

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

    Livewire::test('pages::user.profil')
        ->assertStatus(200);

});

it('displays the correct informations about the user', function () {

    $user2 = User::factory()->create();

    $response = $this->get(route('user.profil'));

    $response->assertSee($this->user['first_name']);
    $response->assertSee($this->user['last_name']);
    $response->assertSee($this->user['email']);
    $response->assertDontSee($user2['first_name']);
    $response->assertDontSee($user2['last_name']);
    $response->assertDontSee($user2['email']);
});

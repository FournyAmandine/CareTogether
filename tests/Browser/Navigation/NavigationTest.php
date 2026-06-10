<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;

uses(RefreshDatabase::class);

test('navigation works on the dashboard', function () {

    $user = User::factory()->create();

    \Pest\Laravel\actingAs($user);

    visit(route('user.dashboard'))
            ->click('@Vos annonces')
            ->assertPathIs('/user/posts');
});

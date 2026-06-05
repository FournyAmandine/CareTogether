<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;

uses(RefreshDatabase::class);

test('user can logout', function () {

    $user = User::factory()->create([
        'password' => Hash::make('password'),
    ]);

    $this->browse(function (Browser $browser) use ($user) {

        $browser->loginAs($user)
            ->visit('/user/dashboard')
            ->press('Deconnexion')
            ->waitForLocation('/')
            ->assertPathIs('/');
    });
});

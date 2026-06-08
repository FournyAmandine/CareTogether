<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

uses(RefreshDatabase::class);

use Illuminate\Foundation\Testing\DatabaseMigrations;

test('user can register', function () {


    $user = User::factory()->create();

    $this->browse(function (Browser $browser) use ($user) {
        $browser->visit('/register')
            ->type('first_name', $user->first_name)
            ->type('last_name', $user->last_name)
            ->type('email', $user->email)
            ->type('password', 'password')
            ->type('locality', $user->locality)
            ->press('S’inscrire')
            ->assertPathIs('/user/dashboard');
    });

});

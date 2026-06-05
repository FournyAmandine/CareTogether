<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class);

test('user can login', function () {


    $user = User::factory()->create([
        'password' => Hash::make('password'),
    ]);

    visit(route('login', app()->getLocale()))
        ->type('email', $user->email)
        ->type('password', 'password')
        ->press('Se connecter')
        ->assertPathIs('/user/dashboard');

});

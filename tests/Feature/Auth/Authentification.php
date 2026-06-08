<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\actingAs;

uses(RefreshDatabase::class);

it('can display the login form', function (){
$response = $this->get(route('login', ['locale' => app()->getLocale()]));

$response->assertSee('Connexion à votre espace');
$response->assertSeeInOrder(['<form', 'Entrez votre email', 'Entrez votre mot de passe', '<button', 'Se connecter'], true);
});

it('we are redirected to the dashboard after a successful request for a user', function () {

    $password = 'amandine';
    $user = User::factory()->create([
        'first_name'=>'Loïc',
        'last_name' => 'Mozin',
        'role' => \App\Enums\UserRole::User,
        'email' => 'loic@mozin.be',
        'password' => \Illuminate\Support\Facades\Hash::make($password)
    ]);

    $response = $this->post(route('login.store', ['locale' => app()->getLocale()]),
        [
            'email'=>$user->email,
            'password'=>$password,
        ]);

    $response->assertStatus(302);
    $response->assertRedirect(route('user.dashboard'));

});

it('we are redirected to the dashboard after a successful request for an admin', function () {

    $password = 'amandine';
    $user = User::factory()->create([
        'first_name'=>'Loïc',
        'last_name' => 'Mozin',
        'role' => \App\Enums\UserRole::Administrator,
        'email' => 'loic@mozin.be',
        'password' => \Illuminate\Support\Facades\Hash::make($password)
    ]);

    $response = $this->post(route('login.store', ['locale' => app()->getLocale()]),
        [
            'email'=>$user->email,
            'password'=>$password,
        ]);

    $response->assertStatus(302);
    $response->assertRedirect(route('admin.dashboard'));

});

it('a guest can’t access to the dashboard and if he redirect to the login page', function () {

    $response = $this->get(route('user.dashboard', ['locale' => app()->getLocale()]));

    $response->assertStatus(302);
    $response->assertRedirect(route('login'));
});

it('a user can access to the user dashboard', function () {

    $admin = User::factory()->create(['role' => \App\Enums\UserRole::User]);
    actingAs($admin);

    $response = $this->get(route('user.dashboard', ['locale' => app()->getLocale()]));

    $response->assertStatus(200);
});

it('a user can’t access to the admin dashboard', function () {

    $volunteer = User::factory()->create(['role' => \App\Enums\UserRole::User]);
    actingAs($volunteer);

    $response = $this->get(route('admin.dashboard', ['locale' => app()->getLocale()]));

    $response->assertStatus(403);
});

it('a administrator can access to the admin dashboard', function () {

    $admin = User::factory()->create(['role' => \App\Enums\UserRole::Administrator]);
    actingAs($admin);

    $response = $this->get(route('admin.dashboard', ['locale' => app()->getLocale()]));

    $response->assertStatus(200);
});

it('a administrator can’t access to the user dashboard', function () {

    $admin = User::factory()->create(['role' => \App\Enums\UserRole::Administrator]);
    actingAs($admin);

    $response = $this->get(route('user.dashboard', ['locale' => app()->getLocale()]));

    $response->assertStatus(403);
});


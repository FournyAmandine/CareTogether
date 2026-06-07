<?php


use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can display the register form', function (){
    $response = $this->get(route('register', ['locale' => app()->getLocale()]));

    $response->assertSee('Inscription à l’espace personnel');
    $response->assertSeeInOrder(['<form', 'Entrez votre nom', 'Entrez votre prénom', 'Entrez votre email', 'Entrez votre mot de passe (minimun 8 caractères)', 'Entrez votre localité', '<button', 'S’inscrire'], true);
});

it('we are redirected to the user dashboard after a successful request', function () {

    $response = $this->post(route('register.store', ['locale' => app()->getLocale()]),
        [
            'first_name'=>'Loïc',
            'last_name' => 'Mozin',
            'email' => 'loic@mozin.be',
            'password' => 'amandine12',
            'locality'=> 'Bastogne'
        ]);

    $response->assertStatus(302);
    $response->assertRedirect(route('user.dashboard'));

});

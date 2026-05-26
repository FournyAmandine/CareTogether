<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::user.profil')
        ->assertStatus(200);
});

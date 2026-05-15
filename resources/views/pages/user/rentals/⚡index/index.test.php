<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::user.rentals.index')
        ->assertStatus(200);
});

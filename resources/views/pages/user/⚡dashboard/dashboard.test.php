<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::user.dashboard')
        ->assertStatus(200);
});

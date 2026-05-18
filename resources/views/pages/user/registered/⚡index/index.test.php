<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::user.registered.index')
        ->assertStatus(200);
});

<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('components::user.partials.header')
        ->assertStatus(200);
});

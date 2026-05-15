<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::user.sales.index')
        ->assertStatus(200);
});

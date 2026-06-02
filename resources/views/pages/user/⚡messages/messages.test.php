<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::user.messages')
        ->assertStatus(200);
});

<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::admin.contact_messages.index')
        ->assertStatus(200);
});

<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::user.posts.index')
        ->assertStatus(200);
});

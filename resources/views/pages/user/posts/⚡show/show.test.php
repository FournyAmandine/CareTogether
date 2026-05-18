<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::user.posts.show')
        ->assertStatus(200);
});

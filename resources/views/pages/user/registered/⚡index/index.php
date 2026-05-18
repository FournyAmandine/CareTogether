<?php

use Livewire\Attributes\Title;
use Livewire\Component;

new class extends Component
{
    #[Title('Vos annonces enregistrées')]

    public function render()
    {
        return view('pages.user.registered.⚡index.index', [
            'registered_posts' => auth()->user()->registered_posts()->get(),
        ]);
    }
};

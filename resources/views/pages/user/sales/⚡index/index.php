<?php

use Carbon\Carbon;
use Livewire\Attributes\Title;
use Livewire\Component;

new class extends Component
{
    #[Title('Vos achats/dons')]

    public function render()
    {
        return view('pages.user.sales.⚡index.index', [
            'sales' => auth()->user()->sales()->get(),
        ])->layoutData(['body_class'=>'']);
    }
};

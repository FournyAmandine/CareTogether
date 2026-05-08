<?php

use Livewire\Attributes\Title;
use Livewire\Component;

new class extends Component
{
    #[Title('Dashboard')]
    public function render (){
        return view('pages.user.⚡dashboard.dashboard')->layoutData(['body_class'=>'dashboardPage']);
    }
};

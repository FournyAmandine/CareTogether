<?php

use App\Livewire\Forms\MessageForm;
use App\Livewire\Forms\PostForm;
use App\Models\Message;
use App\Models\Post;
use Carbon\Carbon;
use Livewire\Attributes\Title;
use Livewire\Component;

new class extends Component
{
    #[Title('Vos locations/prêts')]

    public function render()
    {
        return view('pages.user.rentals.⚡index.index', [
            'current_rentals' => auth()->user()->rentals()->where('rentals.end_date', '>', Carbon::now())->get(),
            'ended_rentals' => auth()->user()->rentals()->where('rentals.end_date', '<', Carbon::now())->get(),
        ]);
    }
};

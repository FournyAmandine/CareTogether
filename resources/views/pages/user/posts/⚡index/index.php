<?php

use App\Enums\PostType;
use Livewire\Attributes\Title;
use Livewire\Component;

new class extends Component
{
    #[Title('Vos annonces')]

    public function render()
    {
        $sales = auth()->user()
            ->posts()
            ->with('registeredByUser')
            ->whereIn('posts.type', [PostType::Sale, PostType::Donation])
            ->get();

        $sales->load(['sales', 'registeredByUser']);

        $rentals = auth()->user()
            ->posts()
            ->with('registeredByUser')
            ->whereIn('posts.type', [PostType::Rental, PostType::Loan])
            ->get();

        $rentals->load(['rentals', 'registeredByUser']);

        return view('pages.user.posts.⚡index.index', [
            'sales' => $sales,
            'rentals' => $rentals
        ])->layoutData(['body_class'=>'userPosts']);
    }
};

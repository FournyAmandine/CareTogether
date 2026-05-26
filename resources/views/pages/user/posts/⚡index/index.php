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
            ->orderByDesc('created_at')
            ->get();

        $sales->load(['sales', 'registeredByUser', 'category']);

        $rentals = auth()->user()
            ->posts()
            ->with('registeredByUser')
            ->whereIn('posts.type', [PostType::Rental, PostType::Loan])
            ->orderByDesc('created_at')
            ->get();

        $rentals->load(['rentals', 'registeredByUser', 'category']);

        return view('pages.user.posts.⚡index.index', [
            'sales' => $sales,
            'rentals' => $rentals
        ])->layoutData(['body_class'=>'userPosts']);
    }
};

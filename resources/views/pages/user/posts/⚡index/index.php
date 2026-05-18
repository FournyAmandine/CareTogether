<?php

use App\Enums\PostType;
use Livewire\Attributes\Title;
use Livewire\Component;

new class extends Component
{
    #[Title('Vos annonces')]

    public function render()
    {
        return view('pages.user.posts.⚡index.index', [
            'sales' => auth()->user()->posts()->whereIn('posts.type', [PostType::Sale, PostType::Donation])->get(),
            'rentals' => auth()->user()->posts()->whereIn('posts.type', [PostType::Rental, PostType::Loan])->get()
        ])->layoutData(['body_class'=>'userPosts']);
    }
};

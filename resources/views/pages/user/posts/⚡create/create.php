<?php

use App\Enums\PostState;
use App\Enums\PostType;
use App\Livewire\Forms\PostForm;
use Livewire\Attributes\Title;
use Livewire\Component;

new class extends Component
{
    public PostForm $form;
    #[Title('Ajouter une annonce')]
    public function render() {
        return view('pages.user.posts.⚡create.create');
    }

    public function store() {
        $post = $this->form->setPost;
        return redirect()->route('user.posts.show', $post->id);
    }

    public function getState()
    {
        return PostState::cases();
    }

    public function getType()
    {
        return PostType::cases();
    }
};

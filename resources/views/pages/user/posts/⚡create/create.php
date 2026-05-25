<?php

use App\Enums\PostState;
use App\Enums\PostType;
use App\Livewire\Forms\PostForm;
use App\Models\Post;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;

    public PostForm $form;


    #[Title('Ajouter une annonce')]
    public function render() {
        return view('pages.user.posts.⚡create.create', [
            'categories' => \App\Models\Category::get()
        ]);
    }

    public function store()
    {
        $post = $this->form->store();

        return redirect()->route('user.posts.show', $post->id);
    }

    public function removeNewImage($index):void
    {
        unset($this->form->newImages[$index]);
        $this->form->newImages = array_filter($this->form->newImages);
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

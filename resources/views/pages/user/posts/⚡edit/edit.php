<?php

use App\Enums\PostState;
use App\Enums\PostType;
use App\Livewire\Forms\PostForm;
use App\Models\Post;
use Livewire\Component;

new class extends Component
{
    public PostForm $form;

    public $post;

    public function render()
    {
        return view('pages.user.posts.⚡edit.edit')->title('Modifier ' . $this->post->name);
    }

    public function mount($post): void
    {
        $this->post = Post::findOrFail($post);
        $this->form->setPost($this->post);
    }

    public function save()
    {
        $this->form->update();
        return $this->redirect(route('user.posts.show', $this->post->id));
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

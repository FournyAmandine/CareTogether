<?php

use App\Enums\PostState;
use App\Enums\PostType;
use App\Livewire\Forms\PostForm;
use App\Models\Post;
use App\Models\PostImage;
use Livewire\Component;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;

    public PostForm $form;

    public $post;

    public array $existingImages = [];

    public function render()
    {
        return view('pages.user.posts.⚡edit.edit', [
            'categories' => \App\Models\Category::get()
        ])->title('Modifier ' . $this->post->name);
    }

    public function mount($post): void
    {
        $this->post = Post::findOrFail($post);
        $this->form->setPost($this->post);
        $this->existingImages = $this->post->images->toArray();
    }

    public function save()
    {
        $this->form->update();

        return $this->redirect(route('user.posts.show', $this->post->id));
    }

    public function removeImage($id):void
    {
        PostImage::find($id)->delete();
        $this->existingImages = array_filter($this->existingImages, fn($image) => $image['id'] !== $id);
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

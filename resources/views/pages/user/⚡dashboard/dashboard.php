<?php

use App\Livewire\Forms\MessageForm;
use App\Livewire\Forms\PostForm;
use App\Models\Message;
use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

new class extends Component
{
    public $post;
    public PostForm $postform;
    public MessageForm $messageform;
    public string|Post $chosenPost = '';
    public bool $isOpenDeleteModal = false;
    #[Title('Dashboard')]
    public function mount(Post $post, Message $message)
    {
        $this->postform->setPost($post);
        $this->messageform->setMessage($message);
    }

    public function render (){
        return view('pages.user.⚡dashboard.dashboard', [
            'first_name' => auth()->user()->first_name,
            'last_name' => auth()->user()->last_name,
            'posts_unsold' => auth()->user()->posts()->where('posts.sold', 0)->count(),
            'posts_sold' => auth()->user()->posts()->where('posts.sold', 1)->count(),
            'rentals' => auth()->user()->rentals()->count(),
            'messages_unread' => auth()->user()->receivedMessages()->where('messages.read', 0)->count(),
            'posts' => auth()->user()->posts()->where('posts.sold', 0)->paginate(4),
            'messages' => auth()->user()->receivedMessages()->with('receiver')->paginate(5),
        ])->layoutData(['body_class'=>'dashboardPage']);
    }

    #[On ('toggleModal')]
    public function toggleModal(string $modal, $id = ''): void
    {
        if ($modal === 'delete') {
            $this->isOpenDeleteModal = !$this->isOpenDeleteModal;
        }

        $this->isOpenDeleteModal ? $this->dispatch('open-modal') : $this->dispatch('close-modal');
        if ($modal === 'delete') {
            $this->chosenPost = $id !== '' ? Post::find($id) : '';
        }
    }

    public function delete():void
    {
        $this->chosenPost->delete();
        $this->dispatch('close-modal');
        $this->toggleModal('delete');
        $this->redirect(route('user.dashboard'));
    }

};

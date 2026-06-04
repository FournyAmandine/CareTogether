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

    public string|Notification $openNotification = '';
    public bool $isOpenDeleteModal = false;

    public bool $isOpenShowModal = false;
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
            'conversations' => auth()->user()->soldConversations()->count(),
            'posts' => auth()->user()->posts()->with('images')->where('posts.sold', 0)->paginate(4),
            'messages' => Message::whereHas('conversation', function ($q) {
                $q->where('seller_id', auth()->id());
            })->with(['sender'])->latest()->paginate(5),
            'notifications' => auth()->user()->unreadNotifications
        ])->layoutData(['body_class'=>'dashboardPage']);
    }

    #[On ('toggleModal')]
    public function toggleModal(string $modal, $id = ''): void
    {
        if ($modal === 'delete') {
            $this->isOpenDeleteModal = !$this->isOpenDeleteModal;
        }

        if ($modal === 'notif') {
            $this->isOpenShowModal = !$this->isOpenShowModal;
            $this->openNotification = $id !== '' ? Notification::find($id) : '';
        }

        $this->isOpenDeleteModal || $this->isOpenShowModal ? $this->dispatch('open-modal') : $this->dispatch('close-modal');
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

    public function markAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        $this->dispatch('close-modal');
    }
};

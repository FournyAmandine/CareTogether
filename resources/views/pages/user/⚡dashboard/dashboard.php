<?php

use App\Livewire\Forms\MessageForm;
use App\Livewire\Forms\PostForm;
use App\Models\Message;
use App\Models\Post;
use Livewire\Attributes\Title;
use Livewire\Component;

new class extends Component
{
    public PostForm $postform;
    public MessageForm $messageform;
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
            'messages_unread' => auth()->user()->messages()->where('messages.read', 0)->count(),
            'posts' => auth()->user()->posts()->paginate(4),
            'messages' => auth()->user()->messages()->paginate(5),
        ])->layoutData(['body_class'=>'dashboardPage']);
    }

};

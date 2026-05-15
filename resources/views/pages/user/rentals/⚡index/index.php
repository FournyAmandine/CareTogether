<?php

use App\Livewire\Forms\MessageForm;
use App\Livewire\Forms\PostForm;
use App\Models\Message;
use App\Models\Post;
use Carbon\Carbon;
use Livewire\Attributes\Title;
use Livewire\Component;

new class extends Component
{
    public PostForm $postform;
    public MessageForm $messageform;
    #[Title('Vos locations/prêts')]
    public function mount(Post $post, Message $message)
    {
        $this->postform->setPost($post);
        $this->messageform->setMessage($message);
    }

    public function render()
    {
        return view('pages.user.rentals.⚡index.index', [
            'current_rentals' => auth()->user()->rentals()->where('rentals.end_date', '>', Carbon::now())->get(),
            'ended_rentals' => auth()->user()->rentals()->where('rentals.end_date', '<', Carbon::now())->get(),
        ])->layoutData(['body_class'=>'']);
    }
};

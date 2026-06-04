<?php

use App\Models\Conversation;
use App\Models\Message;
use App\Notifications\NewContactMessage;
use App\Notifications\NewMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Livewire\Attributes\Title;
use Livewire\Component;

new class extends Component
{

    public string $text = '';

    public ?int $selectedConversationId = null;

    public string $filters = 'all';

    public function mount($conversation = null)
    {
        $this->selectedConversationId = $conversation;
    }

    #[Title('Vos messages')]
    public function render (){

        $conversation = Conversation::first();

        $messages = $conversation->messages()->get();

        if ($this->selectedConversationId) {
            $conversation = Conversation::with('buyer', 'seller', 'messages.sender')->find($this->selectedConversationId);

            $messages = $conversation?->messages ?? collect();
        }

        $conversations = Conversation::with(['buyer', 'seller', 'post', 'messages.sender'])
            ->where(function ($q) {
                $q->where('buyer_id', auth()->id())->orWhere('seller_id', auth()->id());
            });

        if ($this->filters == 'unread') {
            $conversations->whereHas('messages', function ($q){
                $q->where('sender_id', '!=', auth()->id())
                    ->where('read', false);
            });
        }

        if ($this->filters == 'read') {
            $conversations->whereDoesntHave('messages', function ($q){
                $q->where('sender_id', auth()->id())
                    ->where('read', false);
            });
        }

        return view('pages.user.⚡messages.messages', [
            'conversations' => $conversations->orderByDesc('created_at')->get(),
            'conversation_selected' => $conversation,
            'messages' => $messages
        ]);
    }

    public function selectConversation(int $conversationId)
    {
        $this->selectedConversationId = $conversationId;

        Message::where('messages.conversation_id', $conversationId)
            ->where('messages.sender_id', '!=', auth()->id())
            ->where('read', false)
            ->update([
                'read' => true
            ]);
    }

    public function store()
    {
        $conversation = Conversation::find($this->selectedConversationId);

        $message = $conversation->messages()->create([
            'text' => $this->text,
            'sender_id' => auth()->id(),
            'read' => false
        ]);

        $receiver = $conversation->buyer_id === auth()->id()
            ? $conversation->seller
            : $conversation->buyer;

        Notification::send($receiver, new NewMessage($message));

        $this->reset('text');
    }
};

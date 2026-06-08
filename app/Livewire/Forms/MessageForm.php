<?php

namespace App\Livewire\Forms;

use App\Models\Message;
use Livewire\Attributes\Validate;
use Livewire\Form;

class MessageForm extends Form
{
    public ?Message $message;

    #[Validate('required|string')]
    public $text = '';

    #[Validate('boolean')]
    public $read = '';

    public function setMessage(Message $message) {

        $this->text = $message;
        $this->read = $message->name;
    }
}

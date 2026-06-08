<?php

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;

    public UserForm $form;

    public User $user;

    #[Title('Profil')]
    public function render (){
        return view('pages.user.⚡profil.profil');
    }

    public function mount(): void
    {
        $this->user = auth()->user();
        $this->form->setUser($this->user);
    }

    public function save()
    {
        $this->form->update();
    }
};

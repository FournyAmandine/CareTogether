<?php

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;

    public UserForm $form;

    public User $user;

    public bool $isOpenDeleteModal = false;

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

    #[On ('toggleModal')]
    public function toggleModal(string $modal, $id = ''): void
    {
        if ($modal === 'delete') {
            $this->isOpenDeleteModal = !$this->isOpenDeleteModal;
        }

        $this->isOpenDeleteModal ? $this->dispatch('open-modal') : $this->dispatch('close-modal');
        if ($modal === 'delete') {
            $this->user = $id !== '' ? User::find($id) : '';
        }
    }

    public function deleteAccount()
    {
        $user = auth()->user();
        auth()->logout();
        $user->delete();
        $this->dispatch('close-modal');

        return redirect()->route('public.homepage');
    }
};

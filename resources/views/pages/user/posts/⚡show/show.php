<?php

use App\Livewire\Forms\PostForm;
use App\Models\Post;
use App\Models\Rental;
use App\Models\Sale;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    public $post;
    public PostForm $form;
    public string|Post $chosenPost = '';
    public bool $isOpenDeleteModal = false;

    public bool $isOpenSoldModal = false;

    public bool $isOpenRentedModal = false;

    public bool $isOpenLoanedModal = false;

    public bool $isOpenGivenModal = false;

    public bool $isOpenUnsoldModal = false;

    public ?int $selectedUser = null;

    public ?string $startDate = null;

    public ?string $endedDate = null;

    public function render()
    {
        return view('pages.user.posts.⚡show.show', [
            'posts' => Post::where('user_id', auth()->user()->id)->paginate(4),
            'users' => auth()->user()->receivedMessages()->get(),
        ])->title($this->post->name);
    }
    public function mount($post): void
    {
        $this->post = Post::findOrFail($post);
        $this->form->setPost($this->post);
    }

    #[On ('toggleModal')]
    public function toggleModal(string $modal, $id = ''): void
    {
        if ($modal === 'delete') {
            $this->isOpenDeleteModal = !$this->isOpenDeleteModal;
        }

        if ($modal === 'sold') {
            $this->isOpenSoldModal = !$this->isOpenSoldModal;
        }

        if ($modal === 'rented') {
            $this->isOpenRentedModal = !$this->isOpenRentedModal;
        }

        if ($modal === 'loaned') {
            $this->isOpenLoanedModal= !$this->isOpenLoanedModal;
        }

        if ($modal === 'given') {
            $this->isOpenGivenModal = !$this->isOpenGivenModal;
        }

        if ($modal === 'unsold') {
            $this->isOpenUnsoldModal = !$this->isOpenUnsoldModal;
        }

        $this->isOpenDeleteModal || $this->isOpenSoldModal || $this->isOpenRentedModal || $this->isOpenGivenModal || $this->isOpenLoanedModal || $this->isOpenUnsoldModal ? $this->dispatch('open-modal') : $this->dispatch('close-modal');
        if ($modal === 'delete' || $modal === 'sold' || $modal === 'rented'|| $modal === 'loaned'|| $modal === 'given' || $modal === 'unsold') {
            $this->chosenPost = $id !== '' ? Post::find($id) : '';
        }
    }

    public function delete():void
    {
        $this->chosenPost->delete();
        $this->dispatch('close-modal');
        $this->toggleModal('delete');
        $this->redirect(route('user.posts.index'));
    }

    public function markAsSold():void
    {
        $this->chosenPost->update([
            'sold' => true
        ]);
        Sale::create([
            'post_id' => $this->chosenPost->id,
            'user_id' => $this->selectedUser
        ]);
        $this->dispatch('close-modal');
        $this->toggleModal('sold');
    }

    public function markAsGiven():void
    {
        $this->chosenPost->update([
            'sold' => true
        ]);
        Sale::create([
            'post_id' => $this->chosenPost->id,
            'user_id' => $this->selectedUser
        ]);
        $this->dispatch('close-modal');
        $this->toggleModal('given');
    }

    public function markAsRented():void
    {
        $this->chosenPost->update([
            'sold' => true
        ]);
        Rental::create([
            'post_id' => $this->chosenPost->id,
            'user_id' => $this->selectedUser,
            'start_date' => $this->startDate,
            'end_date' => $this->endedDate
        ]);
        $this->dispatch('close-modal');
        $this->toggleModal('rented');
    }

    public function markAsLoaned():void
    {
        $this->chosenPost->update([
            'sold' => true
        ]);
        Rental::create([
            'post_id' => $this->chosenPost->id,
            'user_id' => $this->selectedUser,
            'start_date' => $this->startDate,
            'end_date' => $this->endedDate
        ]);
        $this->dispatch('close-modal');
        $this->toggleModal('loaned');
    }

    public function markAsUnsold():void
    {
        $this->chosenPost->update([
            'sold' => false
        ]);
        Sale::where('post_id', $this->chosenPost->id)->delete();
        Rental::where('post_id', $this->chosenPost->id)->delete();
        $this->dispatch('close-modal');
        $this->toggleModal('unsold');
    }
};

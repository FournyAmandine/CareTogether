<?php

use App\Enums\UserRole;
use App\Livewire\Forms\CategoryForm;
use App\Livewire\Forms\PostForm;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Post;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

new class extends Component
{
    public $post;
    public $category;
    public CategoryForm $catform;
    public string|Category $chosenCategory = '';

    public string|Notification $openNotification = '';

    public bool $isOpenAddModal = false;
    public bool $isOpenModifyModal = false;
    public bool $isOpenDeleteModal = false;

    public bool $isOpenShowModal = false;

    #[Title('Dashboard')]
    public function render (){

        return view('pages.admin.⚡dashboard.dashboard', [
            'first_name' => auth()->user()->first_name,
            'posts_unsold' => Post::where('posts.sold', 0)->count(),
            'posts_sold' => Post::where('posts.sold', 1)->count(),
            'users' => User::where('role', UserRole::User)->count(),
            'contact_messages' => auth()->user()->contact_messages()->where('read', 0)->count(),
            'categories' => Category::get(),
            'messages' => auth()->user()->contact_messages()->orderByDesc('created_at')->paginate(6),
            'notifications' => auth()->user()->unreadNotifications
        ])->layout('layouts::admin');
    }

    #[On ('toggleModal')]
    public function toggleModal(string $modal, $id = ''): void
    {
        if ($modal === 'delete') {
            $this->isOpenDeleteModal = !$this->isOpenDeleteModal;
        }

        if ($modal === 'modify') {
            $this->isOpenModifyModal = !$this->isOpenModifyModal;
        }

        if ($modal === 'add') {
            $this->isOpenAddModal = !$this->isOpenAddModal;
        }

        if ($modal === 'notif') {
            $this->isOpenShowModal = !$this->isOpenShowModal;
            $this->openNotification = $id !== '' ? Notification::find($id) : '';
        }

        $this->isOpenDeleteModal || $this->isOpenModifyModal || $this->isOpenAddModal || $this->isOpenShowModal ? $this->dispatch('open-modal') : $this->dispatch('close-modal');
        if ($modal === 'delete' || $modal === 'modify' || $modal === 'add') {
            $this->chosenCategory = $id !== '' ? Category::find($id) : '';
        }

        if ($id !== '' && $modal === 'modify' ) {
            $this->catform->setCategory($this->chosenCategory);
        }
    }

    public function delete():void
    {
        $this->chosenCategory->delete();
        $this->dispatch('close-modal');
        $this->toggleModal('delete');
        $this->redirect(route('admin.dashboard'));
    }

    public function modify():void
    {
        $this->chosenCategory->update([
            'name' => $this->catform->name
        ]);
        $this->dispatch('close-modal');
        $this->toggleModal('modify');
        $this->redirect(route('admin.dashboard'));
    }

    public function create():void
    {
        Category::create([
            'name' => $this->catform->name
        ]);
        $this->dispatch('close-modal');
        $this->toggleModal('add');
        $this->redirect(route('admin.dashboard'));
    }

    public function markAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        $this->dispatch('close-modal');
    }
};

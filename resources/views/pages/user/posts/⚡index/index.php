<?php

use App\Enums\PostType;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

new class extends Component
{
    public string $term = '';

    public bool $isOpenFiltersModal = false;

    public $categories = [];

    public $sort = 'date_desc';

    protected $queryString = [
        'term' => ['except' => ''],
        'categories' => ['except' => []],
        'sort' => ['except' => 'date_desc'],
    ];

    #[Title('Vos annonces')]

    public function render()
    {
        $baseQuery = auth()->user()
            ->posts()
            ->with(['registeredByUser', 'category', 'images'])
            ->when($this->term, fn ($q) => $q->where('name', 'like', "%{$this->term}%"))
            ->when($this->categories, fn ($q) => $q->whereIn('category_id', $this->categories));

        $sales = (clone $baseQuery)
            ->whereIn('type', [PostType::Sale, PostType::Donation])
            ->get();

        $rentals = (clone $baseQuery)
            ->whereIn('type', [PostType::Rental, PostType::Loan])
            ->get();

        $categoriesName = Category::get();

        $types = PostType::cases();

        return view('pages.user.posts.⚡index.index', [
            'sales' => $sales,
            'rentals' => $rentals,
            'categories_name' => $categoriesName,
            'types' => $types
        ])->layoutData(['body_class'=>'userPosts']);
    }

    #[On ('toggleModal')]
    public function toggleModal(string $modal): void
    {

        if ($modal === 'filters') {
            $this->isOpenFiltersModal = !$this->isOpenFiltersModal;
        }

        $this->isOpenFiltersModal ? $this->dispatch('open-modal') : $this->dispatch('close-modal');
    }

    public function filters():void
    {
        $this->dispatch('close-modal');
        $this->toggleModal('filters');
        $this->redirect(route('user.posts.index', [
            'term' => $this->term,
            'categories' => $this->categories,
            'sort' => $this->sort,
        ]));
    }

    #[On ('resetFilters')]
    public function resetFilters(): void
    {
        redirect(route('user.posts.index'));
    }
};

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
        $sales = auth()->user()
            ->posts()
            ->with('registeredByUser')
            ->whereIn('posts.type', [PostType::Sale, PostType::Donation])
            ->when($this->term, function ($term) {
                $term->where('name', 'like', "%{$this->term}%");
            })
            ->when($this->categories, function ($category) {
                $category->whereIn('category_id', $this->categories);
            })
            ->when($this->sort, function ($sort) {
                match ($this->sort) {
                    'date_asc' => $sort->orderBy('created_at', 'asc'),
                    'date_desc' => $sort->orderBy('created_at', 'desc'),
                    'price_asc' => $sort->orderBy('price', 'asc'),
                    'price_desc' => $sort->orderBy('price', 'desc'),
                    default => $sort->latest(),
                };
            })
            ->orderByDesc('created_at')
            ->get();

        $sales->load(['sales', 'registeredByUser', 'category']);

        $rentals = auth()->user()
            ->posts()
            ->with('registeredByUser')
            ->whereIn('posts.type', [PostType::Rental, PostType::Loan])
            ->when($this->term, function ($term) {
                $term->where('name', 'like', "%{$this->term}%");
            })
            ->when($this->categories, function ($category) {
                $category->whereIn('category_id', $this->categories);
            })
            ->when($this->sort, function ($sort) {
                match ($this->sort) {
                    'date_asc' => $sort->orderBy('created_at', 'asc'),
                    'date_desc' => $sort->orderBy('created_at', 'desc'),
                    'price_asc' => $sort->orderBy('price', 'asc'),
                    'price_desc' => $sort->orderBy('price', 'desc'),
                    default => $sort->latest(),
                };
            })
            ->orderByDesc('created_at')
            ->get();

        $rentals->load(['rentals', 'registeredByUser', 'category']);

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

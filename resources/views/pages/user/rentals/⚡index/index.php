<?php

use App\Enums\PostType;
use App\Livewire\Forms\MessageForm;
use App\Livewire\Forms\PostForm;
use App\Models\Category;
use App\Models\Message;
use App\Models\Post;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

new class extends Component
{
    public string $term = '';

    public bool $isOpenFiltersModal = false;

    public $categories = [];

    public $types = [];

    public $sort = 'date_desc';

    protected $queryString = [
        'term' => ['except' => ''],
        'categories' => ['except' => []],
        'sort' => ['except' => 'date_desc'],
    ];
    #[Title('Vos locations/prêts')]

    public function render()
    {
        $categoriesName = Category::get();

        $currentRentals = auth()->user()
            ->rentals()
            ->where('rentals.end_date', '>', Carbon::now())
            ->when($this->term, function ($term) {
                $term->whereHas('post', function ($post) {
                    $post->where('name', 'like', "%{$this->term}%");
                });
            })
            ->when($this->categories, function ($category) {
                $category->whereHas('post', function ($post) {
                    $post->whereIn('category_id', $this->categories);
                });
            })
            ->when($this->sort, function ($sort) {
                match ($this->sort) {
                    'date_asc' => $sort->orderBy('created_at', 'asc'),
                    'date_desc' => $sort->orderBy('created_at', 'desc'),
                    'price_asc' => $sort->orderBy(
                        Post::select('price')
                            ->whereColumn('posts.id', 'rentals.post_id'),
                        'asc'
                    ),

                    'price_desc' => $sort->orderBy(
                        Post::select('price')
                            ->whereColumn('posts.id', 'rentals.post_id'),
                        'desc'
                    ),
                    default => $sort->latest(),
                };
            })
            ->get();

        $endedRentals = auth()->user()
            ->rentals()
            ->where('rentals.end_date', '<', Carbon::now())
            ->when($this->term, function ($term) {
                $term->whereHas('post', function ($post) {
                    $post->where('name', 'like', "%{$this->term}%");
                });
            })
            ->when($this->categories, function ($category) {
                $category->whereHas('post', function ($post) {
                    $post->whereIn('category_id', $this->categories);
                });
            })
            ->when($this->types, function ($type) {
                $type->whereHas('post', function ($post) {
                    $post->whereIn('type', $this->types);
                });
            })
            ->when($this->sort, function ($sort) {
                match ($this->sort) {
                    'date_asc' => $sort->orderBy('created_at', 'asc'),
                    'date_desc' => $sort->orderBy('created_at', 'desc'),
                    'price_asc' => $sort->orderBy(
                        Post::select('price')
                            ->whereColumn('posts.id', 'rentals.post_id'),
                        'asc'
                    ),

                    'price_desc' => $sort->orderBy(
                        Post::select('price')
                            ->whereColumn('posts.id', 'rentals.post_id'),
                        'desc'
                    ),
                    default => $sort->latest(),
                };
            })
            ->get();

        return view('pages.user.rentals.⚡index.index', [
            'current_rentals' => $currentRentals,
            'ended_rentals' => $endedRentals,
            'categories_name' => $categoriesName,
        ]);
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
        $this->redirect(route('user.rentals.index', [
            'term' => $this->term,
            'categories' => $this->categories,
            'sort' => $this->sort,
        ]));
    }

    #[On ('resetFilters')]
    public function resetFilters(): void
    {
        redirect(route('user.rentals.index'));
    }
};

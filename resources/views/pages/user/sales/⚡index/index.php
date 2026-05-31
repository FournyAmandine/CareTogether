<?php

use App\Enums\PostType;
use App\Models\Category;
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

    public $sort = 'date_desc';

    protected $queryString = [
        'term' => ['except' => ''],
        'categories' => ['except' => []],
        'sort' => ['except' => 'date_desc'],
    ];
    #[Title('Vos achats/dons')]

    public function render()
    {
        $categoriesName = Category::get();

        $sales = auth()->user()
            ->sales()
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
                            ->whereColumn('posts.id', 'sales.post_id'),
                        'asc'
                    ),

                    'price_desc' => $sort->orderBy(
                        Post::select('price')
                            ->whereColumn('posts.id', 'sales.post_id'),
                        'desc'
                    ),
                    default => $sort->latest(),
                };
            })
            ->get();

        return view('pages.user.sales.⚡index.index', [
            'sales' => $sales,
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
        $this->redirect(route('user.sales.index', [
            'categories' => $this->categories,
            'term' => $this->term,
            'sort' => $this->sort,
        ]));
    }


    #[On ('resetFilters')]
    public function resetFilters(): void
    {
       redirect(route('user.sales.index'));
    }
};

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

        public array $categories = [];

        public array $types = [];

        public string $sort = 'date_desc';

        protected $queryString = [
            'term' => ['except' => ''],
            'categories' => ['except' => []],
            'types' => ['except' => []],
            'sort' => ['except' => 'date_desc'],
        ];

        #[Title('Vos annonces enregistrées')]

        public function render()
        {
            $categoriesName = Category::get();

            $typesName = PostType::cases();

            $posts = auth()->user()
                ->registered_posts()
                ->when($this->term, function ($term) {
                    $term->where('name', 'like', "%{$this->term}%");
                })
                ->when($this->categories, function ($category) {
                    $category->whereIn('category_id', $this->categories);
                })
                ->when($this->types, function ($type) {
                    $type->whereIn('type', $this->types);
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

            return view('pages.user.registered.⚡index.index', [
                'registered_posts' => $posts,
                'categories_name' => $categoriesName,
                'types_name' => $typesName
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
            $this->redirect(route('user.registered.index',
                [
                'term' => $this->term,
                'categories' => $this->categories,
                'types' => $this->types,
                'sort' => $this->sort,
            ]));
        }

        #[On ('resetFilters')]
        public function resetFilters(): void
        {
            redirect(route('user.registered.index'));
        }
    };

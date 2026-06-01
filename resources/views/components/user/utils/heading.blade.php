    @props(['title', 'button' => false, 'post'=>'', 'text'=>'', 'categories' => '', 'types' => '', 'route', 'modifier' =>'user'])

    <section class="heading">
        <x-utils.deco modifier="{!! $modifier !!}"/>
        <div class="wrapper wrapper--small">
            @if(str_contains($title, 'Votre annonce'))
                {{ Breadcrumbs::render('user.posts.show', $post) }}
            @elseif(str_contains($title, 'Modifier'))
                {{ Breadcrumbs::render('user.posts.edit', $post) }}
            @else
                {{ Breadcrumbs::render() }}
            @endif
            <h2 class="maintitle maintitle--blue heading__title">
                {!! $title !!}
            </h2>
            <p class="heading__text">
                {!! $text !!}
            </p>
            <div class="heading__actions">
                @if($button)
                    <x-utils.link href="{!! route('user.posts.create') !!}"
                                  classButton="button button--red" label="Ajouter une annonce"
                                  title="Aller sur la page d'ajout d'une annonce" svg="add" name_parent="heading__actions"
                    />
                @endif

                @if($categories)
                <div class="filters">
                    <x-utils.search name_parent="filters" route="{!! $route !!}" wire:model="term"/>
                    <x-utils.button-text wire:click="toggleModal('filters')" id="filtersUser" name_parent="filters" title="Ouvrir les filtres" classButton="button button--blue" text="Filtrer"/>
                    @if (request()->filled('term') ||!empty(request('types')) ||!empty(request('categories')) ||(request('sort') && request('sort') !== 'date_desc'))
                        <x-utils.button-text wire:click="resetFilters()" name_parent="filters" title="Supprimer les filtres" classButton="button button--border" text="Supprimer les filtres"/>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </section>

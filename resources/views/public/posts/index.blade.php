    <x-public.app>
        <x-slot:title_page>
            Annonces
        </x-slot:title_page>
        <main class="postsPage">

            <section class="posts">
                <x-utils.deco/>
                <div class="wrapper">
                    <h2 class="maintitle maintitle--blue posts__title">
                        Découvrez toutes nos annonces
                    </h2>

                    <div class="filters">
                        <x-utils.search name_parent="filters"/>
                        <x-utils.button-text id="filters" name_parent="filters" title="Ouvrir les filtres" classButton="button button--blue" text="Filtrer"/>
                        @if($term || $category || $type || $sort)
                            <x-utils.link wire:click="resetFilters()" name_parent="filters" href="{!! route('public.posts.index') !!}" title="Supprimer les filtres" classButton="button button--border" label="Supprimer les filtres"/>
                        @endif

                        <form id="filtersForm" class="filters__form hidden" method="GET" action="{{ route('public.posts.index') }}">

                            <di>
                                <span class="maintitle maintitle--blue maintitle--small filters__form__text">
                                Filtrer les annonces
                            </span>

                                <fieldset class="filters__form__fieldset">
                                    <legend class="filters__form__fieldset__legend">
                                        Catégories
                                    </legend>

                                    @foreach($categories as $category)
                                        <div class="filters__form__fieldset__checkbox">
                                            <label for="{{$category->id}}" class="filters__form__fieldset__checkbox__label">
                                                <input id="{{$category->id}}" class="filters__form__fieldset__checkbox__label__input" type="checkbox"
                                                       name="categories[]" value="{{$category->id}}"
                                                    @checked(in_array($category->id,request('categories', [])))
                                                >
                                                <span class="filters__form__fieldset__checkbox__label__text">
                                                {!! $category->name !!}
                                                <svg class="filters__form__fieldset__checkbox__label__text__icon">
                                                    <use xlink:href="{{ asset('assets/img/svg/sprite.svg#' . Str::slug($category->name, '_')) }}"></use>
                                                </svg>
                                            </span>
                                            </label>
                                        </div>
                                    @endforeach
                                </fieldset>

                                <fieldset class="filters__form__fieldset">
                                    <legend class="filters__form__fieldset__legend">
                                        Types d'annonce
                                    </legend>

                                    @foreach($types as $type)
                                        <div class="filters__form__fieldset__checkbox">
                                            <label class="filters__form__fieldset__checkbox__label">
                                                <input class="filters__form__fieldset__checkbox__label__input" type="checkbox"
                                                       name="types[]" value="{!! Str::slug($type->value, '_') !!}"
                                                    @checked(in_array(Str::slug($type->value, '_'),request('types', [])))
                                                >
                                                <span class="filters__form__fieldset__checkbox__label__text">{!! $type->value !!}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                </fieldset>
                            </di>
                            <div>
                                <span class="maintitle maintitle--blue maintitle--small filters__form__text">
                                Trier les annonces
                            </span>

                                <label class="filters__form__label" for="sort">Sélectionnez un tri</label>
                                <select id="sort" class="filters__form__sort" name="sort">
                                    <option class="filters__form__sort__option" @selected(request('sort') === 'date_desc') value="date_desc">Plus récentes</option>
                                    <option class="filters__form__sort__option" @selected(request('sort') === 'date_asc') value="date_asc">Plus anciennes</option>
                                    <option class="filters__form__sort__option" @selected(request('sort') === 'price_asc') value="price_asc">Prix croissant</option>
                                    <option class="filters__form__sort__option" @selected(request('sort') === 'price_desc') value="price_desc">Prix décroissant</option>
                                </select>

                                <div class="filters__form__buttons">
                                    <x-user.form.buttons.button text="Appliquer" name_parent="filters__form__buttons" class_button="button--red"/>
                                </div>
                            </div>
                        </form>
                    </div>

                    <x-utils.listing-cards :posts="$posts" :registered-post-ids="$registeredPostIds"/>

                    <div class="posts__pagination">
                        {{ $posts->onEachSide(1)->links() }}
                    </div>
                </div>
            </section>
        </main>
    </x-public.app>

<main class="postsPage">
    <x-user.utils.heading :category="$categories" :sort="$sort" :term="$term" title="Vos annonces" :button="true" route="{!! route('user.posts.index') !!}" :categories="$categories_name"/>

    <x-user.utils.deco/>

    @if($isOpenFiltersModal)
        <x-user.modal.modal modifier="filters" outside="">
            <x-slot:content>
                <form class="filters__form" tabindex="0" wire:submit.prevent="filters" action="{{ route('user.posts.index') }}">

                    <div>
                            <span class="maintitle maintitle--blue maintitle--small filters__form__text">
                                Filtrer les annonces
                            </span>

                        <fieldset class="filters__form__fieldset">
                            <legend class="filters__form__fieldset__legend">
                                Catégories
                            </legend>

                            @foreach($categories_name as $category)
                                <div class="filters__form__fieldset__checkbox">
                                    <label for="{{$category->id}}" class="filters__form__fieldset__checkbox__label">
                                        <input wire:model.live="categories" id="{{$category->id}}" class="filters__form__fieldset__checkbox__label__input" type="checkbox" value="{{$category->id}}"
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
                    </div>
                    <div>
                            <span class="maintitle maintitle--blue maintitle--small filters__form__text">
                                Trier les annonces
                            </span>

                        <label class="filters__form__label" for="sort">Sélectionnez un tri</label>
                        <select wire:model.live="sort" id="sort" class="filters__form__sort" name="sort">
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
            </x-slot:content>
        </x-user.modal.modal>
    @endif

    <section class="posts">
        <div class="wrapper wrapper--small">
            <h3 class="posts__title">
                Ventes/dons
            </h3>
            <div class="posts__sliderContainer">
                <x-utils.button name_parent="posts__sliderContainer" svg="arrow-simple" title="Voir les annonces précédentes" classButton="button button--icon button--icon button--arrow button--arrow--left js-sale-prev"/>
                <div class="posts__sliderContainer__slider posts__sliderContainer__slider--sale">
                    @foreach($sales as $sale)
                        @php
                            $image = $sale->images()->first();
                        @endphp
                        <x-user.utils.post-card title="{{ $sale->name }}" type="{{ $sale->type }}"
                                                svg="{!! Str::slug($sale->category->name, '_')!!}"
                                                price="{{ $sale->price }}" locality="{{ $sale->locality }}"
                                                state="{{ $sale->state }}" modifier="post"
                                                imgSrc="{{ $image?->img_path
                                                    ? (Str::startsWith($image->img_path, 'assets')
                                                        ? asset($image->img_path)
                                                        : asset('storage/photos/posts/originals/' . $image->img_path))
                                                    : asset('assets/img/post-image.jpg') }}"
                                                src="{!! route('user.posts.show', $sale->id) !!}" sold="{{$sale->sold}}"
                                                views="{{ $sale->views }}" registered="{!! $sale->registeredByUser->count() !!}"/>
                    @endforeach
                </div>
                <x-utils.button name_parent="posts__sliderContainer" svg="arrow-simple" title="Voir les annonces suivantes" classButton="button button--icon button--arrow js-sale-next"/>
                <div class="slider--dots slider--dots-sales"></div>
                @if($sales->isEmpty())
                    <x-user.utils.empty text="Il n'y a aucune annonce pour le moment"
                                        label="Ajouter une annonce" href="{!! route('user.posts.create') !!}" title="Aller sur la page d'ajout d'une annonce"/>
                @endif
            </div>
        </div>
    </section>

    <section class="posts">
        <div class="wrapper wrapper--small">
            <h3 class="posts__title">
                Locations/prêts
            </h3>
            <div class="posts__sliderContainer">
                <x-utils.button name_parent="posts__sliderContainer" svg="arrow-simple" title="Voir les annonces précédentes" classButton="button button--icon button--icon button--arrow button--arrow--left js-rental-prev"/>
                <div class="posts__sliderContainer__slider posts__sliderContainer__slider--rental">
                @foreach($rentals as $rental)
                    @php
                        $image = $rental->images()->first();
                    @endphp
                    <x-user.utils.post-card title="{{ $rental->name }}" type="{{ $rental->type }}"
                                            svg="{!! Str::slug($rental->category->name, '_')!!}"
                                            price="{{ $rental->price }}" locality="{{ $rental->locality }}"
                                            state="{{ $rental->state }}" modifier="post"
                                            imgSrc="{{ $image?->img_path
                                                    ? (Str::startsWith($image->img_path, 'assets')
                                                        ? asset($image->img_path)
                                                        : asset('storage/photos/posts/originals/' . $image->img_path))
                                                    : asset('assets/img/post-image.jpg') }}"
                                            src="{!! route('user.posts.show', $rental->id) !!}" sold="{{$rental->sold}}"
                                            views="{{ $rental->views }}" registered="{{ $rental->registeredByUser->count() }}"/>
                @endforeach
                </div>
                <x-utils.button name_parent="posts__sliderContainer" svg="arrow-simple" title="Voir les annonces suivantes" classButton="button button--icon button--arrow js-rental-next"/>
                <div class="slider--dots slider--dots-rentals"></div>
                @if($rentals->isEmpty())
                    <x-user.utils.empty text="Il n'y a aucune annonce pour le moment"
                                        label="Ajouter une annonce" href="#" title="Aller sur la page d'ajout d'une annonce"/>
                @endif
            </div>
        </div>
    </section>
</main>

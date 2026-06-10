<main class="rentalsPage">

    <x-user.utils.heading text="Ayez une vue d'ensemble sur les articles que l'on vous a loués ou prêtés" title="Vos locations et prêts" route="{{ route('user.rentals.index') }}" :categories="$categories_name"/>

    <x-user.utils.deco/>

    @if($isOpenFiltersModal)
        <x-user.modal.modal modifier="filters" outside="">
            <x-slot:content>
                <form class="filters__form" wire:submit.prevent="filters" action="{{ route('user.rentals.index') }}">

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
                                        <input wire:model.live="categories" id="{{$category->id}}" class="filters__form__fieldset__checkbox__label__input" type="checkbox"
                                               value="{{$category->id}}"
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

    <section class="rentals">
        <div class="wrapper wrapper--small">
            <h3 class="rentals__title">
                En cours
            </h3>
            <div class="rentals__sliderContainer">
                <x-utils.button name_parent="rentals__sliderContainer" svg="arrow-simple" title="Voir les annonces précédentes" classButton="button button--icon button--icon button--arrow button--arrow--left js-current-prev"/>
                <div class="rentals__sliderContainer__slider rentals__sliderContainer__slider--current">
                @foreach($current_rentals as $current_rental)
                        @php
                            $image = $current_rental->post->images->first();
                        @endphp
                    <x-user.utils.rental-card title="{{ $current_rental->post->name }}"
                                              svg="{{ Str::slug($current_rental->post->category->name, '_')}}"
                                              date="{{ \Carbon\Carbon::parse($current_rental->end_date)->locale('fr')->translatedFormat('d F Y')  }}"
                                              price="{{ $current_rental->post->price }}"
                                              imgSrc="{{ $image?->img_path
                                                    ? (Str::startsWith($image->img_path, 'assets')
                                                        ? asset($image->img_path)
                                                        : asset('storage/photos/posts/originals/' . $image->img_path))
                                                    : asset('assets/img/post-image.jpg') }}"/>
                @endforeach
                </div>
                <x-utils.button name_parent="rentals__sliderContainer" svg="arrow-simple" title="Voir les annonces suivantes" classButton="button button--icon button--arrow js-current-next"/>
                <div class="slider--dots slider--dots-currentRentals"></div>
                @if($current_rentals->isEmpty())
                    <x-user.utils.empty text="Il n'y a aucune location en cours pour le moment"
                                        label="Voir toutes les annonces" href="{!! route('public.posts.index') !!}" title="Aller sur la page avec les annonces"/>
                @endif
            </div>
        </div>
        </div>
    </section>

    <section class="rentals rentals--ended">
        <div class="wrapper wrapper--small">
            <h3 class="rentals__title">
                Terminés
            </h3>
            <div class="rentals__sliderContainer">
                <x-utils.button name_parent="rentals__sliderContainer" svg="arrow-simple" title="Voir les annonces précédentes" classButton="button button--icon button--icon button--arrow button--arrow--left js-ended-prev"/>
                <div class="rentals__sliderContainer__slider rentals__sliderContainer__slider--ended">
                @foreach($ended_rentals as $ended_rental)
                        @php
                            $image = $ended_rental->post->images->first();
                        @endphp
                    <x-user.utils.rental-card title="{{ $ended_rental->post->name }}"
                                              svg="{{ Str::slug($ended_rental->post->category->name, '_')}}"
                                              price="{{ $ended_rental->post->price }}"
                                              imgSrc="{{ $image?->img_path
                                                    ? (Str::startsWith($image->img_path, 'assets')
                                                        ? asset($image->img_path)
                                                        : asset('storage/photos/posts/originals/' . $image->img_path))
                                                    : asset('assets/img/post-image.jpg') }}"/>
                @endforeach
            </div>
            <x-utils.button name_parent="rentals__sliderContainer" svg="arrow-simple" title="Voir les annonces suivantes" classButton="button button--icon button--arrow js-ended-next"/>
                <div class="slider--dots slider--dots-endedRentals"></div>
            @if($ended_rentals->isEmpty())
                <x-user.utils.empty text="Il n'y a aucune location terminée pour le moment"
                                    label="Voir toutes les annonces" href="{!! route('public.posts.index') !!}" title="Aller sur la page avec les annonces"/>
            @endif
            </div>
        </div>
    </section>
</main>

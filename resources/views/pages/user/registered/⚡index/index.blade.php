<main class="registeredPage">

    <x-user.utils.heading title="Vos annonces enregistrées" route="{{ route('user.registered.index') }}" :categories="$categories_name" :types="$types"/>

    <x-user.utils.deco/>

    @if($isOpenFiltersModal)
        <x-user.modal.modal modifier="filters" outside="">
            <x-slot:content>
                <form class="filters__form" wire:submit.prevent="filters" action="{{ route('user.registered.index') }}">

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
                                                    {{ $category->name }}
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

                            @foreach($types_name as $type)
                                <div class="filters__form__fieldset__checkbox">
                                    <label class="filters__form__fieldset__checkbox__label">
                                        <input wire:model.live="types" class="filters__form__fieldset__checkbox__label__input" type="checkbox"
                                               value="{{ Str::slug($type->value, '_') }}"
                                            @checked(in_array(Str::slug($type->value, '_'),request('types', [])))
                                        >
                                        <span class="filters__form__fieldset__checkbox__label__text">{!! $type->value !!}</span>
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

    <section class="registered">
        <div class="wrapper wrapper--small">
            <div class="registered__sliderContainer">
                <x-utils.button name_parent="registered__sliderContainer" svg="arrow-simple" title="Voir les annonces précédentes" classButton="button button--icon button--icon button--arrow button--arrow--left js-registered-prev"/>
                <div class="registered__sliderContainer__slider">
                @foreach($registered_posts as $registered_post)
                        @php
                            $image = $registered_post->images->first();
                        @endphp
                    <x-utils.card title="{{ $registered_post->name }}" type="{{ $registered_post->type }}"
                                            svg="{{ Str::slug($registered_post->category->name, '_')}}" :post="$registered_post"
                                            price="{{ $registered_post->price }}" locality="{{ $registered_post->locality }}"
                                            state="{{ $registered_post->state }}" modifier="registered" :registered-post-ids="$registerPost"
                                            imgSrc="{{ $image?->img_path
                                                    ? (Str::startsWith($image->img_path, 'assets')
                                                        ? asset($image->img_path)
                                                        : asset('storage/photos/posts/originals/' . $image->img_path))
                                                    : asset('assets/img/post-image.jpg') }}"
                                            src="{{ route('public.posts.show', $registered_post->id) }}"/>
                @endforeach
                </div>
                <x-utils.button name_parent="registered__sliderContainer" svg="arrow-simple" title="Voir les annonces suivantes" classButton="button button--icon button--arrow js-registered-next"/>
                <div class="slider--dots slider--dots-registered"></div>
                @if($registered_posts->isEmpty())
                    <x-user.utils.empty text="Il n'y a aucune annonce enregistrée pour le moment"
                                        label="Voir toutes les annonces" href="{!! route('public.posts.index') !!}" title="Aller sur la page avec les annonces"/>
                @endif
            </div>
        </div>
    </section>
</main>

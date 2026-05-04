@props(['title', 'locality', 'state', 'price', 'imgSrc'])


<article class="card-post posts__listing__item">
    <svg class="card-post__iconType">
        <use xlink:href="{{ asset('assets/img/svg/sprite.svg#mobilite') }}"></use>
    </svg>
    <div class="card-post__imgContainer">
        <img class="card-post__imgContainer__img" src="{!! $imgSrc !!}" alt="Photo du produit {!! $title !!}">
    </div>
    <div class="card-post__contentContainer">
        <h3 class="card-post__contentContainer__title">
            {!! $title !!}
        </h3>
        <div class="card-post__contentContainer__info">
            <svg class="card-post__contentContainer__info__icon">
                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#map-pin') }}"></use>
            </svg>
            <span class="card-post__contentContainer__info__text">
                {!! $locality !!}
            </span>
        </div>
        <div class="card-post__contentContainer__info">
            <svg class="card-post__contentContainer__info__icon">
                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#state') }}"></use>
            </svg>
            <span class="card-post__contentContainer__info__text">
                {!! $state !!}
            </span>
        </div>
        <span class="card-post__contentContainer__price">
            {!! $price !!}€
        </span>

        <div class="card-post__contentContainer__navigation">
            <x-public.utils.link name_parent="card-post__contentContainer__navigation"
                                 title="Aller vers la page détail du produit" label="Découvrir l’article"
                                 href="#" class-button="button--post">
                <x-slot:svg>
                    <svg class="card-post__contentContainer__navigation__buttonContainer__button__icon">
                        <use xlink:href="{{ asset('assets/img/svg/sprite.svg#arrow-simple') }}"></use>
                    </svg>
                </x-slot:svg>
            </x-public.utils.link>
            <div class="card-post__contentContainer__navigation__buttons">
                <button class="card-post__contentContainer__navigation__buttons__button">
                    <svg class="card-post__contentContainer__navigation__buttons__button__icon">
                        <use xlink:href="{{ asset('assets/img/svg/sprite.svg#share') }}"></use>
                    </svg>
                </button>
                <button class="card-post__contentContainer__navigation__buttons__button">
                    <svg class="card-post__contentContainer__navigation__buttons__button__icon">
                        <use xlink:href="{{ asset('assets/img/svg/sprite.svg#register') }}"></use>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</article>

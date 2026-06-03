@props(['title', 'locality', 'state', 'price', 'imgSrc', 'svg', 'src', 'modifier'=>'', 'type', 'views', 'registered', 'sold' => 0])


<article class="card-post card-post--{!! $modifier !!} posts__listing__item">
    <a class="card-post__link" href="{!! $src !!}" title="Voir cette annonce : {!! $title !!}">
        <div class="card-post__link__iconContainer">
            <svg class="card-post__link__iconContainer__icon">
                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#' . $svg) }}"></use>
            </svg>
        </div>

        <div class="card-post__link__imgContainer">
            <img class="card-post__link__imgContainer__img" src="{!! $imgSrc !!}" alt="Photo du produit {!! $title !!}">
        </div>

        <div class="card-post__link__contentContainer">
            @if($sold == 1)
                <div class="card-post__link__contentContainer__sold">
                    <span class="card-post__link__contentContainer__sold__text">
                        @if($type == \App\Enums\PostType::Sale->value)
                            vendu
                        @elseif($type == \App\Enums\PostType::Donation->value)
                            donné
                        @elseif($type == \App\Enums\PostType::Rental->value)
                            loué
                        @elseif($type == \App\Enums\PostType::Loan->value)
                            prêté
                        @endif
                    </span>
                </div>
            @endif
            <h3 class="card-post__link__contentContainer__title">
                {!! $title !!}
            </h3>
            <div class="card-post__link__contentContainer__info">
                <svg class="card-post__link__contentContainer__info__icon">
                    <use xlink:href="{{ asset('assets/img/svg/sprite.svg#view') }}"></use>
                </svg>
                <span class="card-post__link__contentContainer__info__text">
                    {!! $views!!} vues
                </span>
            </div>
            <div class="card-post__link__contentContainer__info">
                <svg class="card-post__link__contentContainer__info__icon">
                    <use xlink:href="{{ asset('assets/img/svg/sprite.svg#state') }}"></use>
                </svg>
                <span class="card-post__link__contentContainer__info__text">
                    {!! $state !!}
                </span>
            </div>
            <span class="card-post__link__contentContainer__price">
                @if($type == \App\Enums\PostType::Sale->value)
                    {!! $price !!}€
                @elseif($type == \App\Enums\PostType::Donation->value)
                    Don
                @elseif($type == \App\Enums\PostType::Rental->value)
                    {!! $price !!}€/mois
                @elseif($type == \App\Enums\PostType::Loan->value)
                    Prêt
                @endif
            </span>

            <div class="card-post__link__contentContainer__navigation">
                <span class="button button--post card-post__link__contentContainer__navigation__button">
                    <svg class="card-post__link__contentContainer__navigation__button__icon">
                        <use xlink:href="{{ asset('assets/img/svg/sprite.svg#arrow-simple') }}"></use>
                    </svg>
                    Voir votre annonce
                </span>
            </div>
            <div class="card-post__link__contentContainer__registered">
                    <svg class="card-post__link__contentContainer__registered__icon">
                        <use xlink:href="{{ asset('assets/img/svg/sprite.svg#register') }}"></use>
                    </svg>
                    {!! $registered !!}
            </div>
        </div>
    </a>


</article>

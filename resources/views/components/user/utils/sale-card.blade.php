@props(['title', 'date' => '', 'price', 'imgSrc', 'svg'])


<article class="card-post card-post--rental posts__listing__item" tabindex="0">
    <div class="card-post__container">
        <div class="card-post__container__iconContainer">
            <svg class="card-post__container__iconContainer__icon">
                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#' . $svg) }}"></use>
            </svg>
        </div>

        <div class="card-post__container__imgContainer">
            <img class="card-post__container__imgContainer__img" src="{!! $imgSrc !!}" alt="Photo du produit {!! $title !!}">
        </div>

        <div class="card-post__container__contentContainer">
            <h3 class="card-post__container__contentContainer__title">
                {!! $title !!}
            </h3>
            <span class="card-post__container__contentContainer__price">
            {!! $price !!}€/mois
            </span>
        </div>
    </div>


</article>

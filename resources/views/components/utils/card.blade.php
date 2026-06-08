@props(['title', 'locality', 'state', 'price', 'imgSrc', 'svg', 'src', 'modifier'=>'', 'type', 'post', 'registeredPostIds', 'delay' => ''])


<article class="card-post card-post--{!! $modifier !!} posts__listing__item" itemscope itemtype="https://schema.org/Product" @if($delay) data-aos="fade-right" data-aos-delay="{!! 150*$delay !!}" data-aos-duration="500" @endif>
    <a class="card-post__link" href="{!! $src !!}" title="Voir cette annonce : {!! $title !!}" itemprop="url"></a>
        <div class="card-post__link__iconContainer" itemprop="category">
            <svg class="card-post__link__iconContainer__icon">
                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#' . $svg) }}"></use>
            </svg>
        </div>
        <div class="card-post__link__imgContainer">
            <img class="card-post__link__imgContainer__img" src="{!! $imgSrc !!}" alt="Photo du produit {!! $title !!}" itemprop="image">
        </div>

        <div class="card-post__link__contentContainer">
            <h3 class="card-post__link__contentContainer__title" itemprop="name">
                {!! $title !!}
            </h3>
            <div class="card-post__link__contentContainer__info">
                <svg class="card-post__link__contentContainer__info__icon">
                    <use xlink:href="{{ asset('assets/img/svg/sprite.svg#map-pin') }}"></use>
                </svg>
                <span class="card-post__link__contentContainer__info__text" itemprop="displayLocation">
                {!! $locality !!}
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
            <span class="card-post__link__contentContainer__price" itemprop="offers">
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
                <svg class="card-post__link__contentContainer__navigation__buttonContainer__button__icon">
                    <use xlink:href="{{ asset('assets/img/svg/sprite.svg#arrow-simple') }}"></use>
                </svg>
                Découvrir l’article
            </span>
                <div class="card-post__link__contentContainer__navigation__buttons">
                    @if(in_array($post->id, $registeredPostIds))
                        <form action="{{ route('public.posts.unregister', $post) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button aria-labelledby="deleteRegister-{{ $post->id }}" type="submit" class="card-post__link__contentContainer__navigation__buttons__button">
                                <span id="deleteRegister-{{ $post->id }}" class="sro">Supprimer cette annonce des enregistrées</span>
                                <svg class="card-post__link__contentContainer__navigation__buttons__button__icon">
                                    <use xlink:href="{{ asset('assets/img/svg/sprite.svg#registered_fill') }}"></use>
                                </svg>
                            </button>
                        </form>
                    @else
                        <form action="{{ route('public.posts.register', $post) }}" method="POST">
                            @csrf
                            <button aria-labelledby="addRegister-{{ $post->id }}" type="submit" class="card-post__link__contentContainer__navigation__buttons__button">
                                <span id="deleteRegister-{{ $post->id }}" class="sro">Enregistrer cette annonce</span>
                                <svg class="card-post__link__contentContainer__navigation__buttons__button__icon">
                                    <use xlink:href="{{ asset('assets/img/svg/sprite.svg#register') }}"></use>
                                </svg>
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>

</article>

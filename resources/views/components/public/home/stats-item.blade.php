@props(['svg', 'title', 'text'])

<div class="stats__listing__item">
    <div class="stats__listing__item__titleContainer">
        @if($svg)
            <svg class="stats__listing__item__titleContainer__icon">
                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#' . $svg) }}"></use>
            </svg>
        @endif
        <h3 class="stats__listing__item__titleContainer__title">
            {!! $title !!}
        </h3>
    </div>
    <p class="stats__listing__item__text">
        {!! $text !!}
    </p>
</div>

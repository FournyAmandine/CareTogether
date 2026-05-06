@props(['number', 'title', 'text'])

<div class="steps__listing__item">
    <svg class="steps__listing__item__icon">
        <use xlink:href="{{ asset('assets/img/svg/sprite.svg#home-steps-deco') }}"></use>
    </svg>
    <span class="steps__listing__item__number">
        {!! $number !!}
    </span>
    <div class="steps__listing__item__contentContainer">
        <h3 class="maintitle maintitle--blue steps__listing__item__contentContainer__title">
            {!! $title !!}
        </h3>
        <p class="steps__listing__item__contentContainer__content">
            {!! $text !!}
        </p>
    </div>
</div>

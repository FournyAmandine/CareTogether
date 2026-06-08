@props(['svg', 'title', 'text'])

<div class="stats__listing__item" data-aos="fade-right" data-aos-delay="300" data-aos-duration="500">
    <div class="stats__listing__item__titleContainer">
        @if($svg)
            <svg class="stats__listing__item__titleContainer__icon" data-aos="fade-down" data-aos-delay="800" data-aos-duration="500">
                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#' . $svg) }}"></use>
            </svg>
        @endif
        <p class="stats__listing__item__titleContainer__title" data-aos="fade-right" data-aos-delay="550" data-aos-duration="500">
            {!! $title !!}
        </p>
    </div>
    <p class="stats__listing__item__text" data-aos="fade-right" data-aos-delay="700" data-aos-duration="500">
        {!! $text !!}
    </p>
</div>

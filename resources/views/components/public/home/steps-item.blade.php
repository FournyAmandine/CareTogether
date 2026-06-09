@props(['number', 'title', 'text', 'loop'])

<div class="steps__listing__item">
    <svg class="steps__listing__item__icon">
        <use xlink:href="{{ asset('assets/img/svg/sprite.svg#home-steps-deco') }}"></use>
    </svg>
    <span class="steps__listing__item__number" data-aos="fade-right" data-aos-delay="{{ $loop * 200 }}" data-aos-duration="500">
        {!! $number !!}
    </span>
    <div class="steps__listing__item__contentContainer">
        <h3 class="maintitle maintitle--blue steps__listing__item__contentContainer__title" data-aos="fade-right" data-aos-delay="{{ $loop * 300 }}" data-aos-duration="500">
            {!! $title !!}
        </h3>
        <p class="steps__listing__item__contentContainer__content" data-aos="fade-right" data-aos-delay="{{ $loop * 350 }}" data-aos-duration="500">
            {!! $text !!}
        </p>
    </div>
</div>

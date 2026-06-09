@props(['svg', 'title', 'delay'])

<div class="objectifs__listing__item" data-aos="fade-right" data-aos-delay="{{$delay*200}}" data-aos-duration="500">
    @if($svg)
        <svg class="objectifs__listing__item__icon" data-aos="fade-down" data-aos-delay="{{$delay*300}}" data-aos-duration="500">
            <use xlink:href="{{ asset('assets/img/svg/sprite.svg#' . $svg) }}"></use>
        </svg>
    @endif
    <h3 class="maintitle maintitle--blue maintitle--small objectifs__listing__item__title" data-aos="fade-right" data-aos-delay="{{$delay*250}}" data-aos-duration="500">
        {!! $title !!}
    </h3>
</div>

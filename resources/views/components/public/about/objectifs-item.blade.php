@props(['svg', 'title'])

<div class="objectifs__listing__item">
    @if($svg)
        <svg class="objectifs__listing__item__icon">
            <use xlink:href="{{ asset('assets/img/svg/sprite.svg#' . $svg) }}"></use>
        </svg>
    @endif
    <h3 class="maintitle maintitle--blue maintitle--small objectifs__listing__item__title">
        {!! $title !!}
    </h3>
</div>

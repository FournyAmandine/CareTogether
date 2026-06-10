@props(['svg', 'content', 'number', 'modifier'=>''])

<div class="stats__listing__item @if($modifier) stats__listing__item--{!! $modifier !!} @endif">
    <div class="stats__listing__item__numberContainer">
        <svg class="stats__listing__item__numberContainer__icon">
            <use xlink:href="{{ asset('assets/img/svg/sprite.svg#' . $svg) }}"></use>
        </svg>
        <span class="maintitle maintitle--blue stats__listing__item__numberContainer__number">
            {!! $number !!}
        </span>
    </div>
    <p class="stats__listing__item__content">
        {!! $content !!}
    </p>
</div>

@props(['item', 'name_parent', 'svg'])

<li {{$attributes}} class="{!! $name_parent !!}__item">
    @if($svg)
        <svg class="{!! $name_parent !!}__item__icon">
            <use xlink:href="{{ asset('assets/img/svg/sprite.svg#' . $svg) }}"></use>
        </svg>
    @endif
    <div class="{!! $name_parent !!}__item__textContainer">
        {!! $item !!}
    </div>
</li>

@props(['name_parent', 'svg', 'href', 'title', 'classButton'])

<div class="{!! $name_parent !!}__buttonContainer">
    <a href="{!! $href !!}" title="{!! $title !!}" class="@if(isset($classButton)) {!! $classButton !!} @endif {!! $name_parent !!}__buttonContainer__button">
        <svg class="{!! $name_parent !!}__buttonContainer__button__icon">
            <use xlink:href="{{ asset('assets/img/svg/sprite.svg#' . $svg) }}"></use>
        </svg>
    </a>
</div>

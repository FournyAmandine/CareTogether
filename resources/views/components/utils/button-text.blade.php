@props(['name_parent', 'svg', 'title', 'classButton', 'text'])

<div class="{!! $name_parent !!}__buttonContainer">
    <button {!! $attributes !!} title="{!! $title !!}" class="@if(isset($classButton)) {!! $classButton !!} @endif {!! $name_parent !!}__buttonContainer__button">
        {!! $text !!}
        <svg class="{!! $name_parent !!}__buttonContainer__button__icon">
            <use xlink:href="{{ asset('assets/img/svg/sprite.svg#' . $svg) }}"></use>
        </svg>
    </button>
</div>

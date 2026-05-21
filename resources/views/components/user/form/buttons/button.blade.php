@props(['text', 'name_parent', 'class_button', 'svg' => 'arrow-button'])

<div class="{!! $name_parent !!}__buttonContainer">
    <button class="button {!! $class_button !!} {!! $name_parent !!}__buttonContainer__button" type="submit">
        {!! $text !!}
        <svg class="{!! $name_parent !!}__buttonContainer__button__icon">
            <use xlink:href="{{ asset('assets/img/svg/sprite.svg#' . $svg) }}"></use>
        </svg>
    </button>
</div>


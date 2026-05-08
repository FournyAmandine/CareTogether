@props(['href', 'label', 'name_parent', 'classButton', 'title', 'svg'])

<div class="{!! $name_parent !!}__buttonContainer">
    <a class="button @if(isset($classButton)) {!! $classButton !!} @endif {!! $name_parent !!}__buttonContainer__button" title="{!! $title !!}" href="{!! $href !!}">
        {!! $label !!}
        @if(isset($svg))
            <svg class="{!! $name_parent !!}__buttonContainer__button__icon">
                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#' . $svg ) }}"></use>
            </svg>
        @endif
    </a>
</div>

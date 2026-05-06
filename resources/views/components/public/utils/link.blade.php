@props(['href', 'label', 'name_parent', 'classButton', 'title', 'svg'])

<div class="{!! $name_parent !!}__buttonContainer">
    <a class="button @if(isset($classButton)) {!! $classButton !!} @endif {!! $name_parent !!}__buttonContainer__button" title="{!! $title !!}" href="{!! $href !!}">
        {!! $label !!}
        @if(isset($svg))
            <svg class="stats__listing__item__titleContainer__icon">
                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#' . $svg ) }}"></use>
            </svg>
        @endif
    </a>
</div>

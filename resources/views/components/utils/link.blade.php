@props(['href', 'label', 'name_parent', 'classButton', 'title', 'svg', 'delay'=>'', 'aos'=>''])

<div class="{!! $name_parent !!}__buttonContainer" @if($aos) data-aos="{{$aos}}" data-aos-delay="{{$delay}}" data-aos-duration="500" @endif>
    <a class="button @if(isset($classButton)) {!! $classButton !!} @endif {!! $name_parent !!}__buttonContainer__button" title="{!! $title !!}" href="{!! $href !!}">
        {!! $label !!}
        @if(isset($svg))
            <svg aria-hidden="true" class="{!! $name_parent !!}__buttonContainer__button__icon">
                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#' . $svg ) }}"></use>
            </svg>
        @endif
    </a>
</div>

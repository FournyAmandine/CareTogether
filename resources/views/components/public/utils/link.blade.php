@props(['href', 'label', 'name_parent', 'classButton', 'title', 'svg'])

<div class="{!! $name_parent !!}__buttonContainer">
    <a class="button @if(isset($classButton)) {!! $classButton !!} @endif {!! $name_parent !!}__buttonContainer__button" title="{!! $title !!}" href="{!! $href !!}">
        {!! $label !!}
        @if(isset($svg))
            {!! $svg !!}
        @endif
    </a>
</div>

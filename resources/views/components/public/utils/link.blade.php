@props(['href', 'label', 'name_parent', 'title'])

<div class="{!! $name_parent !!}__buttonContainer">
    <a class="button {!! $name_parent !!}__buttonContainer__button"
       title="{!! $title !!}"
       href="{!! $href !!}">{!! $label !!}
    </a>
</div>

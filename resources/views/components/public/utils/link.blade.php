@props(['href', 'label', 'name_parent'])

<div class="{!! $name_parent !!}__buttonContainer">
    <a class="button {!! $name_parent !!}__buttonContainer__button" title="Aller vers la page {!! $label !!}" href="{!! $href !!}">{!! $label !!}</a>
</div>

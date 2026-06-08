@props(['href', 'title', 'text', 'label'])

<div class="empty">
    <p class="empty__text">
        {!! $text !!}
    </p>
    <x-utils.link name_parent="empty" svg="arrow-button" title="{!! $title !!}" classButton="button button--red" label="{!! $label !!}" href="{!! $href !!}"/>
</div>

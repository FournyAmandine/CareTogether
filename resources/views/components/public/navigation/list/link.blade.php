@props(['name_parent', 'href', 'label'])

<li class="{!! $name_parent !!}__item"><a class="button button--simple {!! $name_parent !!}__item__link" title="Aller vers la page {!! $label !!}" href="{!! $href !!}">{!! $label !!}</a></li>

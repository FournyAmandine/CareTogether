@props(['name_parent', 'href', 'label', 'active'=>false])

<li class="{!! $name_parent !!}__item"><a class="{!! $active ? 'active' : '' !!} button button--simple {!! $name_parent !!}__item__link" title="Aller vers la page {!! $label !!}" href="{!! $href !!}">{!! $label !!}</a></li>

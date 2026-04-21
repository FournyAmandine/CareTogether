@props(['name_parent', 'href', 'label'])

<li class="{!! $name_parent !!}__list__item"><a class="{!! $name_parent !!}__list__item__link" title="Aller vers la page {!! $label !!}" href="{!! $href !!}">{!! $label !!}</a></li>

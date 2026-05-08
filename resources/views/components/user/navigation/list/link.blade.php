@props(['name_parent', 'href', 'label', 'svg'])

<li class="{!! $name_parent !!}__item">
    <a wire:navigate class="button button--simple {!! $name_parent !!}__item__link" title="Aller vers la page {!! $label !!}" href="{!! $href !!}">
        <svg class="{!! $name_parent !!}__item__link__icon">
            <use xlink:href="{{ asset('assets/img/svg/sprite.svg#' . $svg) }}"></use>
        </svg>
        {!! $label !!}
    </a>
</li>

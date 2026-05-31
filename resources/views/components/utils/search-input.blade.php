@props(['name_parent'])

<input class="{!! $name_parent !!}__input" type="search" placeholder="Rechercher..." name="term" value="{{ request('term') }}">
<button type="submit" class="{!! $name_parent !!}__button">
    <svg class="{!! $name_parent !!}__button__icon">
        <use xlink:href="{{ asset('assets/img/svg/sprite.svg#search-button') }}"></use>
    </svg>
</button>

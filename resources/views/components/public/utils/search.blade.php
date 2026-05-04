@props(['name_parent'])

<form class="{!! $name_parent !!}__formSearch" action="{{ route('public.posts.index') }}" method="get">
    <input class="{!! $name_parent !!}__formSearch__input" type="search" placeholder="Rechercher..." name="term" value="{{ request('term') }}">
    <button type="submit" class="{!! $name_parent !!}__formSearch__button">
        <svg class="{!! $name_parent !!}__formSearch__button__icon">
            <use xlink:href="{{ asset('assets/img/svg/sprite.svg#search-button') }}"></use>
        </svg>
    </button>
</form>

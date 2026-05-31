@props(['name_parent', 'route'=>route('public.posts.index')])

<form class="{!! $name_parent !!}__formSearch" action="{{ $route }}" method="get">
    <input {!! $attributes !!} class="{!! $name_parent !!}__formSearch__input" type="search" placeholder="Rechercher..." name="term" value="{{ request('term') }}">
    <button type="submit" class="{!! $name_parent !!}__formSearch__button">
        <svg class="{!! $name_parent !!}__formSearch__button__icon">
            <use xlink:href="{{ asset('assets/img/svg/sprite.svg#search-button') }}"></use>
        </svg>
    </button>
</form>

@props(['name_parent', 'route'=>route('public.posts.index')])

<form class="{!! $name_parent !!}__formSearch" action="{{ $route }}" method="get">
    <input title="Entrez un terme pour rechercher" {!! $attributes !!} class="{!! $name_parent !!}__formSearch__input" type="search" placeholder="Rechercher..." name="term" value="{{ request('term') }}">
    <button aria-labelledby="searchTitle" type="submit" class="{!! $name_parent !!}__formSearch__button">
        <span id="searchTitle" class="sro">Valider la recherche</span>
        <svg class="{!! $name_parent !!}__formSearch__button__icon">
            <use xlink:href="{{ asset('assets/img/svg/sprite.svg#search-button') }}"></use>
        </svg>
    </button>
</form>

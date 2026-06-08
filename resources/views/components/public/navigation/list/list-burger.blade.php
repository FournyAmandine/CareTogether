@props(['name_parent'])

@php
    $links = [
        [
            'href'=>route('public.homepage'),
            'label'=> 'Accueil'
        ],
        [
            'href'=>route('public.posts.index'),
            'label'=> 'Annonces'
        ],
        [
            'href'=>route('public.aboutpage'),
            'label'=> 'À propos'
        ],
        [
            'href'=>route('public.contactpage'),
            'label'=> 'Contact'
        ],
    ];
@endphp

<ul class="{!! $name_parent !!}__list">
    @foreach($links as $link)
        <x-public.navigation.list.link-svg
            name_parent="{!! $name_parent !!}__list"
            :href="$link['href']" title="Aller vers la page {!! $link['label'] !!}"
            :label="$link['label']" svg="arrow-button"
            :active="request()->url() == $link['href']"
        />
    @endforeach

        @if(!auth()->check())
            <div class="{!! $name_parent !!}__list__buttons">
                <x-utils.link name_parent="{!! $name_parent !!}__list__buttons" class-button="button--login" title="Aller vers la page Se connecter"
                              href="{!! route('login') !!}" label="Se connecter"/>
                <x-utils.link class-button="button--border" name_parent="{!! $name_parent !!}__list__buttons" title="Aller vers la page S'inscrire"
                              href="{!! route('register') !!}" label="S'inscrire"/>
            </div>
        @endif
</ul>

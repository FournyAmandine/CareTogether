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
        [
            'href'=>route('user.dashboard'),
            'label'=> 'Mon profil'
        ],
    ];
@endphp

<ul class="{!! $name_parent !!}__list">
    @foreach($links as $link)
        <x-public.navigation.list.link
            name_parent="{!! $name_parent !!}__list"
            :href="$link['href']"
            :label="$link['label']"
            :active="request()->url() == $link['href']"
        />
    @endforeach
</ul>

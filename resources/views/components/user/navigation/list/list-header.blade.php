@props(['name_parent', 'conversation'=>null])

@php
    $links = [
        [
            'href'=>route('public.homepage'),
            'label'=> 'Accueil',
            'svg'=> 'home'
       ],
       [
            'href'=>route('user.dashboard'),
            'label'=> 'Votre tableau de bord',
            'svg'=> 'dashboard'
        ],
        [
            'href'=>route('user.profil'),
            'label'=> 'Votre profil',
            'svg'=> 'user'
        ],
        [
            'href'=>route('user.posts.index'),
            'label'=> 'Vos annonces',
            'svg'=> 'posts'
        ],
        [
            'href'=>route('user.registered.index'),
            'label'=> 'Vos annonces enregistrées',
            'svg'=> 'register'
        ],
        [
            'href'=>route('user.sales.index'),
            'label'=> 'Vos achats',
            'svg'=> 'achats'
        ],
        [
            'href'=>route('user.rentals.index'),
            'label'=> 'Vos locations/prêts',
            'svg'=> 'locations'
        ],
        [
            'href'=>route('user.messages'),
            'label'=> 'Vos messages',
            'svg'=> 'messages'
        ],
    ];
@endphp

<ul class="{!! $name_parent !!}__list">
    @foreach($links as $link)
        <x-user.navigation.list.link
            name_parent="{!! $name_parent !!}__list"
            :href="$link['href']"
            :label="$link['label']"
            :svg="$link['svg']"
            :active="request()->url() == $link['href']"
        />
    @endforeach
</ul>

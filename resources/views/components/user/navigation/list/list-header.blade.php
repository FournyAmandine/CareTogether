@props(['name_parent'])

@php
    $links = [
       [
            'href'=>route('user.dashboard'),
            'label'=> 'Votre tableau de bord',
            'svg'=> 'dashboard'
        ],
        [
            'href'=>'#',
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
            'href'=>route('public.homepage'),
            'label'=> 'Vos message',
            'svg'=> 'messages'
        ],
        [
            'href'=>route('public.homepage'),
            'label'=> 'Accueil',
            'svg'=> 'home'
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
        />
    @endforeach
</ul>

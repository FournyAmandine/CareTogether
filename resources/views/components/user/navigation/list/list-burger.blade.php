@props(['name_parent', 'conversation'=>null])

@php
    $links = [
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
        [
            'href'=>route('public.homepage'),
            'label'=> 'Accueil',
            'svg'=> 'home'
        ],
    ];
@endphp

<ul class="{!! $name_parent !!}__list">
    @foreach($links as $link)
        <x-user.navigation.list.link-svg
            name_parent="{!! $name_parent !!}__list"
            :href="$link['href']"
            :label="$link['label']" svg="arrow-button"
            title="Aller vers la page {!! $link['label'] !!}"
            :active="request()->url() == $link['href']"
        />
    @endforeach

    <form method="POST" action="{{ route('logout') }}" class="{!! $name_parent !!}__form">
        @csrf
        <x-user.form.buttons.button svg="deconnexion" class_button="button--red" name_parent="{!! $name_parent !!}__form" text="Deconnexion"/>
    </form>
</ul>

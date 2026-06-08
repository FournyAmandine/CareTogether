@props(['post' => '', 'title'])

<header class="header">
    <h1 class="sro header__title">{{$title}}</h1>

    <div class="header__container">
        <x-public.navigation.burger_menu name_parent="header__container"/>
        <x-utils.logo name_parent="header__container"/>
        <nav class="header__container__navigation">
            <h2 class="sro header__container__navigation__title">Navigation</h2>
            <x-public.navigation.list.list-header name_parent="header__container__navigation"/>
        </nav>
        <x-utils.search id="searchTitle" name_parent="header__container"/>


        @if(auth()->check())
            <a class="header__container__link" href="{!! route('user.dashboard') !!}">
                <img class="header__container__link__img" src="{!! Str::startsWith(auth()->user()->profil_picture, 'assets')
                                                        ? asset(auth()->user()->profil_picture)
                                                        : asset('storage/photos/users/originals/' . auth()->user()->profil_picture) !!}" alt="Image de profil de l'utilisateur">
            </a>
        @else
            <div class="header__container__account">
                <x-utils.link-svg class-button="button--icon" name_parent="header__container__account" title="Aller vers la page de connexion"
                                  href="{!! route('login') !!}" svg="user"/>
            </div>
            <div class="header__container__buttons">
                <x-utils.link class-button="button--simple" name_parent="header__container__buttons" title="Aller vers la page S'inscrire"
                              href="{!! route('register') !!}" label="S'inscrire"/>
                <x-utils.link name_parent="header__container__buttons" title="Aller vers la page Se connecter"
                              href="{!! route('login') !!}" label="Se connecter"/>
            </div>
        @endif
    </div>


    @if($title != 'Accueil' && $title != 'À propos' && $title != 'Annonces' && $title != 'Contact' && $title != 'Mentions légales' && $title != 'Politique de confidentialité' && $title != 'Conditions générales d’utilisation')
        {{ Breadcrumbs::render('public.posts.show', $post) }}
    @elseif($title != 'Accueil' && $title != 'Mentions légales' && $title != 'Politique de confidentialité' && $title != 'Conditions générales d’utilisation')
        {{ Breadcrumbs::render() }}
    @endif

</header>

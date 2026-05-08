@props(['post' => '', 'title'])

<header class="header">
    <h1 class="sro header__title">{{$title}}</h1>
    <x-utils.logo name_parent="header"/>
    <nav class="header__navigation">
        <h2 class="sro header__navigation__title">Navigation</h2>
        <x-public.navigation.list.list-header name_parent="header__navigation"/>
    </nav>
    <x-utils.search name_parent="header"/>
    <div class="header__buttons">
        <x-utils.link class-button="button--simple" name_parent="header__buttons" title="Aller vers la page S'inscrire"
                      href="{!! route('register') !!}" label="S'inscrire"/>
        <x-utils.link name_parent="header__buttons" title="Aller vers la page Se connecter"
                      href="{!! route('login') !!}" label="Se connecter"/>
    </div>

    @if($title != 'Accueil' && $title != 'À propos' && $title != 'Annonces' && $title != 'Contact')
        {{ Breadcrumbs::render('public.posts.show', $post) }}
    @endif

    {{ Breadcrumbs::render() }}

</header>

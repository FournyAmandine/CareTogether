<header class="header">
    <h1 class="sro header__title">{{$title}}</h1>
    <x-public.utils.logo name_parent="header" />
    <nav class="header__navContainer">
        <x-public.navigation.list.list-header name_parent="header__navContainer"/>
    </nav>
    <x-public.utils.search name_parent="header"/>
    <div class="header__buttons">
        <x-public.utils.link name_parent="button--simple header__buttons" href="#" label="S'inscrire"/>
        <x-public.utils.link name_parent="header__buttons" href="#" label="Se connecter"/>
    </div>
</header>

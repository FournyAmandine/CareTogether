<header class="header">
    <h1 class="sro">Header</h1>

    <x-utils.logo name_parent="header"/>

    <nav class="header__navigation">
        <h2 class="sro header__navigation__title">
            Navigation
        </h2>
        <x-user.navigation.list.list-header name_parent="header__navigation"/>
    </nav>

    <x-utils.link svg="deconnexion" class-button="button--red" name_parent="header" title="Se déconnecter du compte"
                  href="{!! route('login') !!}" label="Deconnexion"/>
</header>

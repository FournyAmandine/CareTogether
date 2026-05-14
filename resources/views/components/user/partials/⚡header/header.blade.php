<header class="header">
    <div class="header__content">
        <h1 class="sro">Header</h1>

        <x-utils.logo name_parent="header__content"/>

        <nav class="header__content__navigation">
            <h2 class="sro header__content__navigation__title">
                Navigation
            </h2>
            <x-user.navigation.list.list-header name_parent="header__content__navigation"/>
        </nav>

        <x-utils.link svg="deconnexion" class-button="button--red" name_parent="header__content" title="Se déconnecter du compte"
                      href="{!! route('login') !!}" label="Deconnexion"/>
    </div>
</header>

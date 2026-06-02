@props(['conversation'])

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

        <form method="POST" action="{{ route('logout') }}" class="header__content__form">
            @csrf
            <x-user.form.buttons.button svg="deconnexion" class_button="button--red" name_parent="header__content" text="Deconnexion"/>
        </form>
    </div>
</header>

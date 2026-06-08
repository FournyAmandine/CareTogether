<x-login.app modifier="login" title_page="Connexion">

    <main class="formPage">

        <section class="content">
            <div class="content__heading">
                <h2 class="maintitle maintitle--blue maintitle--small content__heading__title">Bienvenue chez</h2>
                <div class="content__heading__imgContainer">
                    <img class="content__heading__imgContainer__img" src="{{ asset('assets/img/svg/logo-dark.svg') }}" alt="Logo de CareTogether">
                </div>
            </div>
            <p class="maintitle maintitle--small content__text">Connexion à votre espace</p>
            <span class="content__required">Les champs * sont obligatoires</span>

            <form class="content__form" method="post" action="{{ route('login') }}">
                @csrf
                <x-login.input field_name="email"
                               type="email"
                               placeholder="jean.dubois@gmail.com"
                               label="Entrez votre email"
                               required="required"
                               name_parent="content__form"/>
                <div class="content__form__password">
                    <x-login.input
                        field_name="password"
                        type="password"
                        placeholder="******"
                        label="Entrez votre mot de passe (minimun 8 caractères)"
                        required="required"
                        name_parent="content__form"
                    />
                    <button class="button button--input content__form__password__button" type="button" title="Cacher ou voir le mot de passe">
                        <svg class="content__form__password__button__icon content__form__password__button__icon--show">
                            <use xlink:href="{{ asset('assets/img/svg/sprite.svg#view') }}"></use>
                        </svg>

                        <svg class="content__form__password__button__icon content__form__password__button__icon--hide is-hidden">
                            <use xlink:href="{{ asset('assets/img/svg/sprite.svg#eye-close') }}"></use>
                        </svg>
                    </button>
                </div>
                <a class="content__form__forgotten" href="{{ route('password.request') }}" title="Renouveller son mot de passe">Mot de passe oublié?</a>

                <x-login.button
                    text="Se connecter"
                    name_parent="content__form"
                    class_button="button--login"
                />
            </form>
            <p class="content__register">
                Pas encore de compte?
                <a class="content__register__link" href="{!! route('register') !!}" title="Aller vers la page d'inscription">
                    Inscrivez-vous !
                </a>
            </p>
        </section>

    </main>

</x-login.app>

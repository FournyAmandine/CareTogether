<x-login.app title_page="Inscription">

    <main class="formPage">

        <section class="content">
            <div class="content__heading">
                <h2 class="maintitle maintitle--blue maintitle--small content__heading__title">Bienvenue chez</h2>
                <div class="content__heading__imgContainer">
                    <img class="content__heading__imgContainer__img" src="{{ asset('assets/img/svg/logo-dark.svg') }}" alt="Logo de CareTogether">
                </div>
            </div>
            <p class="maintitle maintitle--small content__text">Inscription à l’espace personnel</p>
            <span class="content__required">Les champs * sont obligatoires</span>

            <form class="content__form" method="post" action="{{ route('register.store') }}">
                @csrf

                <div class="content__form__name">
                    <x-login.input field_name="last_name"
                                   placeholder="Dubois"
                                   label="Entrez votre nom"
                                   required="required"
                                   name_parent="content__form"/>

                    <x-login.input field_name="first_name"
                                   placeholder="Jean"
                                   label="Entrez votre prénom"
                                   required="required"
                                   name_parent="content__form"/>
                </div>

                <x-login.input field_name="email"
                               type="email"
                               placeholder="jean.dubois@gmail.com"
                               label="Entrez votre email"
                               required="required"
                               name_parent="content__form"/>
                <x-login.input
                    field_name="password"
                    type="password"
                    placeholder="******"
                    label="Entrez votre mot de passe"
                    required="required"
                    name_parent="content__form"
                />

                <x-login.input
                    field_name="locality"
                    placeholder="Bastogne"
                    label="Entrez votre localité"
                    required="required"
                    name_parent="content__form"
                />

                <x-login.button
                    text="S’inscrire"
                    name_parent="content__form"
                    class_button="button--login"
                />
            </form>
            <p class="content__register">
                Déjà un compte?
                <a class="content__register__link" href="{!! route('login') !!}" title="Aller vers la page d'inscription">
                    Connectez-vous !
                </a>
            </p>
        </section>

    </main>

</x-login.app>

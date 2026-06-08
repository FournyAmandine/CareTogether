<x-login.app modifier="login" title_page="Mot de passe oublié">
    <main class="formPage">
        <section class="content">
            <div class="content__imgContainer">
                <img class="content__imgContainer__img" src="{{ asset('assets/img/svg/logo-dark.svg') }}" alt="Logo de CareTogether">
            </div>
            <h2 class="maintitle maintitle--small content__text">Réinitialiser votre mot de passe</h2>
            <p class="content__required">Les champs * sont obligatoires</p>
            <form  class="content__form" method="post" action="{{ route('password.email') }}">
                @csrf
                <x-login.input
                    field_name="email"
                    type="email"
                    placeholder="jean.dubois@gmail.com"
                    label="Entrez votre email "
                    required="required"
                    name_parent="content__form"
                />
                <x-login.button
                    text="Envoyer"
                    class_button="button--login"
                    name_parent="content__form"
                />
            </form>
        </section>
    </main>
</x-login.app>

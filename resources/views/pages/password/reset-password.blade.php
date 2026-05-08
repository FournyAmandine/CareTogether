<x-login.app title_page="Réinitialiser votre mot de passe">
    <main class="formPage">
        <section class="content">
            <div class="content__imgContainer">
                <img class="content__imgContainer__img" src="{{ asset('assets/img/svg/logo-dark.svg') }}" alt="Logo de CareTogether">
            </div>
            <h2 class="content__text">Réinitialiser votre mot de passe</h2>
            <p class="content__required">Les champs * sont obligatoires</p>
            <form class="content__form" method="post" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <x-login.input
                    field_name="email"
                    type="email"
                    placeholder="jean.dubois@gmail.com"
                    label="Entrez votre email "
                    required="required"
                    name_parent="content__form"
                />
                <x-login.input
                    field_name="password"
                    type="password"
                    placeholder=""
                    label="Entrez votre nouveau mot de passe"
                    required="required"
                    name_parent="content__form"
                />
                <x-login.input
                    field_name="password_confirmation"
                    type="password"
                    placeholder=""
                    label="Confimer votre mot de passe"
                    required="required"
                    name_parent="content__form"
                />
                <x-login.button
                    text="Réinitialiser"
                    class_button="button--login"
                />
            </form>
        </section>
    </main>
</x-login.app>

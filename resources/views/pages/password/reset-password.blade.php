<x-login.app modifier="login" title_page="Réinitialiser votre mot de passe">
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
                <div class="content__form__password">
                    <x-login.input
                        field_name="password"
                        type="password"
                        placeholder="******"
                        label="Entrez votre mot de passe (minimun 8 caractères)"
                        required="required"
                        name_parent="content__form__password"
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
                <div class="content__form__password__reset">
                    <x-login.input
                        field_name="password"
                        type="password"
                        placeholder="******"
                        label="Entrez votre mot de passe (minimun 8 caractères)"
                        required="required"
                        name_parent="content__form__password__reset"
                    />
                    <button class="button button--input content__form__password__reset__button content__form__password__button--reset" type="button" title="Cacher ou voir le mot de passe">
                        <svg class="content__form__password__reset__button__icon content__form__password__reset__button__icon--show">
                            <use xlink:href="{{ asset('assets/img/svg/sprite.svg#view') }}"></use>
                        </svg>

                        <svg class="content__form__password__reset__button__icon content__form__password__reset__button__icon--hide is-hidden">
                            <use xlink:href="{{ asset('assets/img/svg/sprite.svg#eye-close') }}"></use>
                        </svg>
                    </button>
                </div>
                <x-login.button
                    text="Réinitialiser"
                    class_button="button--login"
                    name_parent="content__form"
                />
            </form>
        </section>
    </main>
</x-login.app>

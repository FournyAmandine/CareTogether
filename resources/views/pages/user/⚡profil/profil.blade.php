<main class="profilPage">
    <x-user.utils.heading title="Votre profil" text="Gérez vos informations personnelles de votre compte."/>

    <section class="profil">
        <div class="profil__decoContainer">
            <img class="profil__decoContainer__deco" src="{!! asset('assets/img/deco-red.png') !!}" alt="">
        </div>
        <div class="wrapper wrapper--small">
            <form class="profil__form" wire:submit.prevent="save" method="post">
                @csrf
                <fieldset class="profil__form__fieldset">
                    <legend class="sro">
                        Champs principaux
                    </legend>
                    <div class="profil__form__fieldset__image">
                        <input wire:model.live="form.photo" class="profil__form__fieldset__image__input" type="file" id="photos" hidden>

                        <div class="profil__form__fieldset__image__imageContainer">
                            <img class="profil__form__fieldset__image__imageContainer__image" src="{!! $form->photo ? $form->photo->temporaryUrl() : (Str::startsWith($user->profil_picture, 'assets')? asset($user->profil_picture) : asset('storage/photos/users/originals/' . $user->profil_picture)) !!}" alt="Image de l'article">
                        </div>

                        <label for="photos" class="button button--icon profil__form__fieldset__image__button">
                            <svg class="profil__form__fieldset__image__button__icon">
                                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#modify') }}"></use>
                            </svg>
                        </label>
                    </div>
                    <x-user.form.fields.input wire:model.live="form.last_name" field_name="last_name" placeholder="Bourguignon" required="required" label="Nom" name_parent="profil__form__fieldset"/>
                    <x-user.form.fields.input wire:model.live="form.first_name" field_name="first_name" placeholder="Anne" required="required" label="Prénom" name_parent="profil__form__fieldset"/>
                    <div class="profil__form__fieldset__password" x-data="{showPassword : false}">
                        <x-user.form.fields.input wire:model.live="form.password" x-bind:type="showPassword ? 'text' : 'password'" field_name="password" required="required" label="Mot de passe" name_parent="profil__form__fieldset"/>
                        <button class="button button--input profil__form__fieldset__password__button" type="button" @click="showPassword = !showPassword" title="Cacher ou voir le mot de passe">
                            <svg class="profil__form__fieldset__password__button__icon" x-show="!showPassword">
                                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#view') }}"></use>
                            </svg>

                            <svg class="profil__form__fieldset__password__button__icon" x-show="showPassword">
                                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#eye-close') }}"></use>
                            </svg>
                        </button>
                    </div>
                </fieldset>

                <fieldset class="profil__form__fieldset--secondary">
                    <legend class="sro">
                        Champs secondaires
                    </legend>
                    <x-user.form.fields.input wire:model.live="form.email" field_name="email" placeholder="anne@bourguinon.be" required="required" label="Email" name_parent="profil__form__fieldset"/>
                    <x-user.form.fields.input wire:model.live="form.tel" field_name="tel" placeholder="0473 87 19 03" required="required" label="Téléphone" name_parent="profil__form__fieldset"/>
                    <x-user.form.fields.input wire:model.live="form.address" field_name="address" placeholder="Rue de la Soie" required="required" label="Adresse" name_parent="profil__form__fieldset"/>
                    <div class="profil__form__fieldset__locality">
                        <x-user.form.fields.input wire:model.live="form.locality" field_name="locality" placeholder="Bertogne" required="required" label="Localité" name_parent="profil__form__fieldset"/>
                        <x-user.form.fields.input wire:model.live="form.postal" field_name="postal" placeholder="6676" required="required" label="Code postal" name_parent="profil__form__fieldset"/>
                    </div>
                    <div class="profil__form__fieldset__buttons">
                        <x-utils.button-text text="Supprimer le compte" svg="delete" name_parent="profil__form__fieldset__buttons" classButton="button button--border" title="Supprimer le compte"/>
                        <x-user.form.buttons.button text="Enregistrer les informations" name_parent="profil__form__fieldset__buttons" class_button="button--red"/>
                    </div>
                </fieldset>
            </form>
        </div>
    </section>
</main>

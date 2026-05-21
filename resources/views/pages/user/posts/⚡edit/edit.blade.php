<main class="postsEdit">
    <x-user.utils.heading title="Modifier votre annonce : {!! $post->name !!}" :post="$post"/>
    <section class="formContainer">
        <h3 class="sro formContainer__title">
            Formulaire d'ajout d'annonce
        </h3>
        <div class="formContainer__decoContainer">
            <img class="formContainer__decoContainer" src="{!! asset('assets/img/deco-blue.png') !!}" alt="Forme bleue ronde">
        </div>
        <div class="wrapper wrapper--small">
            <form class="formContainer__form" wire:submit="store()" enctype="multipart/form-data" method="post">
                @csrf

                <fieldset class="formContainer__form__fieldset">
                    <legend class="sro formContainer__form__fieldset__legend">
                        Champs primaires
                    </legend>
                    <x-user.form.fields.input wire:model="form.name" name_parent="formContainer__form__fieldset"
                                              field_name="post_name" label="Titre"
                                              placeholder="Ex : Fauteuil Roulant" required="required"/>

                    <x-user.form.fields.select wire:model="form.category" name_parent="formContainer__form__fieldset" field_name="post_category" required="required" label="Categorie">

                    </x-user.form.fields.select>

                    <x-user.form.fields.select wire:model="form.type" name_parent="formContainer__form__fieldset" field_name="post_type" required="required" label="Type d'annonce">
                        <x-user.form.fields.option value="none" option_name="Sélectionnez le type" name_parent="formContainer__form__fieldset"/>
                        @foreach($this->getType() as $type)
                            <x-user.form.fields.option value="{!! $type->value !!}" option_name="{!! $type->value !!}" name_parent="formContainer__form__fieldset"/>
                        @endforeach
                    </x-user.form.fields.select>

                    <x-user.form.fields.input wire:model="form.price" name_parent="formContainer__form__fieldset"
                                              field_name="post_price" label="Prix du matériel"
                                              placeholder="Ex : 390€" required="required"/>

                    <x-user.form.fields.input wire:model="form.marque" name_parent="formContainer__form__fieldset"
                                              field_name="post_marque" label="Marque"
                                              placeholder="Ex : Invacare" required="required"/>

                    <x-user.form.fields.select wire:model="form.state" name_parent="formContainer__form__fieldset" field_name="post_state" required="required" label="État du produit">
                        <x-user.form.fields.option value="none" option_name="Sélectionnez l’état" name_parent="formContainer__form__fieldset"/>
                        @foreach($this->getState() as $state)
                            <x-user.form.fields.option value="{!! $state->value !!}" option_name="{!! $state->value !!}" name_parent="formContainer__form__fieldset"/>
                        @endforeach
                    </x-user.form.fields.select>
                </fieldset>

                <div class="formContainer__form__secondary">
                    <fieldset class="formContainer__form__secondary__fieldset">
                        <legend class="sro formContainer__form__secondary__fieldset__legend">
                            Champs secondaires
                        </legend>
                        <x-user.form.fields.textarea wire:model="form.description" name_parent="formContainer__form__secondary__fieldset" field_name="post_description" placeholder="Décrivez l’état de votre matériel, son utilisation ou toutes autres informations utiles" label="Description" required="required"/>

                        <span class="formContainer__form__secondary__fieldset__title">
                                Photos
                                <span class="required">
                                    *
                                </span>
                            </span>
                        <div class="formContainer__form__secondary__fieldset__image">
                            <input wire:model="form.img_path" class="formContainer__form__secondary__fieldset__image__input" type="file" id="photos" hidden multiple>

                            <label for="photos" class="button button--login formContainer__form__secondary__fieldset__image__button">
                                <svg class="formContainer__form__secondary__fieldset__image__button__icon">
                                    <use xlink:href="{{ asset('assets/img/svg/sprite.svg#add') }}"></use>
                                </svg>
                                Ajouter une photo
                            </label>

                            <p class="formContainer__form__secondary__fieldset__image__text">
                                Ajoutez jusqu'à 5 photos de votre matériel
                            </p>
                        </div>
                    </fieldset>

                    <x-user.form.buttons.button svg="modify" text="Modifier" name_parent="formContainer__form__fieldset" class_button="button--red"/>
                </div>
            </form>
        </div>
    </section>
</main>


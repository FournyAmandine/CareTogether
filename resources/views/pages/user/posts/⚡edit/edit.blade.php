<main class="postsEdit">
    <x-user.utils.heading title="Modifier votre annonce : {!! $post->name !!}" :post="$post"/>
    <section class="formContainer">
        <h3 class="sro formContainer__title">
            Formulaire d'ajout d'annonce
        </h3>
        <div class="formContainer__decoContainer">
            <img class="formContainer__decoContainer" src="{!! asset('assets/img/deco-blue.png') !!}" alt="">
        </div>
        <div class="wrapper wrapper--small">
            <form class="formContainer__form" wire:submit.prevent="save()" enctype="multipart/form-data" method="post">
                @csrf

                <fieldset class="formContainer__form__fieldset">
                    <legend class="sro formContainer__form__fieldset__legend">
                        Champs primaires
                    </legend>
                    <x-user.form.fields.input wire:model.live="form.name" name_parent="formContainer__form__fieldset"
                                              field_name="post_name" label="Titre"
                                              placeholder="Ex : Fauteuil Roulant" required="required"/>


                    @error('form.name')
                    <span class="error">{{ $message }}</span>
                    @enderror

                    <x-user.form.fields.select wire:model.live="form.category_id" name_parent="formContainer__form__fieldset" field_name="post_category" required="required" label="Categorie">
                        @foreach($categories as $category)
                            <x-user.form.fields.option value="{!! $category->id !!}" option_name="{!! $category->name !!}" name_parent="formContainer__form__fieldset"/>
                        @endforeach
                    </x-user.form.fields.select>

                    @error('form.category_id')
                    <span class="error">{{ $message }}</span>
                    @enderror

                    <x-user.form.fields.select wire:model.live="form.type" name_parent="formContainer__form__fieldset" field_name="post_type" required="required" label="Type d'annonce">
                        @foreach($this->getType() as $type)
                            <x-user.form.fields.option value="{!! $type->value !!}" option_name="{!! $type->value !!}" name_parent="formContainer__form__fieldset"/>
                        @endforeach
                    </x-user.form.fields.select>

                    @error('form.type')
                    <span class="error">{{ $message }}</span>
                    @enderror

                    <x-user.form.fields.input wire:model.live="form.price" name_parent="formContainer__form__fieldset"
                                              field_name="post_price"
                                              label="{!! $form->type == \App\Enums\PostType::Rental->value ? 'Prix de location (par mois)' : 'Prix du matériel' !!}"
                                              placeholder="Ex : 390€" required="required"
                                              disabled="{!! in_array($form->type, [\App\Enums\PostType::Loan->value, \App\Enums\PostType::Donation->value]) !!}"/>

                    @error('form.price')
                    <span class="error">{{ $message }}</span>
                    @enderror

                    <x-user.form.fields.input wire:model.live="form.marque" name_parent="formContainer__form__fieldset"
                                              field_name="post_marque" label="Marque"
                                              placeholder="Ex : Invacare" required="required"/>

                    @error('form.marque')
                    <span class="error">{{ $message }}</span>
                    @enderror


                    <x-user.form.fields.select wire:model.live="form.state" name_parent="formContainer__form__fieldset" field_name="post_state" required="required" label="État du produit">
                        @foreach($this->getState() as $state)
                            <x-user.form.fields.option value="{!! $state->value !!}" option_name="{!! $state->value !!}" name_parent="formContainer__form__fieldset"/>
                        @endforeach
                    </x-user.form.fields.select>

                    @error('form.state')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </fieldset>

                <div class="formContainer__form__secondary">
                    <fieldset class="formContainer__form__secondary__fieldset">
                        <legend class="sro formContainer__form__secondary__fieldset__legend">
                            Champs secondaires
                        </legend>
                        <x-user.form.fields.textarea wire:model.live="form.description" name_parent="formContainer__form__secondary__fieldset" field_name="post_description" placeholder="Décrivez l’état de votre matériel, son utilisation ou toutes autres informations utiles" label="Description" required="required"/>

                        @error('form.description')
                        <span class="error">{{ $message }}</span>
                        @enderror

                        <span class="formContainer__form__secondary__fieldset__title">
                                Photos
                                <span class="required">
                                    *
                                </span>
                            </span>
                        <div class="@if($existingImages == [] && $form->newImages == []) formContainer__form__secondary__fieldset__image @else formContainer__form__secondary__fieldset__image formContainer__form__secondary__fieldset__image--complet @endif">
                            <input wire:model.live="form.newImages" class="formContainer__form__secondary__fieldset__image__input" type="file" id="photos" hidden multiple>

                            @if($existingImages == [] && $form->newImages == [])
                                <label for="photos" class="button button--login formContainer__form__secondary__fieldset__image__button">
                                    <svg class="formContainer__form__secondary__fieldset__image__button__icon">
                                        <use xlink:href="{{ asset('assets/img/svg/sprite.svg#add') }}"></use>
                                    </svg>
                                    Ajouter une photo
                                </label>

                                <p class="formContainer__form__secondary__fieldset__image__text">
                                    Ajoutez jusqu'à 5 photos de votre matériel
                                </p>
                            @else

                            @foreach($existingImages as $image)
                                <div class="image-card">
                                    <div class="image-card__imageContainer">
                                        @if(Str::startsWith($image['img_path'], 'assets'))
                                            <img class="image-card__imageContainer__image" src="{{ asset($image['img_path']) }}" alt="Image de l'article : {!! $post->name !!}">
                                        @else
                                            <img class="image-card__imageContainer__image" src="{{ asset('storage/photos/posts/originals/' . $image['img_path']) }}" alt="Image de l'article : {!! $post->name !!}">
                                        @endif
                                    </div>

                                    <div class="image-card__buttonContainer">
                                        <button class="button button--red image-card__buttonContainer__button" type="button" wire:click="removeImage({{ $image['id'] }})">
                                            <svg class="image-card__buttonContainer__button__icon">
                                                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#close') }}"></use>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            @endforeach


                            @foreach($form->newImages as $index => $image)
                                <div class="image-card">
                                    <div class="image-card__imageContainer">
                                        <img class="image-card__imageContainer__image" src="{{ $image->temporaryUrl() }}" alt="Image de l'article">
                                    </div>

                                    <div class="image-card__buttonContainer">
                                        <button class="button button--red image-card__buttonContainer__button" type="button" wire:click="removeNewImage({{ $index }})">
                                            <svg class="image-card__buttonContainer__button__icon">
                                                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#close') }}"></use>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            @endforeach

                            <label for="photos" class="button button--icon formContainer__form__secondary__fieldset__image__button">
                                <svg class="formContainer__form__secondary__fieldset__image__button__icon">
                                    <use xlink:href="{{ asset('assets/img/svg/sprite.svg#add') }}"></use>
                                </svg>
                            </label>
                            @endif
                        </div>
                        @error('form.newImages')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </fieldset>

                    <x-user.form.buttons.button svg="modify" text="Modifier" name_parent="formContainer__form__fieldset" class_button="button--red"/>
                </div>
            </form>
        </div>
    </section>
</main>


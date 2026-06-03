<main class="singlePostPage singlePostPage--user">

    <x-user.utils.heading title="Votre annonce : {!! $post->name !!}" :post="$post"/>

    <section class="detail">
        <x-utils.deco/>
        <div class="wrapper wrapper--small">
            <div class="detail__main">
                <div class="detail__main__listing">
                    <button class="detail__main__listing__iconContainer" title="Mettre en favoris">
                        <svg class="detail__main__listing__iconContainer__icon">
                            <use xlink:href="{{ asset('assets/img/svg/sprite.svg#register') }}"></use>
                        </svg>
                    </button>
                    @if($existingImages == [])
                        <div class="detail__main__listing__imgContainer">
                            <img class="detail__main__listing__imgContainer__img detail__main__listing__imgContainer__img--general" src="{{ asset('assets/img/post-image.jpg') }}" alt="Image de l'article">
                        </div>
                    @else
                        @foreach($existingImages as $image)
                            <div class="detail__main__listing__imgContainer">
                                @if(Str::startsWith($image['img_path'], 'assets'))
                                    <img class="detail__main__listing__imgContainer__img" src="{{ asset($image['img_path']) }}" alt="Image de l'article : {!! $post->name !!}">
                                @else
                                    <img class="detail__main__listing__imgContainer__img" src="{{ asset('storage/photos/posts/originals/' . $image['img_path']) }}" alt="Image de l'article : {!! $post->name !!}">
                               @endif
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="detail__main__contentContainer">
                    <div class="detail__main__contentContainer__infos">
                        <h3 class="detail__main__contentContainer__infos__title">
                            {!! $post->name !!}
                        </h3>
                        <p class="detail__main__contentContainer__infos__price">
                            {!! $post->price !!}€
                        </p>
                        <ul class="detail__main__contentContainer__infos__list">
                            <x-utils.list-item svg="map-pin" name_parent="detail__main__contentContainer__infos__list" item="{!! $post->locality !!}"/>
                            <x-utils.list-item svg="state" name_parent="detail__main__contentContainer__infos__list" item="{!! $post->state !!}"/>
                            <x-utils.list-item svg="date" name_parent="detail__main__contentContainer__infos__list" item="Ajouté {{ $post->created_at->diffForHumans() }}"/>
                            <x-utils.list-item svg="user" name_parent="detail__main__contentContainer__infos__list" item="Vendu par {!! $post->user->first_name . ' ' . $post->user->last_name!!}"/>
                            <x-utils.list-item svg="category" name_parent="detail__main__contentContainer__infos__list" item="{!! $post->category->name !!}"/>
                            <x-utils.list-item svg="marque" name_parent="detail__main__contentContainer__infos__list" item="{!! $post->marque !!}"/>
                        </ul>
                    </div>
                    <div class="detail__main__contentContainer__description">
                        <p class="detail__main__contentContainer__description__title">
                            Description du produit :
                        </p>
                        <p class="detail__main__contentContainer__description__text">
                            <svg class="detail__main__contentContainer__description__text__icon">
                                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#description') }}"></use>
                            </svg>
                            {!! $post->description !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="detail__buttons">
                <x-utils.button-text wire:click="toggleModal('delete', {!! $post->id !!})" name_parent="detail__buttons" text="Supprimer" svg="delete" class-button="button button--red" title="Supprimer l'annonce"/>
                @if($post->sold === 0)
                    @if($post->type === \App\Enums\PostType::Sale->value)
                        <x-utils.button-text wire:click="toggleModal('sold', {!! $post->id !!})" name_parent="detail__buttons" text="Marquer comme vendu" svg="arrow-button" class-button="button button--border" title="Marquer l'article comme vendu"/>
                    @elseif($post->type === \App\Enums\PostType::Rental->value)
                        <x-utils.button-text wire:click="toggleModal('rented', {!! $post->id !!})" name_parent="detail__buttons" text="Marquer comme loué" svg="arrow-button" class-button="button button--border" title="Marquer l'article comme loué"/>
                    @elseif($post->type === \App\Enums\PostType::Loan->value)
                        <x-utils.button-text wire:click="toggleModal('loaned', {!! $post->id !!})" name_parent="detail__buttons" text="Marquer comme prêté" svg="arrow-button" class-button="button button--border" title="Marquer l'article comme prêté"/>
                    @elseif($post->type === \App\Enums\PostType::Donation->value)
                        <x-utils.button-text wire:click="toggleModal('given', {!! $post->id !!})" name_parent="detail__buttons" text="Marquer comme donné" svg="arrow-button" class-button="button button--border" title="Marquer l'article comme donné"/>
                    @endif
                    <x-utils.link name_parent="detail__buttons" href="{!! route('user.posts.edit', $post->id) !!}" svg="modify" class-button="button--blue" title="Supprimer l'annonce" label="Modifier"/>
                @else
                    @if($post->type === \App\Enums\PostType::Sale->value)
                        <x-utils.button-text wire:click="toggleModal('unsold', {!! $post->id !!})" name_parent="detail__buttons" text="Vendu !" svg="checked" class-button="button button--blue" title="Ne plus mettre vendu"/>
                    @elseif($post->type === \App\Enums\PostType::Rental->value)
                        <x-utils.button-text wire:click="toggleModal('unsold', {!! $post->id !!})" name_parent="detail__buttons" text="Loué !" svg="checked" class-button="button button--blue" title="Ne plus mettre loué"/>
                    @elseif($post->type === \App\Enums\PostType::Loan->value)
                        <x-utils.button-text wire:click="toggleModal('unsold', {!! $post->id !!})" name_parent="detail__buttons" text="Prêté !" svg="checked" class-button="button button--blue" title="Ne plus mettre prêté"/>
                    @elseif($post->type === \App\Enums\PostType::Donation->value)
                        <x-utils.button-text wire:click="toggleModal('unsold', {!! $post->id !!})" name_parent="detail__buttons" text="Donné !" svg="checked" class-button="button button--blue" title="Ne plus mettre donné"/>
                    @endif
                @endif
            </div>
        </div>
    </section>

    <section class="posts">
        <div class="posts__decoContainer">
            <img class="posts__decoContainer__deco" src="{!! asset('assets/img/deco-red.png') !!}" alt="">
        </div>
        <div class="wrapper wrapper--small">
            <h2 class="maintitle maintitle--blue posts__title">
                Vos dernières annonces
            </h2>
            <div class="posts__listing">
                @foreach($posts as $post)
                    @php
                        $image = $post->images()->first();
                    @endphp
                    <x-utils.card title="{!! $post->name !!}"
                                  locality="{!! $post->locality !!}"
                                  state="{!! $post->state !!}" :registered-post-ids="$register_id"
                                  price="{!! $post->price !!}" :post="$post"
                                  imgSrc="{{ $image?->img_path
                                                    ? (Str::startsWith($image->img_path, 'assets')
                                                        ? asset($image->img_path)
                                                        : asset('storage/photos/posts/originals/' . $image->img_path))
                                                    : asset('assets/img/post-image.jpg') }}"
                                  svg="{!! Str::slug($post->category->name, '_')!!}"
                                  src="{!! route('user.posts.show', $post->id) !!}"
                                  type="{!! $post->type !!}" modifier="last"
                    />
                @endforeach
            </div>
        </div>
    </section>
    @if($isOpenDeleteModal)
        <x-user.modal.modal outside="$dispatch('toggleModal', { modal: 'modal' })">
            <x-slot:title>
                Voulez-vous vraiment supprimer cette annonce :
                <span class="modal__container__title__name">
                    {{$chosenPost->name}}
                </span> ?
            </x-slot:title>
            <x-slot:content>
                <div class="modal__container__buttons">
                    <x-utils.button-text wire:click="toggleModal('modal')" classButton="button button--border" name_parent="modal__container__buttons" title="Retourner sur la page de l'annonce" text="Non, retour" svg="arrow-button"/>
                    <x-utils.button-text wire:click="modal()" classButton="button button--red" name_parent="modal__container__buttons" text="Oui, supprimer" title="Supprimer cette annonce" svg="modal"/>
                </div>
            </x-slot:content>
        </x-user.modal.modal>
    @endif

    @if($isOpenSoldModal)
        <x-user.modal.modal outside="$dispatch('toggleModal', { modal: 'sold' })">
            <x-slot:title>
                Marquer cette annonce comme vendu
            </x-slot:title>
            <x-slot:content>
                <form class="modal__container__form" wire:submit.prevent="markAsSold" action="" method="post">
                    @csrf
                    <x-user.form.fields.select wire:model="selectedUser" name_parent="modal__container__form" field_name="user" required="required" label="À qui avez-vous vendu cette annonce?">
                        <x-user.form.fields.option name_parent="modal__container__form" selected="selected" value="none" option_name="Sélectionner l'acheteur"/>
                        @foreach($conversations as $conversation)
                            @php
                                $otherUser = $conversation->buyer_id === auth()->id()
                                    ? $conversation->seller
                                    : $conversation->buyer;
                            @endphp

                            <x-user.form.fields.option name_parent="modal__container__form" value="{!! $otherUser->id !!}" option_name="{!! $otherUser->first_name . '' . $otherUser->last_name  !!}"/>
                        @endforeach
                    </x-user.form.fields.select>
                    <x-user.form.buttons.button text="Valider" name_parent="modal__container__form" class_button="button--red"/>
                </form>
            </x-slot:content>
        </x-user.modal.modal>
    @endif

    @if($isOpenRentedModal)
        <x-user.modal.modal outside="$dispatch('toggleModal', { modal: 'rented' })">
            <x-slot:title>
                Marquer cette annonce comme loué
            </x-slot:title>
            <x-slot:content>
                <form class="modal__container__form" wire:submit.prevent="markAsLoaned" method="post">
                    @csrf
                    <x-user.form.fields.select wire:model="selectedUser" name_parent="modal__container__form" field_name="user" required="required" label="À qui avez-vous vendu cette annonce?">
                        <x-user.form.fields.option name_parent="modal__container__form" selected="selected" value="none" option_name="Sélectionner l'acheteur"/>
                        @foreach($conversations as $conversation)
                            @php
                                $otherUser = $conversation->buyer_id === auth()->id()
                                    ? $conversation->seller
                                    : $conversation->buyer;
                            @endphp

                            <x-user.form.fields.option name_parent="modal__container__form" value="{!! $otherUser->id !!}" option_name="{!! $otherUser->first_name . '' . $otherUser->last_name  !!}"/>
                        @endforeach
                    </x-user.form.fields.select>
                    <x-user.form.fields.input wire:model="startDate" name_parent="modal__container__form" type="date" field_name="start_date" label="Entrez une date de début" required="required"/>
                    <x-user.form.fields.input wire:model="endedDate" name_parent="modal__container__form" type="date" field_name="ended_date" label="Entrez une date de fin"/>
                    <x-user.form.buttons.button text="Valider" name_parent="modal__container__form" class_button="button--red"/>
                </form>
            </x-slot:content>
        </x-user.modal.modal>
    @endif

    @if($isOpenGivenModal)
        <x-user.modal.modal outside="$dispatch('toggleModal', { modal: 'given' })">
            <x-slot:title>
                Marquer cette annonce comme donné
            </x-slot:title>
            <x-slot:content>
                <form class="modal__container__form" wire:submit.prevent="markAsGiven" method="post">
                    @csrf
                    <x-user.form.fields.select wire:model="selectedUser" name_parent="modal__container__form" field_name="user" required="required" label="À qui avez-vous vendu cette annonce?">
                        <x-user.form.fields.option name_parent="modal__container__form" selected="selected" value="none" option_name="Sélectionner l'acheteur"/>
                        @foreach($conversations as $conversation)
                            @php
                                $otherUser = $conversation->buyer_id === auth()->id()
                                    ? $conversation->seller
                                    : $conversation->buyer;
                            @endphp

                            <x-user.form.fields.option name_parent="modal__container__form" value="{!! $otherUser->id !!}" option_name="{!! $otherUser->first_name . '' . $otherUser->last_name  !!}"/>
                        @endforeach
                    </x-user.form.fields.select>
                    <x-user.form.buttons.button text="Valider" name_parent="modal__container__form" class_button="button--red"/>
                </form>
            </x-slot:content>
        </x-user.modal.modal>
    @endif

    @if($isOpenLoanedModal)
        <x-user.modal.modal outside="$dispatch('toggleModal', { modal: 'loaned' })">
            <x-slot:title>
                Marquer cette annonce comme prêté
            </x-slot:title>
            <x-slot:content>
                <form class="modal__container__form" wire:submit.prevent="markAsLoaned" method="post">
                    @csrf
                    <x-user.form.fields.select wire:model="selectedUser" name_parent="modal__container__form" field_name="user" required="required" label="À qui avez-vous vendu cette annonce?">
                        <x-user.form.fields.option name_parent="modal__container__form" selected="selected" value="none" option_name="Sélectionner l'acheteur"/>
                        @foreach($conversations as $conversation)
                            @php
                                $otherUser = $conversation->buyer_id === auth()->id()
                                    ? $conversation->seller
                                    : $conversation->buyer;
                            @endphp

                            <x-user.form.fields.option name_parent="modal__container__form" value="{!! $otherUser->id !!}" option_name="{!! $otherUser->first_name . '' . $otherUser->last_name  !!}"/>
                        @endforeach
                    </x-user.form.fields.select>
                    <x-user.form.fields.input wire:model="startDate" name_parent="modal__container__form" type="date" field_name="start_date" label="Entrez une date de début" required="required"/>
                    <x-user.form.fields.input wire:model="endedDate" name_parent="modal__container__form" type="date" field_name="ended_date" label="Entrez une date de fin"/>
                    <x-user.form.buttons.button text="Valider" name_parent="modal__container__form" class_button="button--red"/>
                </form>
            </x-slot:content>
        </x-user.modal.modal>
    @endif

    @if($isOpenUnsoldModal)
        <x-user.modal.modal outside="$dispatch('toggleModal', { modal: 'unsold' })">
            <x-slot:title>
                Ne plus mettre comme vendu ou loué
            </x-slot:title>
            <x-slot:content>
                <div class="modal__container__buttons">
                    <x-utils.button-text wire:click="markAsUnsold()" classButton="button button--red" name_parent="modal__container__buttons" text="Valider" title="Ne plus mettre comme venud ou loué" svg="arrow-button"/>
                </div>
            </x-slot:content>
        </x-user.modal.modal>
    @endif
</main>

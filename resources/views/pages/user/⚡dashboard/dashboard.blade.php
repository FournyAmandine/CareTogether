<main class="dashboardPage">
    <section class="heading">
        <div class="heading__decoContainer">
            <img class="heading__decoContainer__deco" src="{!! asset('assets/img/deco-blue.png') !!}" alt="">
        </div>
        <div class="wrapper wrapper--small">
            <div class="heading__content">
                <h2 class="maintitle maintitle--blue maintitle--big heading__content__title">
                    Bonjour {!! $first_name !!},
                </h2>
                <p class="heading__content__text">
                    Bienvenue sur votre espace personnel, voici un résumé de votre activité :
                </p>
            </div>
            <div class="heading__icons">
                <x-utils.button wire:click="toggleModal('notif')" class__button="button button--icon" title="Ouvrir les notifications" name_parent="heading__icons" svg="notifs"/>
                <span class="heading__icons__notifs">
                    {!! $notifications->count() !!}
                </span>
                <x-utils.link-svg class__button="button button--icon" title="Aller vers la page d'accueil" href="{!! route('public.homepage') !!}" name_parent="heading__icons" svg="home"/>
            </div>
        </div>
    </section>

    <section class="stats">
        <div class="wrapper wrapper--small">
            <h2 class="maintitle maintitle--blue maintitle--small stats__title">
                Quelques statistiques
            </h2>
            <div class="stats__listing">
                <x-user.utils.stats-card route="{!! route('user.posts.index') !!}" title="Aller vers la page des annonces" number="{!! $posts_count !!}" content="annonces" svg="stats-actives"/>
                <x-user.utils.stats-card route="{!! route('user.registered.index') !!}" title="Aller vers la page des annonces enregistrées" number="{!! $registered_count !!}" content="annonces enregistrées" svg="registered_fill"/>
                <x-user.utils.stats-card route="{!! route('user.rentals.index') !!}" title="Aller vers la page des locations et prêt" number="{!! $rentals !!}" content="locations/prêts" svg="stats-locations"/>
                <x-user.utils.stats-card route="{!! route('user.messages') !!}" title="Aller vers la page des messages" number="{!! $conversations !!}" content="conversations" svg="stats-messages"/>
            </div>
            <x-utils.link name_parent="stats" class_button="button button--red" svg="add" label="Ajouter une annonce" href="{!! route('user.posts.create') !!}" title="Aller vers la page d'ajout d'une annonce" />
        </div>
    </section>

    <div class="recap" role="region">
        <div class="recap__decoContainer">
            <img class="recap__decoContainer__deco" src="{!! asset('assets/img/deco-red.png') !!}" alt="">
        </div>
        <div class="wrapper wrapper--small">
            <section class="recap__posts">
                <h2 class="maintitle maintitle--blue maintitle--small recap__posts__title">
                    Vos annonces enregistrées
                </h2>
                <div class="recap__posts__listing">
                    @foreach($posts as $post)
                        @php
                            $image = $post->images->first();
                        @endphp
                        <x-utils.posts-card name_parent="recap__posts__listing"
                                            src="{{ $image?->img_path
                                                    ? (Str::startsWith($image->img_path, 'assets')
                                                        ? asset($image->img_path)
                                                        : asset('storage/photos/posts/originals/' . $image->img_path))
                                                    : asset('assets/img/post-image.jpg') }}"
                                            name="{!! $post->name !!}" date="{{ $post->locality }}"
                                            price="{!! $post->price !!}" :post="$post"/>
                    @endforeach
                </div>
                <x-utils.link name_parent="recap__posts" class_button="button button--border" svg="arrow-button" label="Voir tous vos annonces" href="{!! route('user.posts.index') !!}" title="Aller vers la page de vos annonces" />
            </section>
            <section class="recap__messages">
                <h2 class="maintitle maintitle--blue maintitle--small recap__messages__title">
                    Vos derniers messages reçus
                </h2>
                <div class="recap__messages__listing">
                    @foreach($messages as $message)
                        <x-utils.messages-card name_parent="recap__messages__listing" src="{!! Str::startsWith($message->sender->profil_picture, 'assets')? asset($message->sender->profil_picture) : asset('storage/photos/users/originals/' . $message->sender->profil_picture)!!}"
                                               name="{!! $message->sender->first_name !!} {!! $message->sender->last_name !!}" date="{{ $message->created_at->diffForHumans() }}"
                                               message="{!! Str::limit($message->text, 40) !!}"/>
                    @endforeach
                </div>
                <x-utils.link name_parent="recap__messages" class_button="button button--blue" svg="arrow-button" label="Voir tous vos messages" href="{!! route('user.messages') !!}" title="Aller vers la page des messages" />
            </section>
        </div>
    </div>

    @if($isOpenDeleteModal)
        <x-user.modal.modal outside="$dispatch('toggleModal', { modal: 'delete' })">
            <x-slot:title>
                Voulez-vous vraiment supprimer cette annonce :
                <span class="modal__container__title__name">
                    {{$chosenPost->name}}
                </span> ?
            </x-slot:title>
            <x-slot:content>
                <div class="modal__container__buttons">
                    <x-utils.button-text wire:click="toggleModal('delete')" classButton="button button--border" name_parent="modal__container__buttons" title="Retourner sur la page de l'annonce" text="Non, retour" svg="arrow-button"/>
                    <x-utils.button-text wire:click="delete()" classButton="button button--red" name_parent="modal__container__buttons" text="Oui, supprimer" title="Supprimer cette annonce" svg="delete"/>
                </div>
            </x-slot:content>
        </x-user.modal.modal>
    @endif

    @if($isOpenShowModal)
        <x-user.modal.modal outside="$dispatch('toggleModal', { modal: 'notif' })">
            <x-slot:title>
                Vos notifications
            </x-slot:title>
            <x-slot:content>
                @foreach($notifications as $notification)
                    <div class="modal__container__notification">
                        <a class="modal__container__notification__link" href="{!! $notification->data['route'] !!}">{!! $notification->data['message'] !!}</a>
                    </div>
                @endforeach
                <div class="modal__container__buttons">
                    <x-utils.button-text wire:click="toggleModal('notif')" classButton="button button--border" name_parent="modal__container__buttons" text="Quitter" title="Quitter les notifications" svg="close"/>
                    <x-utils.button-text wire:click="markAsRead()" classButton="button button--red" name_parent="modal__container__buttons" text="Marquer comme lus" title="Marquer comme lu ces notifications"/>
                </div>
            </x-slot:content>
        </x-user.modal.modal>
    @endif
</main>

<main class="dashboardPage">

    <section class="heading">
        <div class="heading__decoContainer">
            <img class="heading__decoContainer__deco" src="{!! asset('assets/img/deco-blue.png') !!}" alt="Forme bleue, ronde">
        </div>
        <div class="wrapper">
            <div class="heading__content">
                <h2 class="maintitle maintitle--blue maintitle--big heading__content__title">
                    Bonjour {!! $first_name !!},
                </h2>
                <p class="heading__content__text">
                    Bienvenue sur votre espace administrateur, voici un résumé de l'activité sur votre site :
                </p>
            </div>
            <div class="heading__icons">
                <x-utils.button wire:click="toggleModal('notif')" class__button="button button--icon" title="Ouvrir les notifications" name_parent="heading__icons" svg="notifs"/>
                <span class="heading__icons__notifs">
                    {!! $notifications->count() !!}
                </span>
                <x-utils.link-svg class__button="button button--icon" title="Aller vers la page d'accueil" href="{!! route('public.homepage') !!}" name_parent="heading__icons" svg="home"/>
                <form method="POST" action="{{ route('logout') }}" class="heading__icons__form">
                    @csrf
                    <x-user.form.buttons.button svg="deconnexion" class_button="button--red" name_parent="heading__icons__form" text="Deconnexion"/>
                </form>
            </div>
        </div>
    </section>

    <section class="stats">
        <div class="wrapper">
            <h2 class="maintitle maintitle--blue maintitle--small stats__title">
                Quelques statistiques
            </h2>
            <div class="stats__listing">
                <x-admin.stats-card number="{!! $posts_unsold !!}" content="annonces actives" svg="stats-actives"/>
                <x-admin.stats-card number="{!! $posts_sold !!}" content="annonces vendues" svg="stats-vendues"/>
                <x-admin.stats-card number="{!! $users !!}" content="utilisateurs" svg="user-fill"/>
                <x-admin.stats-card number="{!! $contact_messages !!}" content="messages non lus" svg="stats-messages"/>
            </div>
        </div>
    </section>

    <div class="recap" role="region">
        <div class="recap__decoContainer">
            <img class="recap__decoContainer__deco" src="{!! asset('assets/img/deco-red.png') !!}" alt="Forme rose, ronde">
        </div>
        <div class="wrapper">
            <section class="recap__category">
                <h2 class="maintitle maintitle--blue maintitle--small recap__category__title">
                    Les catégories
                </h2>
                <div class="recap__category__listing">
                    @foreach($categories as $category)
                        <div class="recap__category__listing__item">
                            <p class="recap__category__listing__item__text">
                                {!! $category->name !!}
                            </p>
                            <div class="recap__category__listing__item__buttons">
                                <x-utils.button wire:click="toggleModal('modify', {!! $category->id !!})" class__button="button button--icon" title="Modifier la catégorie" name_parent="recap__category__listing__item__buttons" svg="modify"/>
                                <x-utils.button wire:click="toggleModal('delete', {!! $category->id !!})" class__button="button button--icon" title="Supprimer cette catégorie" name_parent="recap__category__listing__item__buttons" svg="delete"/>
                            </div>
                        </div>
                    @endforeach
                </div>
                <x-utils.button-text wire:click="toggleModal('add')" text="Ajouter une catégorie" name_parent="recap__category" class_button="button button--border" svg="add" label="Ajouter une annonce" title="Aller vers la page de vos annonces" />
            </section>
            <section class="recap__messages">
                <h2 class="maintitle maintitle--blue maintitle--small recap__messages__title">
                    Vos derniers messages reçus
                </h2>
                <div class="recap__messages__listing">
                    @foreach($messages as $message)
                        <x-utils.messages-card name_parent="recap__messages__listing"
                                               name="{!! $message->first_name !!} {!! $message->last_name !!}" date="{{ $message->created_at->diffForHumans() }}"
                                               message="{!! Str::limit($message->message, 40) !!}"/>
                    @endforeach
                </div>
                <x-utils.link name_parent="recap__messages" class_button="button button--blue" svg="arrow-button" label="Voir tous vos messages" href="{!! route('admin.messages.index') !!}" title="Aller vers la page des messages" />
            </section>
        </div>
    </div>

    @if($isOpenDeleteModal)
        <x-user.modal.modal outside="$dispatch('toggleModal', { modal: 'delete' })">
            <x-slot:title>
                Voulez-vous vraiment supprimer cette catégorie :
                <span class="modal__container__title__name">
                    {{$chosenCategory->name}}
                </span> ?
            </x-slot:title>
            <x-slot:content>
                <div class="modal__container__buttons">
                    <x-utils.button-text wire:click="toggleModal('delete')" classButton="button button--border" name_parent="modal__container__buttons" title="Retourner sur le dashboard" text="Non, retour" svg="arrow-button"/>
                    <x-utils.button-text wire:click="delete()" classButton="button button--red" name_parent="modal__container__buttons" text="Oui, supprimer" title="Supprimer cette catégorie" svg="delete"/>
                </div>
            </x-slot:content>
        </x-user.modal.modal>
    @endif

    @if($isOpenModifyModal)
        <x-user.modal.modal outside="$dispatch('toggleModal', { modal: 'modify' })">
            <x-slot:title>
                Modifier cette catégorie
            </x-slot:title>
            <x-slot:content>
                <form class="modal__container__form" wire:submit.prevent="modify" method="post">
                    @csrf
                    <x-user.form.fields.input wire:model.live="catform.name" field_name="name" required="required" label="Modifiez le nom" name_parent="modal__container__form"/>
                    <x-user.form.buttons.button text="Valider" name_parent="modal__container__form" class_button="button--red"/>
                </form>
            </x-slot:content>
        </x-user.modal.modal>
    @endif

    @if($isOpenAddModal)
        <x-user.modal.modal outside="$dispatch('toggleModal', { modal: 'add' })">
            <x-slot:title>
                Ajouter une catégorie
            </x-slot:title>
            <x-slot:content>
                <form class="modal__container__form" wire:submit.prevent="create" method="post">
                    @csrf
                    <x-user.form.fields.input wire:model.live="catform.name" field_name="name" required="required" label="Entrez le nom" name_parent="modal__container__form"/>
                    <x-user.form.buttons.button text="Valider" name_parent="modal__container__form" class_button="button--red"/>
                </form>
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

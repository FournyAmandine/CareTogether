<main class="dashboardPage">
    <section class="heading">
        <div class="heading__decoContainer">
            <img class="heading__decoContainer__deco" src="{!! asset('assets/img/deco-blue.png') !!}" alt="Forme bleue, ronde">
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
                <x-utils.button class__button="button button--icon" title="Ouvrir les notifications" name_parent="heading__icons" svg="notifs"/>
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
                <x-user.utils.stats-card number="{!! $posts_unsold !!}" content="annonces actives" svg="stats-actives"/>
                <x-user.utils.stats-card number="{!! $posts_sold !!}" content="annonces vendues" svg="stats-vendues"/>
                <x-user.utils.stats-card number="{!! $rentals !!}" content="locations/prêts" svg="stats-locations"/>
                <x-user.utils.stats-card number="{!! $messages_unread !!}" content="messages non lus" svg="stats-messages"/>
            </div>
            <x-utils.link name_parent="stats" class_button="button button--red" svg="add" label="Ajouter une annonce" href="#" title="Aller vers la page d'ajout d'une annonce" />
        </div>
    </section>

    <div class="recap">
        <div class="recap__decoContainer">
            <img class="recap__decoContainer__deco" src="{!! asset('assets/img/deco-red.png') !!}" alt="Forme rose, ronde">
        </div>
        <div class="wrapper wrapper--small">
            <section class="recap__posts">
                <h2 class="maintitle maintitle--blue maintitle--small recap__posts__title">
                    Vos dernières annonces
                </h2>
                <div class="recap__posts__listing">
                    @foreach($posts as $post)
                        <x-utils.posts-card name_parent="recap__posts__listing" src="{!! asset($post->img_path) !!}"
                                            name="{!! $post->name !!}" date="{!! \Carbon\Carbon::parse($post->created_at)->day !!}"
                                            price="{!! $post->price !!}" :post="$post"/>
                    @endforeach
                </div>
                <x-utils.link name_parent="recap__posts" class_button="button button--border" svg="arrow-button" label="Voir tous vos annonces" href="#" title="Aller vers la page de vos annonces" />
            </section>
            <section class="recap__messages">
                <h2 class="maintitle maintitle--blue maintitle--small recap__messages__title">
                    Vos derniers messages reçus
                </h2>
                <div class="recap__messages__listing">
                    @foreach($messages as $message)
                        <x-utils.messages-card name_parent="recap__messages__listing" src="{!! asset('assets/img/profil.png') !!}"
                                               name="{!! $message->receiver->first_name !!} {!! $message->receiver->last_name !!}" date="{!! \Carbon\Carbon::parse($message->created_at)->day !!}"
                                               message="{!! Str::limit($message->text, 40) !!}"/>
                    @endforeach
                </div>
                <x-utils.link name_parent="recap__messages" class_button="button button--blue" svg="arrow-button" label="Voir tous vos messages" href="#" title="Aller vers la page des messages" />
            </section>
        </div>
    </div>

    @if($isOpenDeleteModal)
        <x-user.modal.modal outside="$dispatch('toggleModal', { modal: 'delete' })">
            <x-slot:title>
                Voulez-vous vraiment supprimer cette annonce :
                <span class="delete__container__title__name">
                    {{$chosenPost->name}}
                </span> ?
            </x-slot:title>
            <x-slot:content>
                <div class="delete__container__buttons">
                    <x-utils.button-text wire:click="toggleModal('delete')" classButton="button button--border" name_parent="delete__container__buttons" title="Retourner sur la page de l'annonce" text="Non, retour" svg="arrow-button"/>
                    <x-utils.button-text wire:click="delete()" classButton="button button--red" name_parent="delete__container__buttons" text="Oui, supprimer" title="Supprimer cette annonce" svg="delete"/>
                </div>
            </x-slot:content>
        </x-user.modal.modal>
    @endif
</main>

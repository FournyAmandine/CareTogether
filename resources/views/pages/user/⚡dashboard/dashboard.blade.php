<main class="dashboardPage">
    <section class="heading">
        <div class="heading__decoContainer">
            <img class="heading__decoContainer__deco" src="{!! asset('assets/img/deco-blue.png') !!}" alt="Forme bleue, ronde">
        </div>
        <div class="wrapper wrapper--small">
            <div class="heading__content">
                <h2 class="maintitle maintitle--blue maintitle--big heading__content__title">
                    Bonjour Sarah,
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
                <x-user.utils.stats-card number="3" content="annonces actives" svg="stats-actives"/>
                <x-user.utils.stats-card number="4" content="annonces vendues" svg="stats-vendues"/>
                <x-user.utils.stats-card number="10" content="locations/prêts" svg="stats-locations"/>
                <x-user.utils.stats-card number="7" content="messages non lus" svg="stats-messages"/>
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
                    <x-utils.posts-card name_parent="recap__posts__listing" src="{!! asset('assets/img/article-1.jpg') !!}" name="Fauteuil roulant" date="2" price="390"/>
                    <x-utils.posts-card name_parent="recap__posts__listing" src="{!! asset('assets/img/article-1.jpg') !!}" name="Fauteuil roulant" date="2" price="390"/>
                    <x-utils.posts-card name_parent="recap__posts__listing" src="{!! asset('assets/img/article-1.jpg') !!}" name="Fauteuil roulant" date="2" price="390"/>
                    <x-utils.posts-card name_parent="recap__posts__listing" src="{!! asset('assets/img/article-1.jpg') !!}" name="Fauteuil roulant" date="2" price="390"/>
                    <x-utils.posts-card name_parent="recap__posts__listing" src="{!! asset('assets/img/article-1.jpg') !!}" name="Fauteuil roulant" date="2" price="390"/>
                </div>
                <x-utils.link name_parent="recap__posts" class_button="button button--border" svg="arrow-button" label="Voir tous vos annonces" href="#" title="Aller vers la page de vos annonces" />
            </section>
            <section class="recap__messages">
                <h2 class="maintitle maintitle--blue maintitle--small recap__messages__title">
                    Vos derniers messages reçus
                </h2>
                <div class="recap__messages__listing">
                    <x-utils.messages-card name_parent="recap__messages__listing" src="{!! asset('assets/img/profil.png') !!}" name="Marc Delpierre" date="3" message="Bonjour, je vous contacte pour votre..."/>
                    <x-utils.messages-card name_parent="recap__messages__listing" src="{!! asset('assets/img/profil.png') !!}" name="Marc Delpierre" date="3" message="Bonjour, je vous contacte pour votre..."/>
                    <x-utils.messages-card name_parent="recap__messages__listing" src="{!! asset('assets/img/profil.png') !!}" name="Marc Delpierre" date="3" message="Bonjour, je vous contacte pour votre..."/>
                    <x-utils.messages-card name_parent="recap__messages__listing" src="{!! asset('assets/img/profil.png') !!}" name="Marc Delpierre" date="3" message="Bonjour, je vous contacte pour votre..."/>
                    <x-utils.messages-card name_parent="recap__messages__listing" src="{!! asset('assets/img/profil.png') !!}" name="Marc Delpierre" date="3" message="Bonjour, je vous contacte pour votre..."/>
                </div>
                <x-utils.link name_parent="recap__messages" class_button="button button--blue" svg="arrow-button" label="Voir tous vos messages" href="#" title="Aller vers la page des messages" />
            </section>
        </div>
    </div>
</main>

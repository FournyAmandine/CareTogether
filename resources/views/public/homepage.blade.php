<x-public.app>
    <x-slot:title_page>
        Accueil
    </x-slot:title_page>
    <main class="homePage">
        <section class="banner">
            <div class="banner__backgroundContainer">
                <img class="banner__backgroundContainer__background" src="{!! asset('assets/img/home-banner-background.jpg') !!}" alt="Fond bleu avec une chaise roulante en avant plan à droite">
            </div>
            <div class="wrapper">
                <h2 class="maintitle banner__title">
                    Partager pour
                    <span class="banner__title__span">
                        soigner
                    </span>
                </h2>
                <p class="banner__subtitle">
                    La plateforme dédiée au prêt, au don et à la vente de matériel médical de seconde main pour faciliter l’accès aux soins pour tous
                </p>
                <div class="banner__buttons">
                    <x-public.utils.link href="{!! route('public.posts.index') !!}" class-button="button--red" name_parent="banner__buttons" title="Aller vers la page Annonces" label="Voir les annonces">
                        <x-slot:svg>
                            <svg class="banner__buttons__buttonContainer__button__icon">
                                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#arrow-button') }}"></use>
                            </svg>
                        </x-slot:svg>
                    </x-public.utils.link>
                    <x-public.utils.link href="#" class-button="button--blue" name_parent="buttonbanner__buttons" title="Aller vers la page Inscription" label="Se créer un compte">
                        <x-slot:svg>
                            <svg class="banner__buttons__buttonContainer__button__icon">
                                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#arrow-button') }}"></use>
                            </svg>
                        </x-slot:svg>
                    </x-public.utils.link>
                </div>
            </div>
        </section>
        <section class="hook">
            <div class="hook__backgroundContainer">
                <img class="hook__backgroundContainer__background" src="{!! asset('assets/img/svg/home-hook-background.svg') !!}" alt="Fond bleu">
            </div>
            <div class="wrapper">
                <div class="hook__main">
                    <div class="hook__main__imgContainer">
                        <img class="hook__main__imgContainer__img" src="{!! asset('assets/img/home-hook-deco.jpg') !!}" alt="2 personnes qui tiennent un carton rempli de matériel">
                    </div>
                    <div class="hook__main__contentContainer">
                        <h2 class="maintitle maintitle--big maintitle--blue hook__main__contentContainer__title">
                            Donner une
                            <strong class="hook__main__contentContainer__title__strong">
                                seconde vie
                            </strong>
                            à votre matériel médical
                        </h2>
                        <x-public.utils.link href="#" class-button="button--red" name_parent="hook__main__contentContainer" title="Aller vers la page AJout d'annonce" label="Ajouter une annonce">
                            <x-slot:svg>
                                <svg class="hook__main__contentContainer__button__icon">
                                    <use xlink:href="{{ asset('assets/img/svg/sprite.svg#arrow-button') }}"></use>
                                </svg>
                            </x-slot:svg>
                        </x-public.utils.link>
                    </div>
                </div>
            </div>
        </section>
        <section class="steps">
            <div class="steps__decoContainer">
                <img class="steps__decoContainer__deco" src="{!! asset('assets/img/home-steps-deco.png') !!}" alt="Forme bleu, ronde">
            </div>
            <div class="wrapper">
                <h2 class="maintitle maintitle--blue steps__title">
                    Comment ça marche?
                </h2>
                <div class="steps__listing">
                    <x-public.home.steps-item number="1" title="Publier"
                                              text="Mettez en ligne le matériel médical que vous souhaitez vendre, louer ou donner" />
                    <x-public.home.steps-item number="2" title="Contacter"
                                              text="Échangez avec les personnes intéressées via notre messagerie sécurisée" />
                    <x-public.home.steps-item number="3" title="Récupérer"
                                              text="Rencontrez-vous pour remettre le matériel en toute sécurité" />
                </div>
            </div>
        </section>
        <section class="stats">
            <div class="stats__backgroundContainer">
                <img class="stats__backgroundContainer__background" src="{!! asset('assets/img/home-stats-background.jpg') !!}" alt="Fond bleu">
            </div>
            <div class="wrapper">
                <h2 class="maintitle maintitle--blue maintitle--big stats__title">
                    <strong class="stats__title__strong">Ensemble</strong>, améliorons l’accès au matériel médical
                </h2>
                <div class="stats__listing">
                    <x-public.home.stats-item title="250" text="Annonces publiées">
                        <x-slot:svg>
                            <svg class="stats__listing__item__titleContainer__icon">
                                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#home-stats-annonces') }}"></use>
                            </svg>
                        </x-slot:svg>
                    </x-public.home.stats-item>
                    <x-public.home.stats-item title="120" text="Utilisateurs actifs">
                        <x-slot:svg>
                            <svg class="stats__listing__item__titleContainer__icon">
                                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#home-stats-users') }}"></use>
                            </svg>
                        </x-slot:svg>
                    </x-public.home.stats-item>
                </div>
            </div>
        </section>
        <section class="posts">
            <div class="posts__decoContainer">
                <img class="posts__decoContainer__deco" src="{!! asset('assets/img/home-annonces-deco.png') !!}" alt="Forme bleu, ronde">
            </div>
            <div class="wrapper">
                <h2 class="maintitle maintitle--blue posts__title">
                    Nos dernières annonces
                </h2>
                <div class="posts__listing">
                    <x-public.home.card title="FAUTEUIL ROULANT PLIABLE" img-src="{!! asset('assets/img/article-1.jpg') !!}" locality="Marche-en-Famenne" state="Bon état" price="390"/>
                    <x-public.home.card title="FAUTEUIL ROULANT PLIABLE" img-src="{!! asset('assets/img/article-1.jpg') !!}" locality="Marche-en-Famenne" state="Bon état" price="390"/>
                    <x-public.home.card title="FAUTEUIL ROULANT PLIABLE" img-src="{!! asset('assets/img/article-1.jpg') !!}" locality="Marche-en-Famenne" state="Bon état" price="390"/>
                    <x-public.home.card title="FAUTEUIL ROULANT PLIABLE" img-src="{!! asset('assets/img/article-1.jpg') !!}" locality="Marche-en-Famenne" state="Bon état" price="390"/>
                </div>
            </div>
        </section>
    </main>
</x-public.app>



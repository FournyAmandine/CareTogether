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
                <h2 class="maintitle banner__title" data-aos="fade-right" data-aos-delay="200" data-aos-duration="500">
                    Partager pour
                    <span class="banner__title__span">
                        soigner
                    </span>
                </h2>
                <p class="banner__subtitle" data-aos="fade-right" data-aos-delay="300" data-aos-duration="500">
                    La plateforme dédiée au prêt, au don et à la vente de matériel médical de seconde main pour faciliter l’accès aux soins pour tous
                </p>

                <p class="banner__subtitle banner__subtitle--tel" data-aos="fade-right" data-aos-delay="300" data-aos-duration="500">
                    La plateforme de prêt, don et vente de matériel médical de seconde main pour faciliter l’accès aux soins.                </p>
                <div class="banner__buttons" data-aos="fade-right" data-aos-delay="400" data-aos-duration="500">
                    <x-utils.link href="{{ route('public.posts.index') }}" svg="arrow-button" class-button="button--red" name_parent="banner__buttons" title="Aller vers la page Annonces" label="Voir les annonces"/>
                    @if(!auth()->check())
                        <x-utils.link href="{{ route('register') }}" svg="arrow-button" class-button="button--blue" name_parent="banner__buttons" title="Aller vers la page Inscription" label="Créer un compte"/>
                    @endif
                </div>
            </div>
        </section>
        <section class="hook">
            <div class="hook__backgroundContainer">
                <img class="hook__backgroundContainer__background" src="{!! asset('assets/img/svg/home-hook-background.svg') !!}" alt="Fond bleu">
            </div>
            <div class="wrapper">
                <div class="hook__main">
                    <div class="hook__main__imgContainer" data-aos="fade-right" data-aos-delay="100" data-aos-duration="500">
                        <img class="hook__main__imgContainer__img" src="{{ asset('assets/img/home-hook-deco.jpg') }}" alt="2 personnes qui tiennent un carton rempli de matériel">
                    </div>
                    <div class="hook__main__contentContainer" data-aos="fade-left" data-aos-delay="200" data-aos-duration="500">
                        <h2 class="maintitle maintitle--big maintitle--blue hook__main__contentContainer__title">
                            Donner une
                            <strong class="hook__main__contentContainer__title__strong">
                                seconde vie
                            </strong>
                            à votre matériel médical
                        </h2>
                        <x-utils.link href="#" svg="arrow-button" class-button="button--red" name_parent="hook__main__contentContainer" title="Aller vers la page AJout d'annonce" label="Ajouter une annonce"/>
                    </div>
                </div>
            </div>
        </section>
        <section class="steps">
            <div class="steps__decoContainer" data-aos="fade-in" data-aos-delay="100" data-aos-duration="500">
                <img class="steps__decoContainer__deco" src="{{ asset('assets/img/deco-red.png') }}" alt="Forme bleu, ronde">
            </div>
            <div class="wrapper">
                <h2 class="maintitle maintitle--blue steps__title" data-aos="fade-down" data-aos-delay="100" data-aos-duration="500">
                    Comment ça marche?
                </h2>
                <div class="steps__listing">
                    <x-public.home.steps-item loop="1" number="1" title="Publier"
                                              text="Mettez en ligne le matériel médical que vous souhaitez vendre, louer ou donner" />
                    <x-public.home.steps-item loop="2" number="2" title="Contacter"
                                              text="Échangez avec les personnes intéressées via notre messagerie sécurisée" />
                    <x-public.home.steps-item loop="3" number="3" title="Récupérer"
                                              text="Rencontrez-vous pour remettre le matériel en toute sécurité" />
                </div>
            </div>
        </section>
        <section class="stats">
            <div class="stats__backgroundContainer" data-aos="fade-left" data-aos-delay="200" data-aos-duration="500">
                <img class="stats__backgroundContainer__background" src="{{ asset('assets/img/home-stats-background.jpg') }}" alt="Fond bleu">
            </div>
            <div class="wrapper">
                <h2 class="maintitle maintitle--blue maintitle--big stats__title" data-aos="fade-right" data-aos-delay="200" data-aos-duration="500">
                    <strong class="stats__title__strong">Ensemble</strong>, améliorons l’accès au matériel médical
                </h2>
                <div class="stats__listing">
                    <x-public.home.stats-item svg="home-stats-annonces" title="{!! $allPosts !!}" text="Annonces publiées"/>
                    <x-public.home.stats-item svg="home-stats-users" title="{!! $users !!}" text="Utilisateurs actifs"/>
                </div>
            </div>
        </section>
        <section class="posts">
            <div class="posts__decoContainer" data-aos="fade-in" data-aos-delay="100" data-aos-duration="500">
                <img class="posts__decoContainer__deco" src="{{ asset('assets/img/deco-blue.png') }}" alt="Forme bleu, ronde">
            </div>
            <div class="wrapper">
                <h2 class="maintitle maintitle--blue posts__title" data-aos="fade-down" data-aos-delay="100" data-aos-duration="500">
                    Nos dernières annonces
                </h2>
                <x-utils.listing-cards :posts="$posts" :registered-post-ids="$registeredPostIds"/>
            </div>
        </section>
    </main>
</x-public.app>



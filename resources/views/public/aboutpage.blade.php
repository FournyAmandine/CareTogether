<x-public.app>
    <x-slot:title_page>
        À propos
    </x-slot:title_page>
    <main class="aboutPage">
        <section class="banner banner--about">
            <div class="banner__backgroundContainer">
                <img class="banner__backgroundContainer__background" src="{!! asset('assets/img/about-banner-background.jpg') !!}" alt="Mains tenant un coeur">
            </div>
            <div class="wrapper">
                <h2 class="maintitle banner__title">
                    Faciliter l’accès au matériel médical grâce à la seconde main.
                </h2>
                <div class="banner__buttons">
                    <x-utils.link svg="arrow-button" href="{!! route('public.posts.index') !!}" class-button="button--red" name_parent="banner__buttons" title="Aller vers la page Inscription" label="S'inscrire"/>
                    <x-utils.link svg="arrow-button" href="#" class-button="button--blue" name_parent="banner__buttons" title="Aller vers la page Annonces" label="Voir les annonces"/>
                </div>
            </div>
        </section>

        <section class="about">
            <div class="about__decoContainer">
                <img class="about__decoContainer__deco" src="{!! asset('assets/img/deco-header.png') !!}" alt="">
            </div>
            <div class="wrapper">
                <div class="about__contentContainer">
                    <h2 class="maintitle maintitle--blue about__contentContainer__title">
                        Qu’est-ce que CareTogether?
                    </h2>
                    <p class="about__contentContainer__content">
                        CareTogether est une plateforme dédiée au prêt, au don et à la vente de matériel médical de seconde main.
                    </p>
                    <p  class="about__contentContainer__content">
                        Elle vise à faciliter la mise en relation entre particuliers souhaitant donner une seconde vie à du matériel médical et des personnes en ayant besoin.
                    </p>
                    <p  class="about__contentContainer__content">
                        Fauteuils roulants, lits médicalisés, déambulateurs ou équipements de confort représentent souvent un investissement important et ne sont utilisés que temporairement. CareTogether propose une solution simple, locale et solidaire pour favoriser leur réutilisation.
                    </p>
                    <x-utils.link svg="arrow-button" href="{!! route('public.posts.index') !!}" class-button="button--red" name_parent="about__contentContainer" title="Aller vers la page Inscription" label="Créer un compte"/>
                </div>
                <div class="about__imgContainer">
                    <img class="about__imgContainer__img" src="{!! asset('assets/img/about-about-image.png') !!}" alt="Homme tenant l'épaule d'une femme dans un lit médical">
                </div>
            </div>
        </section>

        <section class="objectifs">
            <div class="objectifs__decoContainer">
                <img  class="objectifs__decoContainer__deco" src="{!! asset('assets/img/svg/about-objectifs-deco.svg') !!}" alt="2 mains qui tiennent un coeur avec une croix médicale">
            </div>
            <div class="wrapper">
                <h2 class="maintitle maintitle--blue objectifs__title">
                    Les objectifs de CareTogether
                </h2>
                <div class="objectifs__listing">
                    <x-public.about.objectifs-item svg="cadenas" title="Faciliter l’accès au matériel médical d’occasion"/>
                    <x-public.about.objectifs-item svg="gaspi" title="Encourager la réutilisation et réduire le gaspillage"/>
                    <x-public.about.objectifs-item svg="search-button" title="Simplifier la publication et la recherche d’annonces parmi toutes celles disponibles"/>
                    <x-public.about.objectifs-item svg="securite" title="Créer une plateforme claire, intuitive et sécurisée pour tous les utilisateurs"/>
                    <x-public.about.objectifs-item svg="cadenas" title="Simplifier la mise en relation entre utilisateurs"/>
                    <x-public.about.objectifs-item svg="map" title="Favoriser une dynamique solidaire et local"/>
                </div>
            </div>
        </section>

        <section class="problems">
            <div class="problems__backgroundContainer">
                <img class="problems__backgroundContainer__background" src="{!! asset('assets/img/about-problem-image.jpg') !!}" alt="Personne en chaise roulante">
            </div>
            <div class="wrapper">
                <h2 class="maintitle maintitle--blue problems__title">
                    Ce projet répond à une problématique
                </h2>
                <div class="problems__contentContainer">
                    <p class="problems__contentContainer__content">
                        L’accès au matériel médical peut représenter un coût élevé, notamment lorsqu’il est nécessaire pour une durée limitée (convalescence, perte d’autonomie temporaire, soins à domicile).
                    </p>
                    <p class="problems__contentContainer__content">
                        Parallèlement, de nombreux équipements restent inutilisés après usage, faute de solution adaptée pour les revendre, les prêter ou les donner en toute simplicité.
                    </p>
                    <p  class="problems__contentContainer__content">
                        Cette situation entraîne :
                    </p>
                    <ul  class="problems__contentContainer__list">
                        <x-utils.list-item svg="list-button" name_parent="problems__contentContainer__list" item="Un gaspillage de ressources"/>
                        <x-utils.list-item svg="list-button" name_parent="problems__contentContainer__list" item="Des dépenses évitables pour les familles"/>
                        <x-utils.list-item svg="list-button" name_parent="problems__contentContainer__list" item="Une difficulté d’accès au matériel pour certaines personnes"/>
                    </ul>
                    <p  class="problems__contentContainer__content">
                        <strong>
                            CareTogether
                        </strong>
                        répond à cette problématique en centralisant les annonces et en facilitant la mise en relation entre utilisateurs.:
                    </p>
                </div>
            </div>
        </section>

        <section class="values">
            <div class="values__decoContainer">
                <img class="values__decoContainer__deco" src="{!! asset('assets/img/deco-red.png') !!}" alt="">
            </div>
            <div class="wrapper">
                <h2 class="maintitle maintitle--blue values__title">
                    Les valeurs de CareTogether
                </h2>
                <div class="values__contentContainer">
                    <p  class="values__contentContainer__content">
                        CareTogether repose sur des valeurs fortes :
                    </p>
                    <ul class="values__contentContainer__list">
                        <x-utils.list-item svg="heart" name_parent="values__contentContainer__list">
                            <x-slot:item>
                                <h3 class="values__contentContainer__list__item__textContainer__title">
                                    Solidarité
                                </h3>
                                Favoriser l’entraide entre particuliers et soutenir les personnes en situation de besoin.
                            </x-slot:item>
                        </x-utils.list-item>

                        <x-utils.list-item svg="responsabilite" name_parent="values__contentContainer__list">
                            <x-slot:item>
                                <h3 class="values__contentContainer__list__item__textContainer__title">
                                    Responsabilité
                                </h3>
                                Encourager la seconde vie des équipements et limiter le gaspillage.
                            </x-slot:item>
                        </x-utils.list-item>

                        <x-utils.list-item svg="accessibilite" name_parent="values__contentContainer__list">
                            <x-slot:item>
                                <h3 class="values__contentContainer__list__item__textContainer__title">
                                    Accessibilité
                                </h3>
                                Permettre à chacun d’accéder à du matériel médical à moindre coût.
                            </x-slot:item>
                        </x-utils.list-item>

                        <x-utils.list-item svg="confiance" name_parent="values__contentContainer__list">
                            <x-slot:item>
                                <h3 class="values__contentContainer__list__item__textContainer__title">
                                    Confiance
                                </h3>
                                Proposer une plateforme claire, transparente et respectueuse des   utilisateurs.
                            </x-slot:item>
                        </x-utils.list-item>
                    </ul>
                </div>
            </div>
        </section>
    </main>
</x-public.app>

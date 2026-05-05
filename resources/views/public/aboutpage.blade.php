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
                    <x-public.utils.link href="{!! route('public.posts.index') !!}" class-button="button--red" name_parent="banner__buttons" title="Aller vers la page Inscription" label="S'inscrire">
                        <x-slot:svg>
                            <svg class="banner__buttons__buttonContainer__button__icon">
                                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#arrow-button') }}"></use>
                            </svg>
                        </x-slot:svg>
                    </x-public.utils.link>
                    <x-public.utils.link href="#" class-button="button--blue" name_parent="banner__buttons" title="Aller vers la page Annonces" label="Voir les annonces">
                        <x-slot:svg>
                            <svg class="banner__buttons__buttonContainer__button__icon">
                                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#arrow-button') }}"></use>
                            </svg>
                        </x-slot:svg>
                    </x-public.utils.link>
                </div>
            </div>
        </section>

        <section class="about">
            <div class="about__decoContainer">
                <img class="about__decoContainer__deco" src="{!! asset('assets/img/about-about-deco.png') !!}" alt="Forme bleue, ronde">
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
                    <x-public.utils.link href="{!! route('public.posts.index') !!}" class-button="button--red" name_parent="about__contentContainer" title="Aller vers la page Inscription" label="Créer un compte">
                        <x-slot:svg>
                            <svg class="banner__buttons__buttonContainer__button__icon">
                                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#arrow-button') }}"></use>
                            </svg>
                        </x-slot:svg>
                    </x-public.utils.link>
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
                    <x-public.about.objectifs-item title="Faciliter l’accès au matériel médical d’occasion">
                        <x-slot:svg>
                            <svg class="objectifs__listing__item__icon">
                                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#cadenas') }}"></use>
                            </svg>
                        </x-slot:svg>
                    </x-public.about.objectifs-item>

                    <x-public.about.objectifs-item title="Encourager la réutilisation et réduire le gaspillage">
                        <x-slot:svg>
                            <svg class="objectifs__listing__item__icon">
                                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#gaspi') }}"></use>
                            </svg>
                        </x-slot:svg>
                    </x-public.about.objectifs-item>

                    <x-public.about.objectifs-item title="Simplifier la publication et la recherche d’annonces parmi toutes celles disponibles">
                        <x-slot:svg>
                            <svg class="objectifs__listing__item__icon">
                                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#search-button') }}"></use>
                            </svg>
                        </x-slot:svg>
                    </x-public.about.objectifs-item>

                    <x-public.about.objectifs-item title="Créer une plateforme claire, intuitive et sécurisée pour tous les utilisateurs">
                        <x-slot:svg>
                            <svg class="objectifs__listing__item__icon">
                                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#securite') }}"></use>
                            </svg>
                        </x-slot:svg>
                    </x-public.about.objectifs-item>

                    <x-public.about.objectifs-item title="Simplifier la mise en relation entre utilisateurs">
                        <x-slot:svg>
                            <svg class="objectifs__listing__item__icon">
                                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#cadenas') }}"></use>
                            </svg>
                        </x-slot:svg>
                    </x-public.about.objectifs-item>

                    <x-public.about.objectifs-item title="Favoriser une dynamique solidaire et local">
                        <x-slot:svg>
                            <svg class="objectifs__listing__item__icon">
                                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#map') }}"></use>
                            </svg>
                        </x-slot:svg>
                    </x-public.about.objectifs-item>
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
                        <x-public.about.list-item name_parent="problems__contentContainer__list" item="Un gaspillage de ressources">
                            <x-slot:svg>
                                <svg class="problems__contentContainer__list__item__icon">
                                    <use xlink:href="{{ asset('assets/img/svg/sprite.svg#list-button') }}"></use>
                                </svg>
                            </x-slot:svg>
                        </x-public.about.list-item>
                        <x-public.about.list-item name_parent="problems__contentContainer__list" item="Des dépenses évitables pour les familles">
                            <x-slot:svg>
                                <svg class="problems__contentContainer__list__item__icon">
                                    <use xlink:href="{{ asset('assets/img/svg/sprite.svg#list-button') }}"></use>
                                </svg>
                            </x-slot:svg>
                        </x-public.about.list-item>
                        <x-public.about.list-item name_parent="problems__contentContainer__list" item="Une difficulté d’accès au matériel pour certaines personnes">
                            <x-slot:svg>
                                <svg class="problems__contentContainer__list__item__icon">
                                    <use xlink:href="{{ asset('assets/img/svg/sprite.svg#list-button') }}"></use>
                                </svg>
                            </x-slot:svg>
                        </x-public.about.list-item>
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
                <img class="values__decoContainer__deco" src="{!! asset('assets/img/deco-red.png') !!}" alt="Forme rose, ronde">
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
                        <x-public.about.list-item name_parent="values__contentContainer__list">
                            <x-slot:svg>
                                <svg class="values__contentContainer__list__item__icon">
                                    <use xlink:href="{{ asset('assets/img/svg/sprite.svg#heart') }}"></use>
                                </svg>
                            </x-slot:svg>
                            <x-slot:item>
                                <span class="values__contentContainer__list__item__textContainer__title">
                                    Solidarité
                                </span>
                                Favoriser l’entraide entre particuliers et soutenir les personnes en situation de besoin.
                            </x-slot:item>
                        </x-public.about.list-item>

                        <x-public.about.list-item name_parent="values__contentContainer__list">
                            <x-slot:svg>
                                <svg class="values__contentContainer__list__item__icon">
                                    <use xlink:href="{{ asset('assets/img/svg/sprite.svg#responsabilite') }}"></use>
                                </svg>
                            </x-slot:svg>
                            <x-slot:item>
                                <span class="values__contentContainer__list__item__textContainer__title">
                                    Responsabilité
                                </span>
                                Encourager la seconde vie des équipements et limiter le gaspillage.
                            </x-slot:item>
                        </x-public.about.list-item>

                        <x-public.about.list-item name_parent="values__contentContainer__list">
                            <x-slot:svg>
                                <svg class="values__contentContainer__list__item__icon">
                                    <use xlink:href="{{ asset('assets/img/svg/sprite.svg#accessibilite') }}"></use>
                                </svg>
                            </x-slot:svg>
                            <x-slot:item>
                                <span class="values__contentContainer__list__item__textContainer__title">
                                    Accessibilité
                                </span>
                                Permettre à chacun d’accéder à du matériel médical à moindre coût.
                            </x-slot:item>
                        </x-public.about.list-item>

                        <x-public.about.list-item name_parent="values__contentContainer__list">
                            <x-slot:svg>
                                <svg class="values__contentContainer__list__item__icon">
                                    <use xlink:href="{{ asset('assets/img/svg/sprite.svg#confiance') }}"></use>
                                </svg>
                            </x-slot:svg>
                            <x-slot:item>
                                <span class="values__contentContainer__list__item__textContainer__title">
                                    Confiance
                                </span>
                                Proposer une plateforme claire, transparente et respectueuse des   utilisateurs.
                            </x-slot:item>
                        </x-public.about.list-item>
                    </ul>
                </div>
            </div>
        </section>
    </main>
</x-public.app>

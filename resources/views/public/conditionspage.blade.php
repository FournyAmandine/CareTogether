<x-public.app>
    <x-slot:title_page>
        Conditions générales d’utilisation
    </x-slot:title_page>
    <main class="textPage">
        <section class="text" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500">
            <div class="text__decoContainer">
                <img class="text__decoContainer__deco" src="{{ asset('assets/img/svg/deco-texte.svg') }}" alt="Décoration de 2 mains qui tiennent une croix de pharmacie">
            </div>
            <div class="wrapper wrapper--text">
                <div class="text__main">
                    <h2 class="maintitle maintitle--blue text__main__title">
                        Conditions générales d’utilisation
                    </h2>
                    <div class="text__main__contentContainer">
                        <x-public.texts.content title="Objet">
                            <x-public.texts.text text="Les présentes conditions générales d’utilisation ont pour objet de définir les modalités d’accès et d’utilisation de la plateforme CareTogether."/>
                            <x-public.texts.text class="text__main__contentContainer__content__text__item--margin"
                                                 text="CareTogether est une plateforme permettant la mise en relation de particuliers pour le prêt, la vente ou le don de matériel médical d’occasion."/>
                        </x-public.texts.content>

                        <x-public.texts.content title="Accès au site">
                            <x-public.texts.text text="L’accès au site est gratuit. Certaines fonctionnalités nécessitent la création d’un compte utilisateur."/>
                            <x-public.texts.text class="text__main__contentContainer__content__text__item--margin"
                                                 text="L’utilisateur s’engage à fournir des informations exactes lors de son inscription."/>
                        </x-public.texts.content>

                        <x-public.texts.content title="Responsabilité des utilisateurs">
                            <x-public.texts.text text="Les utilisateurs sont seuls responsables :"/>
                            <x-public.texts.list>
                                <x-public.texts.item item="Du contenu des annonces publiées"/>
                                <x-public.texts.item item="De l’exactitude des informations fournies"/>
                                <x-public.texts.item item="Des échanges effectués via la plateforme"/>
                            </x-public.texts.list>
                            <x-public.texts.text class="text__main__contentContainer__content__text__item--margin"
                                                 text="Il est interdit de publier :"/>
                            <x-public.texts.list>
                                <x-public.texts.item item="Des contenus illégaux"/>
                                <x-public.texts.item item="Des contenus frauduleux"/>
                                <x-public.texts.item item="Des annonces mensongères"/>
                                <x-public.texts.item item="Du matériel médical non conforme ou dangereux"/>
                            </x-public.texts.list>
                        </x-public.texts.content>

                        <x-public.texts.content title="Rôle de la plateforme">
                            <x-public.texts.text text="CareTogether agit en tant qu’intermédiaire technique."/>
                            <x-public.texts.text class="text__main__contentContainer__content__text__item--margin"
                                                 text="La plateforme n’intervient pas dans :"/>
                            <x-public.texts.list>
                                <x-public.texts.item item="Les transactions financières entre utilisateurs"/>
                                <x-public.texts.item item="La qualité ou la conformité du matériel échangé"/>
                            </x-public.texts.list>
                            <x-public.texts.text class="text__main__contentContainer__content__text__item--margin"
                                                 text="La responsabilité des transactions repose exclusivement sur les utilisateurs."/>
                        </x-public.texts.content>

                        <x-public.texts.content title="Suspension ou suppression de compte">
                            <x-public.texts.text text="L’éditeur se réserve le droit de suspendre ou supprimer un compte en cas de non-respect des présentes conditions."/>
                        </x-public.texts.content>

                        <x-public.texts.content title="Modification des conditions">
                            <x-public.texts.text text=" Les présentes conditions peuvent être modifiées à tout moment."/>
                            <x-public.texts.text class="text__main__contentContainer__content__text__item--margin"
                                                 text="Les utilisateurs sont invités à les consulter régulièrement."/>
                        </x-public.texts.content>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-public.app>


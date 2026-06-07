<x-public.app>
    <x-slot:title_page>
        Politique de confidentialité
    </x-slot:title_page>
    <main class="textPage">
        <section class="text">
            <div class="text__decoContainer">
                <img class="text__decoContainer__deco" src="{{ asset('assets/img/svg/deco-texte.svg') }}" alt="Décoration de 2 mains qui tiennent une croix de pharmacie">
            </div>
            <div class="wrapper wrapper--text">
                <div class="text__main">
                    <h2 class="maintitle maintitle--blue text__main__title">
                        Politique de confidentialité
                    </h2>
                    <div class="text__main__contentContainer">
                        <x-public.texts.content title="Données collectées">
                            <x-public.texts.text text="Dans le cadre de l’utilisation de la plateforme CareTogether, les données suivantes peuvent être collectées :"/>
                            <x-public.texts.list>
                                <x-public.texts.item item="Nom et prénom"/>
                                <x-public.texts.item item="Adresse email"/>
                                <x-public.texts.item item="Mot de passe (chiffré)"/>
                                <x-public.texts.item item="Informations relatives aux annonces publiées"/>
                                <x-public.texts.item item="Messages échangés via la messagerie interne"/>
                                <x-public.texts.item item="Données techniques (adresse IP, données de connexion)"/>
                            </x-public.texts.list>
                        </x-public.texts.content>

                        <x-public.texts.content title="Finalité du traitement">
                            <x-public.texts.text text="Les données sont collectées afin de :"/>
                            <x-public.texts.list>
                                <x-public.texts.item item="Permettre la création et la gestion des comptes utilisateurs"/>
                                <x-public.texts.item item="Faciliter la mise en relation entre utilisateurs"/>
                                <x-public.texts.item item="Permettre la publication et la gestion d’annonces"/>
                                <x-public.texts.item item="Assurer la sécurité de la plateforme"/>
                                <x-public.texts.item item="Améliorer l’expérience utilisateur"/>
                            </x-public.texts.list>
                            <x-public.texts.text class="text__main__contentContainer__content__text__item--margin"
                                                 text="Les données ne sont en aucun cas revendues à des tiers."/>
                        </x-public.texts.content>

                        <x-public.texts.content title="Base légale">
                            <x-public.texts.text text="Le traitement des données repose sur :"/>
                            <x-public.texts.list>
                                <x-public.texts.item item="Le consentement de l’utilisateur"/>
                                <x-public.texts.item item="L’exécution du service proposé par la plateforme"/>
                            </x-public.texts.list>
                        </x-public.texts.content>

                        <x-public.texts.content title="Conservation des données">
                            <x-public.texts.text text="Les données sont conservées :"/>
                            <x-public.texts.list>
                                <x-public.texts.item item="Tant que le compte utilisateur est actif"/>
                                <x-public.texts.item item="Ou jusqu’à la demande de suppression par l’utilisateur"/>
                            </x-public.texts.list>
                        </x-public.texts.content>

                        <x-public.texts.content title="Droits des utilisateurs">
                            <x-public.texts.text text="Conformément au Règlement Général sur la Protection des Données (RGPD), vous disposez des droits suivants :"/>
                            <x-public.texts.list>
                                <x-public.texts.item item="Droit d’accès"/>
                                <x-public.texts.item item="Droit de rectification"/>
                                <x-public.texts.item item="Droit de suppression"/>
                                <x-public.texts.item item="Droit d’opposition"/>
                                <x-public.texts.item item="Droit à la limitation du traitement"/>
                                <x-public.texts.item item="Droit à la portabilité"/>
                            </x-public.texts.list>
                            <x-public.texts.text class="text__main__contentContainer__content__text__item--margin"
                                                 text="Pour exercer ces droits : amandine.fourny@student.hepl.be"/>
                        </x-public.texts.content>

                        <x-public.texts.content title="Sécurité">
                            <x-public.texts.text text="Le site met en œuvre des mesures techniques et organisationnelles visant à protéger les données personnelles contre tout accès non autorisé, modification ou divulgation."/>
                        </x-public.texts.content>

                        <x-public.texts.content title="Cookies">
                            <x-public.texts.text text="Le site peut utiliser des cookies strictement nécessaires à son fonctionnement (authentification, sécurité, préférences utilisateur)."/>
                            <x-public.texts.text class="text__main__contentContainer__content__text__item--margin"
                                                 text="Aucun cookie publicitaire n’est utilisé."/>
                        </x-public.texts.content>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-public.app>


    <x-public.app>
        <x-slot:title_page>
            Mentions légales
        </x-slot:title_page>
        <main class="textPage">
            <section class="text">
                <div class="text__decoContainer">
                    <img class="text__decoContainer__deco" src="{{ asset('assets/img/svg/deco-texte.svg') }}" alt="Décoration de 2 mains qui tiennent une croix de pharmacie">
                </div>
                <div class="wrapper wrapper--text">
                <div class="text__main">
                    <h2 class="maintitle maintitle--blue maintitle--big text__main__title">
                        Mentions légales
                    </h2>
                    <div class="text__main__contentContainer">
                        <x-public.texts.content title="Éditeur">
                            <x-public.texts.text text="Le site est édité par Amandine Fourny"/>
                            <x-public.texts.text text="Adresse : Bastogne"/>
                            <x-public.texts.text text="Email : amandine.fourny@student.hepl.be"/>
                            <x-public.texts.text text="Statut : étudiante"/>
                            <x-public.texts.text class="text__main__contentContainer__content__text__item--margin" text="Ce site est réalisé dans le cadre d’un travail académique"/>
                        </x-public.texts.content>

                        <x-public.texts.content title="Hébergement">
                            <x-public.texts.text text="Le site est hébergé par LaravelCLoud"/>
                            <x-public.texts.text>
                                <x-slot:text>
                                    Site web : <a href="https://cloud.laravel.com/" title="Aller vers le site LaravelCloud">LaravelCloud</a>
                                </x-slot:text>
                            </x-public.texts.text>
                        </x-public.texts.content>

                        <x-public.texts.content title="Propriété intellectuelle">
                            <x-public.texts.text text="L’ensemble du contenu présent sur ce site (textes, images, graphismes, logo, icônes, etc.) est la propriété exclusive de Amandine Fourny, sauf mention contraire."/>
                            <x-public.texts.text class="text__main__contentContainer__content__text__item--margin"
                                                 text="Toute reproduction, représentation,  modification, publication, adaptation totale ou partielle des éléments  de ce site, quel que soit le moyen ou le procédé utilisé, est interdite, sauf autorisation écrite préalable."/>
                        </x-public.texts.content>

                        <x-public.texts.content title="Responsabilités">
                            <x-public.texts.text text="L’éditeur s’efforce de fournir des informations aussi précises que possible. Toutefois, il ne pourra être tenu responsable des omissions, inexactitudes ou carences dans la mise à jour."/>
                            <x-public.texts.text class="text__main__contentContainer__content__text__item--margin"
                                                 text=" Le site peut contenir des liens vers des sites tiers. L’éditeur n’exerce aucun contrôle sur ces sites et décline toute responsabilité concernant leur contenu."/>
                        </x-public.texts.content>
                    </div>
                </div>
                </div>
            </section>
        </main>
    </x-public.app>


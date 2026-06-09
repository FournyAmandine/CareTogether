<footer class="footer">
    <h2 class="sro footer__title">Footer</h2>
    <div class="footer__primary">
        <x-utils.logo name_parent="footer__primary" />
        <div class="footer__primary__links">
            <div class="footer__primary__links__navigation">
                <h3 class="maintitle maintitle--footer footer__primary__links__navigation__title">Navigation</h3>
                <x-public.navigation.list.list-footer name_parent="footer__primary__links__navigation"/>
            </div>
            <div class="footer__primary__links__contact">
                <h3 class="maintitle maintitle--footer footer__primary__links__contact__title">Contact</h3>
                <x-utils.link name_parent="button--footer footer__primary__links__contact" href="mailto:amandine.fourny@student.hepl.be" label="amandine.fourny@student.hepl.be" title="Envoyer un mail à amandine.fourny@student.hepl.be"/>
                <x-utils.link name_parent="button--footer footer__primary__links__contact" href="tel:0472483260" label="0472 48 32 60" title="Télephone au 0472 48 32 60"/>
            </div>
        </div>
    </div>
    <div class="footer__secondary">
        <nav class="footer__secondary__navigation">
            <h3 class="sro footer__secondary__navigation__title">Navigation secondaire</h3>
            <ul class="footer__secondary__navigation__list">
                <x-public.navigation.list.link name_parent="footer__secondary__navigation__list"
                                               :href="route('public.mentionspage')"
                                               label="Mention légales"
                                               :active="request()->url() == route('public.mentionspage')"/>
                <x-public.navigation.list.link name_parent="footer__secondary__navigation__list"
                                               :href="route('public.policypage')"
                                               label="Politique de confidentialité"
                                               :active="request()->url() == route('public.policypage')"/>
                <x-public.navigation.list.link name_parent="footer__secondary__navigation__list"
                                               :href="route('public.conditionspage')"
                                               label="Conditions d’utilisation"
                                               :active="request()->url() == route('public.conditionspage')"/>
                <li class="footer__secondary__navigation__list__item">
                    <p class="footer__secondary__navigation__list__item__text">© Tous droits réservés. Créé par Amandine Fourny</p>
                </li>
            </ul>
        </nav>
    </div>
</footer>

<x-public.app>
    <x-slot:title_page>
        Contact
    </x-slot:title_page>
    <main class="contactPage">
        <div class="contact">
            <div class="contact__backgroundContainer">
                <img class="contact__backgroundContainer__background" src="{!! asset('assets/img/svg/home-hook-background.svg') !!}" alt="Fond bleu">
            </div>
            <div class="wrapper">
                <aside class="contact__aside">
                    <h2 class="maintitle maintitle--blue contact__aside__title" data-aos="fade-right" data-aos-delay="100" data-aos-duration="500">
                        Une question pratique?
                    </h2>
                    <p class="contact__aside__content" data-aos="fade-right" data-aos-delay="200" data-aos-duration="500">
                        Que vous ayez une question sur
                        <strong>
                            la création de compte, la publication d’annonce, la messagerie ou autre
                        </strong>
                        , n’hésitez pas à nous contactez et nous répondrons dans les plus
                        <strong>
                            bref délais !
                        </strong>

                    </p>
                    <div class="contact__aside__imgContainer" data-aos="fade-right" data-aos-delay="300" data-aos-duration="500">
                        <img class="contact__aside__imgContainer__img" src="{!! asset('assets/img/contact-image.png') !!}" alt="Illustration d'une personne qui tient les épaules d'une personne en scooter">
                    </div>
                </aside>
                <div class="contact__formContainer" data-aos="fade-left" data-aos-delay="200" data-aos-duration="500">
                    <h2 class="maintitle maintitle--blue contact__formContainer__title">
                        Dites nous bonjour !
                    </h2>
                    @if(session('success'))
                        <div class="contact__formContainer__success">
                            Votre message a été envoyé avec succès !
                        </div>
                    @else
                    <form class="contact__formContainer__form" action="{!! route('public.contactpage.store') !!}" method="post">
                        @csrf

                        @if ($errors->any())
                            <div class="contact__formContainer__form__error">
                                @foreach ($errors->all() as $error)
                                    <p class="contact__formContainer__form__error__text">{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <div class="contact__formContainer__form__name">
                            <x-public.form.fields.input
                                name_parent="contact__formContainer__form"
                                field_name="last_name" required="required"
                                placeholder="Mozin" label="Nom"/>

                            <x-public.form.fields.input
                                name_parent="contact__formContainer__form"
                                field_name="first_name" required="required"
                                placeholder="Loïc" label="Prénom"/>
                        </div>

                        <x-public.form.fields.input
                            name_parent="contact__formContainer__form" type="email"
                            field_name="email" required="required"
                            placeholder="mozinloic@gmail.com" label="Email"/>

                        <x-public.form.fields.input
                            name_parent="contact__formContainer__form"
                            field_name="subject" required="required"
                            placeholder="Ajout d’annonce" label="Sujet"/>

                        <x-public.form.fields.textarea
                            name_parent="contact__formContainer__form"
                            field_name="message" required="required"
                            placeholder="Bonjour, je voudrais..." label="Message"/>

                        <x-public.form.buttons.button name_parent="contact__formContainer__form"
                                                      class_button="button--red" text="Envoyer"/>
                    </form>
                    @endif
                </div>
                <div class="contact__imgContainer">
                    <img class="contact__imgContainer__img" src="{!! asset('assets/img/contact-image.png') !!}" alt="Illustration d'une personne qui tient les épaules d'une personne en scooter">
                </div>
            </div>
        </div>
    </main>
</x-public.app>

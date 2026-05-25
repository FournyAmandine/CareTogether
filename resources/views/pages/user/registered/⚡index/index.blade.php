<main class="registeredPage">

    <x-user.utils.heading title="Vos annonces enregistrées"/>

    <x-user.utils.deco/>

    <section class="registered">
        <div class="wrapper wrapper--small">
            <div class="registered__sliderContainer">
                <x-utils.button name_parent="registered__sliderContainer" svg="arrow-simple" title="Voir les annonces précédentes" classButton="button button--icon button--icon button--arrow button--arrow--left js-registered-prev"/>
                <div class="registered__sliderContainer__slider">
                @foreach($registered_posts as $registered_post)
                    <x-utils.card title="{{ $registered_post->name }}" type="{{ $registered_post->type }}"
                                            svg="{!! Str::slug($registered_post->category->name, '_')!!}"
                                            price="{{ $registered_post->price }}" locality="{{ $registered_post->locality }}"
                                            state="{{ $registered_post->state }}" modifier="registered"
                                            imgSrc="{{Str::startsWith($registered_post->images()->first()->img_path, 'assets')
                                                    ? asset($registered_post->images()->first()->img_path)
                                                    : asset('storage/photos/posts/originals/' . $registered_post->images()->first()->img_path)}}"
                                            src="{!! route('public.posts.show', $registered_post->id) !!}"/>
                @endforeach
                </div>
                <x-utils.button name_parent="registered__sliderContainer" svg="arrow-simple" title="Voir les annonces suivantes" classButton="button button--icon button--arrow js-registered-next"/>
                @if($registered_posts->isEmpty())
                    <x-user.utils.empty text="Il n'y a aucune annonce enregistrée pour le moment"
                                        label="Voir toutes les annonces" href="{!! route('public.posts.index') !!}" title="Aller sur la page avec les annonces"/>
                @endif
            </div>
        </div>
    </section>
</main>

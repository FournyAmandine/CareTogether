<main class="registeredPage">

    <x-user.utils.heading title="Vos annonces enregistrées"/>

    <section class="registered">
        <div class="wrapper wrapper--small">
            <div class="registered__listing">
                @forelse($registered_posts as $registered_post)
                    <x-utils.card title="{{ $registered_post->name }}" type="{{ $registered_post->type }}"
                                            svg="{!! Str::slug($registered_post->category, '_')!!}"
                                            price="{{ $registered_post->price }}" locality="{{ $registered_post->locality }}"
                                            state="{{ $registered_post->state }}" modifier="registered"
                                            imgSrc="{{ asset($registered_post->img_path) }}" src="{!! route('public.posts.show', $registered_post->id) !!}"/>
                @empty
                    <x-user.utils.empty text="Il n'y a aucune annonce enregistrée pour le moment"
                                        label="Voir toutes les annonces" href="{!! route('public.posts.index') !!}" title="Aller sur la page avec les annonces"/>
                @endforelse
            </div>
        </div>
    </section>
</main>

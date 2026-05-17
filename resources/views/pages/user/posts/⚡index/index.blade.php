<main class="postsPage">
    <x-user.utils.heading title="Vos annonces" :button="true"/>

    <section class="posts">
        <div class="wrapper wrapper--small">
            <h3 class="posts__title">
                Ventes/dons
            </h3>
            <div class="posts__listing">
                @forelse($sales as $sale)
                    <x-user.utils.post-card title="{{ $sale->name }}" type="{{ $sale->type }}"
                                  svg="{!! Str::slug($sale->category, '_')!!}"
                                  price="{{ $sale->price }}" locality="{{ $sale->locality }}"
                                  state="{{ $sale->state }}" modifier="post"
                                  imgSrc="{{ asset($sale->img_path) }}" src="{!! route('public.posts.show', $sale->id) !!}"
                                    views="{{ $sale->views }}" registered="{!! $sale->registeredByUser()->count() !!}"/>
                @empty
                    <x-user.utils.empty text="Il n'y a aucun achat ou don pour le moment"
                                        label="Voir toutes les annonces" href="{!! route('public.posts.index') !!}" title="Aller sur la page avec les annonces"/>
                @endforelse
            </div>
        </div>
    </section>

    <section class="posts">
        <div class="wrapper wrapper--small">
            <h3 class="posts__title">
                Locations/prêts
            </h3>
            <div class="posts__listing">
                @forelse($rentals as $rental)
                    <x-user.utils.post-card title="{{ $rental->name }}" type="{{ $rental->type }}"
                                            svg="{!! Str::slug($rental->category, '_')!!}"
                                            price="{{ $rental->price }}" locality="{{ $rental->locality }}"
                                            state="{{ $rental->state }}" modifier="post"
                                            imgSrc="{{ asset($rental->img_path) }}" src="{!! route('public.posts.show', $rental->id) !!}"
                                            views="{{ $rental->views }}" registered="{{ $rental->registeredByUser()->count() }}"/>
                @empty
                    <x-user.utils.empty text="Il n'y a aucune location ou prêt pour le moment"
                                        label="Voir toutes les annonces" href="{!! route('public.posts.index') !!}" title="Aller sur la page avec les annonces"/>
                @endforelse
            </div>
        </div>
    </section>
</main>

<main class="salesPage">

    <x-user.utils.heading title="Vos achats et dons"/>

    <section class="sales">
        <div class="wrapper wrapper--small">
            <div class="sales__listing">
                @forelse($sales as $sale)
                    <x-user.utils.sale-card title="{{ $sale->post->name }}"
                                              svg="{!! Str::slug($sale->post->category, '_')!!}"
                                              price="{{ $sale->post->price }}"
                                              imgSrc="{{ asset($sale->post->img_path) }}"/>
                @empty
                    <x-user.utils.empty text="Il n'y a aucun achat pour le moment"
                                        label="Voir toutes les annonces" href="{!! route('public.posts.index') !!}" title="Aller sur la page avec les annonces"/>
                @endforelse
            </div>
        </div>
    </section>
</main>

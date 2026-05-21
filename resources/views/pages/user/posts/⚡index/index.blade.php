<main class="postsPage">
    <x-user.utils.heading title="Vos annonces" :button="true"/>

    <x-user.utils.deco/>

    <section class="posts">
        <div class="wrapper wrapper--small">
            <h3 class="posts__title">
                Ventes/dons
            </h3>
            <div class="posts__sliderContainer">
                <x-utils.button name_parent="posts__sliderContainer" svg="arrow-simple" title="Voir les annonces précédentes" classButton="button button--icon button--icon button--arrow button--arrow--left js-sale-prev"/>
                <div class="posts__sliderContainer__slider posts__sliderContainer__slider--sale">
                    @foreach($sales as $sale)
                        <x-user.utils.post-card title="{{ $sale->name }}" type="{{ $sale->type }}"
                                                svg="{!! Str::slug($sale->category, '_')!!}"
                                                price="{{ $sale->price }}" locality="{{ $sale->locality }}"
                                                state="{{ $sale->state }}" modifier="post"
                                                imgSrc="{{ asset($sale->img_path) }}" src="{!! route('user.posts.show', $sale->id) !!}"
                                                views="{{ $sale->views }}" registered="{!! $sale->registeredByUser->count() !!}"/>
                    @endforeach
                </div>
                <x-utils.button name_parent="posts__sliderContainer" svg="arrow-simple" title="Voir les annonces suivantes" classButton="button button--icon button--arrow js-sale-next"/>
                @if($sales->isEmpty())
                    <x-user.utils.empty text="Il n'y a aucune annonce pour le moment"
                                        label="Ajouter une annonce" href="#" title="Aller sur la page d'ajout d'une annonce"/>
                @endif
            </div>
        </div>
    </section>

    <section class="posts">
        <div class="wrapper wrapper--small">
            <h3 class="posts__title">
                Locations/prêts
            </h3>
            <div class="posts__sliderContainer">
                <x-utils.button name_parent="posts__sliderContainer" svg="arrow-simple" title="Voir les annonces précédentes" classButton="button button--icon button--icon button--arrow button--arrow--left js-rental-prev"/>
                <div class="posts__sliderContainer__slider posts__sliderContainer__slider--rental">
                @foreach($rentals as $rental)
                    <x-user.utils.post-card title="{{ $rental->name }}" type="{{ $rental->type }}"
                                            svg="{!! Str::slug($rental->category, '_')!!}"
                                            price="{{ $rental->price }}" locality="{{ $rental->locality }}"
                                            state="{{ $rental->state }}" modifier="post"
                                            imgSrc="{{ asset($rental->img_path) }}" src="{!! route('user.posts.show', $rental->id) !!}"
                                            views="{{ $rental->views }}" registered="{{ $rental->registeredByUser->count() }}"/>
                @endforeach
                </div>
                <x-utils.button name_parent="posts__sliderContainer" svg="arrow-simple" title="Voir les annonces suivantes" classButton="button button--icon button--arrow js-rental-next"/>
                @if($rentals->isEmpty())
                    <x-user.utils.empty text="Il n'y a aucune annonce pour le moment"
                                        label="Ajouter une annonce" href="#" title="Aller sur la page d'ajout d'une annonce"/>
                @endif
            </div>
        </div>
    </section>
</main>

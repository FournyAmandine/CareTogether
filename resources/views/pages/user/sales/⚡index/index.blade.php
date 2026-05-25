<main class="salesPage">

    <x-user.utils.heading title="Vos achats et dons"/>

    <x-user.utils.deco/>

    <section class="sales">
        <div class="wrapper wrapper--small">
            <div class="sales__sliderContainer">
                <x-utils.button name_parent="sales__sliderContainer" svg="arrow-simple" title="Voir les annonces précédentes" classButton="button button--icon button--icon button--arrow button--arrow--left js-prev"/>
                <div class="sales__sliderContainer__slider">
                @foreach($sales as $sale)
                    <x-user.utils.sale-card title="{{ $sale->post->name }}"
                                              svg="{!! Str::slug($sale->post->category->name, '_')!!}"
                                              price="{{ $sale->post->price }}"
                                              imgSrc="{{Str::startsWith($sale->post->images()->first()->img_path, 'assets')
                                                    ? asset($sale->post->images()->first()->img_path)
                                                    : asset('storage/photos/posts/originals/' . $sale->post->images()->first()->img_path)}}"/>
                @endforeach
            </div>
            <x-utils.button name_parent="sales__sliderContainer" svg="arrow-simple" title="Voir les annonces suivantes" classButton="button button--icon button--arrow js-next"/>
            @if($sales->isEmpty())
                <x-user.utils.empty text="Il n'y a aucun achat pour le moment"
                                    label="Voir toutes les annonces" href="{!! route('public.posts.index') !!}" title="Aller sur la page avec les annonces"/>
            @endif
        </div>
        </div>
    </section>
</main>

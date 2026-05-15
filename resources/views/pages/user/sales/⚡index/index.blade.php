<main class="salesPage">

    <x-user.utils.heading title="Vos achats et dons"/>

    <section class="sales">
        <div class="wrapper wrapper--small">
            <div class="sales__listing">
                @foreach($sales as $sale)
                    <x-user.utils.sale-card title="{{ $sale->post->name }}"
                                              svg="{!! Str::slug($sale->post->category, '_')!!}"
                                              price="{{ $sale->post->price }}"
                                              imgSrc="{{ asset($sale->post->img_path) }}"/>
                @endforeach
            </div>
        </div>
    </section>
</main>

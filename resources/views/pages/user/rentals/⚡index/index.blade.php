<main class="rentalsPage">

    <x-user.utils.heading title="Vos locations et prêts"/>

    <x-user.utils.deco/>

    <section class="rentals">
        <div class="wrapper wrapper--small">
            <h3 class="rentals__title">
                En cours
            </h3>
            <div class="rentals__sliderContainer">
                <x-utils.button name_parent="rentals__sliderContainer" svg="arrow-simple" title="Voir les annonces précédentes" classButton="button button--icon button--icon button--arrow button--arrow--left js-current-prev"/>
                <div class="rentals__sliderContainer__slider rentals__sliderContainer__slider--current">
                @foreach($current_rentals as $current_rental)
                        @php
                            $image = $current_rental->post->images()->first();
                        @endphp
                    <x-user.utils.rental-card title="{{ $current_rental->post->name }}"
                                              svg="{!! Str::slug($current_rental->post->category->name, '_')!!}"
                                              date="{{ \Carbon\Carbon::parse($current_rental->end_date)->locale('fr')->translatedFormat('d F Y')  }}"
                                              price="{{ $current_rental->post->price }}"
                                              imgSrc="{{ $image?->img_path
                                                    ? (Str::startsWith($image->img_path, 'assets')
                                                        ? asset($image->img_path)
                                                        : asset('storage/photos/posts/originals/' . $image->img_path))
                                                    : asset('assets/img/post-image.jpg') }}"/>
                @endforeach
                </div>
                <x-utils.button name_parent="rentals__sliderContainer" svg="arrow-simple" title="Voir les annonces suivantes" classButton="button button--icon button--arrow js-current-next"/>
                @if($current_rentals->isEmpty())
                    <x-user.utils.empty text="Il n'y a aucune location en cours pour le moment"
                                        label="Voir toutes les annonces" href="{!! route('public.posts.index') !!}" title="Aller sur la page avec les annonces"/>
                @endif
            </div>
        </div>
        </div>
    </section>

    <section class="rentals rentals--ended">
        <div class="wrapper wrapper--small">
            <h3 class="rentals__title">
                Terminés
            </h3>
            <div class="rentals__sliderContainer">
                <x-utils.button name_parent="rentals__sliderContainer" svg="arrow-simple" title="Voir les annonces précédentes" classButton="button button--icon button--icon button--arrow button--arrow--left js-ended-prev"/>
                <div class="rentals__sliderContainer__slider rentals__sliderContainer__slider--ended">
                @foreach($ended_rentals as $ended_rental)
                        @php
                            $image = $ended_rental->post->images()->first();
                        @endphp
                    <x-user.utils.rental-card title="{{ $ended_rental->post->name }}"
                                              svg="{!! Str::slug($ended_rental->post->category->name, '_')!!}"
                                              price="{{ $ended_rental->post->price }}"
                                              imgSrc="{{ $image?->img_path
                                                    ? (Str::startsWith($image->img_path, 'assets')
                                                        ? asset($image->img_path)
                                                        : asset('storage/photos/posts/originals/' . $image->img_path))
                                                    : asset('assets/img/post-image.jpg') }}"/>
                @endforeach
            </div>
            <x-utils.button name_parent="rentals__sliderContainer" svg="arrow-simple" title="Voir les annonces suivantes" classButton="button button--icon button--arrow js-ended-next"/>
            @if($ended_rentals->isEmpty())
                <x-user.utils.empty text="Il n'y a aucune location terminée pour le moment"
                                    label="Voir toutes les annonces" href="{!! route('public.posts.index') !!}" title="Aller sur la page avec les annonces"/>
            @endif
            </div>
        </div>
    </section>
</main>

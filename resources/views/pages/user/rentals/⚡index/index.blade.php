<main class="rentalsPage">

    <section class="heading">
        <x-utils.deco modifier="user"/>
        <div class="wrapper wrapper--small">
            {{ Breadcrumbs::render() }}
            <h2 class="maintitle maintitle--blue heading__title">
                Vos locations et prêts
            </h2>
        </div>
    </section>

    <section class="rentals">
        <div class="wrapper wrapper--small">
            <h3 class="rentals__title">
                En cours
            </h3>
            <div class="rentals__listing">
                @foreach($current_rentals as $current_rental)
                    <x-user.utils.rental-card title="{{ $current_rental->post->name }}"
                                              svg="{!! Str::slug($current_rental->post->category, '_')!!}"
                                              date="{{ \Carbon\Carbon::parse($current_rental->end_date)->locale('fr')->translatedFormat('d F Y')  }}"
                                              price="{{ $current_rental->post->price }}"
                                              imgSrc="{{ asset($current_rental->post->img_path) }}"/>
                @endforeach
            </div>
        </div>
    </section>

    <section class="rentals rentals--ended">
        <div class="wrapper wrapper--small">
            <h3 class="rentals__title">
                Terminés
            </h3>
            <div class="rentals__listing">
                @foreach($ended_rentals as $ended_rental)
                    <x-user.utils.rental-card title="{{ $ended_rental->post->name }}"
                                              svg="{!! Str::slug($ended_rental->post->category, '_')!!}"
                                              price="{{ $ended_rental->post->price }}"
                                              imgSrc="{{ asset($ended_rental->post->img_path) }}"/>
                @endforeach
            </div>
        </div>
    </section>
</main>

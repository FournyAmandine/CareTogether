<x-public.app>
    <x-slot:title_page>
        Annonces
    </x-slot:title_page>
    <main class="postsPage">

        <section class="posts">
            <div class="posts__decoContainer">
                <img class="posts__decoContainer__deco" src="{!! asset('assets/img/deco-header.png') !!}" alt="Forme bleue, ronde">
            </div>
            <div class="wrapper">
                <h2 class="maintitle maintitle--blue posts__title">
                    Découvrez toutes nos annonces
                </h2>

                <div class="posts__filter">

                </div>

                <div class="posts__listing">
                    @foreach($posts as $post)
                        <x-public.home.card title="{!! $post->name !!}"
                                            locality="{!! $post->locality !!}"
                                            state="{!! $post->state !!}"
                                            price="{!! $post->price !!}"
                                            imgSrc="{!! $post->img_path !!}"
                                            svg="{!! Str::slug($post->category, '_')!!}"
                        />
                    @endforeach
                </div>
            </div>
        </section>
    </main>
</x-public.app>

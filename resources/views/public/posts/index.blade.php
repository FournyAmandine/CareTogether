<x-public.app>
    <x-slot:title_page>
        Annonces
    </x-slot:title_page>
    <main class="postsPage">

        <section class="posts">
            <x-utils.deco/>
            <div class="wrapper">
                <h2 class="maintitle maintitle--blue posts__title">
                    Découvrez toutes nos annonces
                </h2>

                <div class="posts__filter">

                </div>

                <x-utils.listing-cards :posts="$posts"/>

                <div class="posts__pagination">
                    {{ $posts->onEachSide(1)->links() }}
                </div>
            </div>
        </section>
    </main>
</x-public.app>

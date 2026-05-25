<x-public.app :post="$post">
    <x-slot:title_page>
        {!! $post->name !!}
    </x-slot:title_page>
    <main class="singlePostPage">

        <section class="detail">
            <x-utils.deco/>
            <div class="wrapper">
                <div class="detail__main">
                    <div class="detail__main__listing">
                        <button class="detail__main__listing__iconContainer" title="Mettre en favoris">
                            <svg class="detail__main__listing__iconContainer__icon">
                                <use xlink:href="{{ asset('assets/img/svg/sprite.svg#register') }}"></use>
                            </svg>
                        </button>
                        @if($existingImages == [])
                            <div class="detail__main__listing__imgContainer">
                                <img class="detail__main__listing__imgContainer__img detail__main__listing__imgContainer__img--general" src="{{ asset('assets/img/post-image.jpg') }}" alt="Image de l'article">
                            </div>
                        @else
                            @foreach($existingImages as $image)
                                <div class="detail__main__listing__imgContainer">
                                    @if(Str::startsWith($image['img_path'], 'assets'))
                                        <img class="detail__main__listing__imgContainer__img" src="{{ asset($image['img_path']) }}" alt="Image de l'article : {!! $post->name !!}">
                                    @else
                                        <img class="detail__main__listing__imgContainer__img" src="{{ asset('storage/photos/posts/originals/' . $image['img_path']) }}" alt="Image de l'article : {!! $post->name !!}">
                                    @endif
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="detail__main__contentContainer">
                        <div class="detail__main__contentContainer__infos">
                            <h2 class="detail__main__contentContainer__infos__title">
                                {!! $post->name !!}
                            </h2>
                            <p class="detail__main__contentContainer__infos__price">
                                {!! $post->price !!}€
                            </p>
                            <ul class="detail__main__contentContainer__infos__list">
                                <x-utils.list-item svg="map-pin" name_parent="detail__main__contentContainer__infos__list" item="{!! $post->locality !!}"/>
                                <x-utils.list-item svg="state" name_parent="detail__main__contentContainer__infos__list" item="{!! $post->state !!}"/>
                                <x-utils.list-item svg="date" name_parent="detail__main__contentContainer__infos__list" item="Ajouté il y a {{ \Carbon\Carbon::parse($post->created_at)->day }} jours"/>
                                <x-utils.list-item svg="user" name_parent="detail__main__contentContainer__infos__list" item="Vendu par Sarah Deseurs"/>
                                <x-utils.list-item svg="category" name_parent="detail__main__contentContainer__infos__list" item="{!! $post->category->name !!}"/>
                                <x-utils.list-item svg="marque" name_parent="detail__main__contentContainer__infos__list" item="{!! $post->marque !!}"/>
                            </ul>
                        </div>
                        <div class="detail__main__contentContainer__description">
                            <p class="detail__main__contentContainer__description__title">
                                Description du produit :
                            </p>
                            <p class="detail__main__contentContainer__description__text">
                                <svg class="detail__main__contentContainer__description__text__icon">
                                    <use xlink:href="{{ asset('assets/img/svg/sprite.svg#description') }}"></use>
                                </svg>
                                {!! $post->description !!}
                            </p>
                        </div>
                    </div>
                </div>
                <x-utils.link name_parent="detail" href="#" svg="arrow-button" class-button="button--red" title="Aller vers la page Message" label="Contacter le vendeur"/>
            </div>
        </section>

        <section class="posts">
            <div class="posts__decoContainer">
                <img class="posts__decoContainer__deco" src="{!! asset('assets/img/deco-red.png') !!}" alt="Forme bleu, ronde">
            </div>
            <div class="wrapper">
                <h2 class="maintitle maintitle--blue posts__title">
                    Dernières annonces dans la catégorie : {!! $post->category->name !!}
                </h2>
                <x-utils.listing-cards :posts="$posts"/>
            </div>
        </section>
    </main>
</x-public.app>

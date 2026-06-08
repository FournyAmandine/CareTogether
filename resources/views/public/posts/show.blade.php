<x-public.app :post="$post" modifier="show">
    <x-slot:title_page>
        {!! $post->name !!}
    </x-slot:title_page>
    <main class="singlePostPage">

        <x-utils.button-text onclick="history.back()" name_parent="singlePostPage" svg="arrow-button" title="Retourner sur la page précédente" text="Retour" class-button="button button--back"/>

        <section class="detail" itemscope itemtype="https://schema.org/Product">
            <x-utils.deco/>
            <div class="wrapper">
                @if($post->sold == 1)
                    <div class="detail__sold">
                    <span class="detail__sold__text">
                        @if($post->type == \App\Enums\PostType::Sale->value)
                            vendu
                        @elseif($post->type == \App\Enums\PostType::Donation->value)
                            donné
                        @elseif($post->type == \App\Enums\PostType::Rental->value)
                            loué
                        @elseif($post->type == \App\Enums\PostType::Loan->value)
                            prêté
                        @endif
                    </span>
                    </div>
                @endif
                <div class="detail__main">
                    <div class="detail__main__listing" data-aos="fade-right" data-aos-delay="100" data-aos-duration="500">
                        @if(in_array($post->id, $registeredPostIds))
                            <form action="{{ route('public.posts.unregister', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="detail__main__listing__iconContainer" title="Mettre en favoris">
                                    <svg class="detail__main__listing__iconContainer__icon detail__main__listing__iconContainer__icon--delete">
                                        <use xlink:href="{{ asset('assets/img/svg/sprite.svg#registered_fill') }}"></use>
                                    </svg>
                                </button>
                            </form>
                        @else
                            <form action="{{ route('public.posts.register', $post) }}" method="POST">
                                @csrf

                                <button type="submit" class="detail__main__listing__iconContainer detail__main__listing__iconContainer__icon--add" title="Mettre en favoris">
                                    <svg class="detail__main__listing__iconContainer__icon">
                                        <use xlink:href="{{ asset('assets/img/svg/sprite.svg#register') }}"></use>
                                    </svg>
                                </button>
                            </form>
                        @endif
                        @if($existingImages == [])
                            <div class="detail__main__listing__imgContainer" itemprop="image">
                                <a class="detail__main__listing__imgContainer__link" href="{{ asset('assets/img/post-image.jpg') }}">
                                    <img class="detail__main__listing__imgContainer__link__img detail__main__listing__imgContainer__link__img--general" src="{{ asset('assets/img/post-image.jpg') }}" alt="Image de l'article">
                                </a>
                            </div>
                        @else
                            @foreach($existingImages as $image)
                                <div class="detail__main__listing__imgContainer" itemprop="image">
                                    @if(Str::startsWith($image['img_path'], 'assets'))
                                        <a class="detail__main__listing__imgContainer__link" href="{!! $image['img_path'] !!}">
                                            <img class="detail__main__listing__imgContainer__link__img" src="{{ asset($image['img_path']) }}" alt="Image de l'article : {!! $post->name !!}">
                                        </a>
                                    @else
                                        <a class="detail__main__listing__imgContainer__link" href="{{ asset('storage/photos/posts/originals/' . $image['img_path']) }}">
                                            <img class="detail__main__listing__imgContainer__link__img" src="{{ asset('storage/photos/posts/originals/' . $image['img_path']) }}" alt="Image de l'article : {!! $post->name !!}">
                                        </a>
                                    @endif
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="detail__main__contentContainer" data-aos="fade-left" data-aos-delay="200" data-aos-duration="500">
                        <div class="detail__main__contentContainer__infos">
                            <h2 class="detail__main__contentContainer__infos__title"  itemprop="name">
                                {!! $post->name !!}
                            </h2>
                            <p class="detail__main__contentContainer__infos__price"  itemprop="offers">
                                {!! $post->price !!}€
                            </p>
                            <ul class="detail__main__contentContainer__infos__list">
                                <x-utils.list-item itemprop="displayLocation" svg="map-pin" name_parent="detail__main__contentContainer__infos__list" item="{!! $post->locality !!}"/>
                                <x-utils.list-item svg="state" name_parent="detail__main__contentContainer__infos__list" item="{!! $post->state !!}"/>
                                <x-utils.list-item itemprop="releaseDate" svg="date" name_parent="detail__main__contentContainer__infos__list" item="Ajouté {{ $post->created_at->diffForHumans() }}"/>
                                <x-utils.list-item itemprop="owner" svg="user" name_parent="detail__main__contentContainer__infos__list" item="Vendu par {!! $post->user->first_name . ' ' . $post->user->last_name!!}"/>
                                <x-utils.list-item itemprop="category" svg="category" name_parent="detail__main__contentContainer__infos__list" item="{!! $post->category->name !!}"/>
                                <x-utils.list-item itemprop="manufacturer" svg="marque" name_parent="detail__main__contentContainer__infos__list" item="{!! $post->marque !!}"/>
                            </ul>
                        </div>
                        <div class="detail__main__contentContainer__description" data-aos="fade-left" data-aos-delay="300" data-aos-duration="500">
                            <p class="detail__main__contentContainer__description__title">
                                Description du produit :
                            </p>
                            <p class="detail__main__contentContainer__description__text" itemprop="description">
                                <svg class="detail__main__contentContainer__description__text__icon">
                                    <use xlink:href="{{ asset('assets/img/svg/sprite.svg#description') }}"></use>
                                </svg>
                                {!! $post->description !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="detail__buttons" data-aos="fade-left" data-aos-delay="400" data-aos-duration="500">
                    @if(in_array($post->id, $registeredPostIds))
                        <form action="{{ route('public.posts.unregister', $post) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <x-user.form.buttons.button text="Enlever des annonces enregistrées" name_parent="detail__buttons" class_button="button--blue" svg="registered_fill"/>
                        </form>
                    @else
                        <form action="{{ route('public.posts.register', $post) }}" method="POST">
                            @csrf

                            <x-user.form.buttons.button text="Enregister l'annonce" name_parent="detail__buttons" class_button="button--blue" svg="register"/>
                        </form>
                    @endif
                    @if($post->sold == 0)

                        <form action="{{ route('public.posts.contact', $post->id) }}" method="POST">
                            @csrf

                            <x-user.form.buttons.button name_parent="detail__buttons" class_button="button--red" text="Contacter le vendeur"/>
                        </form>
                    @endif
                </div>
            </div>
        </section>

        <section class="posts">
            <div class="posts__decoContainer">
                <img class="posts__decoContainer__deco" src="{!! asset('assets/img/deco-red.png') !!}" alt="">
            </div>
            <div class="wrapper">
                <h2 class="maintitle maintitle--blue posts__title" data-aos="fade-right" data-aos-delay="100" data-aos-duration="500">
                    Dernières annonces dans la catégorie : {!! $post->category->name !!}
                </h2>
                <x-utils.listing-cards :posts="$posts" :registered-post-ids="$registeredPostIds"/>
            </div>
        </section>
    </main>
</x-public.app>

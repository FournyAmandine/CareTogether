<x-public.app :post="$post">
    <x-slot:title_page>
        {!! $post->name !!}
    </x-slot:title_page>
    <main class="singlePostPage">

        <section class="detail">
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
                    <div class="detail__main__listing">
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
                                <x-utils.list-item svg="date" name_parent="detail__main__contentContainer__infos__list" item="Ajouté {{ $post->created_at->diffForHumans() }}"/>
                                <x-utils.list-item svg="user" name_parent="detail__main__contentContainer__infos__list" item="Vendu par {!! $post->user->first_name . ' ' . $post->user->last_name!!}"/>
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
                @if($post->sold == 0)

                    <form action="{{ route('public.posts.contact', $post->id) }}" method="POST">
                        @csrf

                        <x-user.form.buttons.button name_parent="detail" class_button="button--red" text="Contacter le vendeur"/>
                    </form>
                @endif
            </div>
        </section>

        <section class="posts">
            <div class="posts__decoContainer">
                <img class="posts__decoContainer__deco" src="{!! asset('assets/img/deco-red.png') !!}" alt="">
            </div>
            <div class="wrapper">
                <h2 class="maintitle maintitle--blue posts__title">
                    Dernières annonces dans la catégorie : {!! $post->category->name !!}
                </h2>
                <x-utils.listing-cards :posts="$posts" :registered-post-ids="$registeredPostIds"/>
            </div>
        </section>
    </main>
</x-public.app>

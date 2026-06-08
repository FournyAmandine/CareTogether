@props(['src', 'date', 'name', 'name_parent', 'date', 'price', 'post' => ''])

<div class="{!! $name_parent !!}__item">
    <a class="{!! $name_parent !!}__item__link" href="{!! route('public.posts.show', $post->id) !!}">
        <div class="{!! $name_parent !!}__item__link__imgContainer">
            <img class="{!! $name_parent !!}__item__link__imgContainer__img" src="{!! $src !!}" alt="Photo du l'annonce {!! $name !!}">
        </div>
        <div class="{!! $name_parent !!}__item__link__contentContainer">
            <p class="{!! $name_parent !!}__item__link__contentContainer__name">
                {!! $name !!}
            </p>
            <span class="{!! $name_parent !!}__item__link__contentContainer__price">
           {!! $price !!}€
        </span>
            <span class="{!! $name_parent !!}__item__link__contentContainer__date">
           {!! $date !!}
        </span>
        </div>
    </a>
</div>

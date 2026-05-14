@props(['src', 'date', 'name', 'name_parent', 'date', 'price'])

<div class="{!! $name_parent !!}__item">
    <div class="{!! $name_parent !!}__item__imgContainer">
        <img class="{!! $name_parent !!}__item__imgContainer__img" src="{!! $src !!}" alt="Photo du l'annonce {!! $name !!}">
    </div>
    <div class="{!! $name_parent !!}__item__contentContainer">
        <p class="{!! $name_parent !!}__item__contentContainer__name">
            {!! $name !!}
        </p>
        <span class="{!! $name_parent !!}__item__contentContainer__price">
           {!! $price !!}€
        </span>
        <span class="{!! $name_parent !!}__item__contentContainer__date">
           Ajouté il y a {!! $date !!} jours
        </span>
    </div>
    <div class="{!! $name_parent !!}__item__buttons">
        <x-utils.link-svg class__button="button button--icon" title="Aller vers la page modification de l'annonce" href="{!! route('public.homepage') !!}" name_parent="{!! $name_parent !!}__item__buttons" svg="modify"/>
        <x-utils.button class__button="button button--icon" title="Supprimer cette annonce" name_parent="{!! $name_parent !!}__item__buttons" svg="delete"/>
    </div>
</div>

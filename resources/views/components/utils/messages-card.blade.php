@props(['src' => '', 'date', 'message', 'name', 'name_parent'])

<div class="{!! $name_parent !!}__item">
    @if($src)
        <div class="{!! $name_parent !!}__item__imgContainer">
            <img class="{!! $name_parent !!}__item__imgContainer__img" src="{!! $src !!}" alt="Photo de profil de {!! $name !!}">
        </div>
    @endif
    <div class="{!! $name_parent !!}__item__contentContainer">
        <p class="{!! $name_parent !!}__item__contentContainer__name">
           {!! $name !!}
        </p>
        <p class="{!! $name_parent !!}__item__contentContainer__content">
            {!! $message !!}
        </p>
    </div>
    <span class="{!! $name_parent !!}__item__date">
        Il y a {!! $date !!} @if($date == 1) jour @else jours @endif
    </span>
</div>

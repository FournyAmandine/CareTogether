@props(['name_parent'])

<div class="{!! $name_parent !!}__imgContainer">
    <a class="{!! $name_parent !!}__imgContainer__link" href="{{route('public.homepage')}}">
        <img class="{!! $name_parent !!}__imgContainer__link__img" src="{{ asset('assets/img/svg/logo-header.svg') }}" alt="Logo CareTogether">
    </a>
</div>

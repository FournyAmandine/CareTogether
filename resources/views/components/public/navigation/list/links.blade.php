@props(['ul_class', 'li_class', 'a_class'])

@php
    $links = [
        [
            'li_class' => $li_class,
            'a_class' => $a_class,
            'href'=>route('public.posts.index'),
            'label'=> 'Annonces'
        ],
        [
            'li_class' => $li_class,
            'a_class' => $a_class,
            'href'=>route('public.aboutpage'),
            'label'=> 'À propos'
        ],
        [
            'li_class' => $li_class,
            'a_class' => $a_class,
            'href'=>route('public.contactpage'),
            'label'=> 'Contact'
        ],
    ];
@endphp

<ul class="{!! $ul_class !!}">
    @foreach($links as $link)
        <x-public.navigation.list.link
            li_class="{!! $link['li_class'] !!}"
            a_class="{!! $link['a_class'] !!}"
            :href="$link['href']"
            :label="$link['label']"
        />
    @endforeach
</ul>

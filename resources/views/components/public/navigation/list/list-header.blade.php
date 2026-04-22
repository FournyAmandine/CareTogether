@props(['name_parent'])

@php
    $links = [
        [
            'href'=>route('public.posts.index'),
            'label'=> 'Annonces'
        ],
        [
            'href'=>route('public.aboutpage'),
            'label'=> 'À propos'
        ],
        [
            'href'=>route('public.contactpage'),
            'label'=> 'Contact'
        ],
    ];
@endphp

<ul class="{!! $name_parent !!}__list">
    @foreach($links as $link)
        <x-public.navigation.list.link
            name_parent="{!! $name_parent !!}__list"
            :href="$link['href']"
            :label="$link['label']"
        />
    @endforeach
</ul>

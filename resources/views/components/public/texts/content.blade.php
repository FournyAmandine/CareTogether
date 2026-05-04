@props(['title'])

<div class="text__main__contentContainer__content">
    <x-public.texts.title :title="$title" />
    <div class="text__main__contentContainer__content__text">
        {!! $slot !!}
    </div>
</div>

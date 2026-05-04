@props(['text'])

<p {!! $attributes->merge(['class'=> 'text__main__contentContainer__content__text__item']) !!}>
    {!! $text !!}
</p>

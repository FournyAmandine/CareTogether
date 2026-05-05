@props(['svg', 'title'])

<div class="objectifs__listing__item">
    @if($svg)
        {!! $svg !!}
    @endif
    <h3 class="maintitle maintitle--blue maintitle--small objectifs__listing__item__title">
        {!! $title !!}
    </h3>
</div>

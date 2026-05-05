@props(['item', 'name_parent', 'svg'])

<li class="{!! $name_parent !!}__item">
    @if($svg)
        {!! $svg !!}
    @endif
    <div class="{!! $name_parent !!}__item__textContainer">
        {!! $item !!}
    </div>
</li>

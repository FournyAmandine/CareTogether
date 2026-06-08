@props(['item', 'name_parent', 'svg', 'delay'=>''])

<li {{$attributes}} class="{!! $name_parent !!}__item" @if($delay) data-aos="fade-right" data-aos-delay="{{$delay*100}}" data-aos-duration="500" @endif>
    @if($svg)
        <svg class="{!! $name_parent !!}__item__icon" @if($delay) data-aos="fade-right" data-aos-delay="{{$delay*250}}" data-aos-duration="500" @endif>
            <use xlink:href="{{ asset('assets/img/svg/sprite.svg#' . $svg) }}"></use>
        </svg>
    @endif
    <div class="{!! $name_parent !!}__item__textContainer" @if($delay) data-aos="fade-right" data-aos-delay="{{$delay*200}}" data-aos-duration="500" @endif>
        {!! $item !!}
    </div>
</li>

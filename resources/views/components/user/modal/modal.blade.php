@props(['content','title' => '','outside', 'modifier'=>''])

<div class="modal @if($modifier) modal--{!! $modifier !!} @endif">
    <div class="modal__container"
         @click.outside="{{$outside}}">

        @if($title)
            <p class="modal__container__title">
                {{$title}}
            </p>
        @endif

        {{$content}}
    </div>
</div>

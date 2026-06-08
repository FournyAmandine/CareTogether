@props(['content','title' => '','outside', 'modifier'=>''])

<div class="modal @if($modifier) modal--{!! $modifier !!} @endif">
    <div class="modal__container" aria-modal="true" role="dialog" aria-labelledby="modalTitle"
         @click.outside="{{$outside}}">

        @if($title)
            <p id="modalTitle" class="modal__container__title">
                {{$title}}
            </p>
        @endif

        {{$content}}
    </div>
</div>

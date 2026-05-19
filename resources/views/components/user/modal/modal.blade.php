@props(['content','title','outside'])

<div class="modal">
    <div class="modal__container"
         @click.outside="{{$outside}}">

        <p class="modal__container__title">
            {{$title}}
        </p>

        {{$content}}
    </div>
</div>

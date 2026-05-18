@props(['content','title','outside'])

<div class="delete">
    <div class="delete__container"
         @click.outside="{{$outside}}">

        <p class="delete__container__title">
            {{$title}}
        </p>

        {{$content}}
    </div>
</div>

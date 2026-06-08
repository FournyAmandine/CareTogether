@props(['name', 'day', 'email', 'label', 'id', 'subject', 'img_path', 'message', 'modifier' =>''])

<article class="card-message @if($modifier) card-message--{!! $modifier !!} @endif">
    <button class="card-message__button" wire:click="toggleModal('show', {{$id}})" title="Voir le message"></button>

    <div class="card-message__content">
        <h4 class="card-message__content__name">{{ $name }}</h4>
        <p class="card-message__content__subject">{{ $subject }} : {!! $message !!}</p>
    </div>

    <p class="card-message__date">
        {!! $day !!}
    </p>

    <x-utils.link wire:click="toggleReadMessage({{$id}})"
        href="mailto:{{ $email }}" title="Répondre au message" label="{{ $label }}"
        name_parent="card-message" classButton="button--login" svg="answer"/>
</article>

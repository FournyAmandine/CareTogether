<main class="messagesPage">

    <x-user.utils.heading title="Vos messages"/>

    <section class="messages">
        <div class="messages__decoContainer">
            <img class="messages__decoContainer__deco" src="{!! asset('assets/img/deco-blue.png') !!}" alt="Forme bleue et ronde">
        </div>
        <div class="wrapper wrapper--small">
        <h2 class="sro">Liste des messages</h2>
            <div class="messages__container" x-data="{ isChatOpen: @entangle('selectedConversationId') }" :class="{ 'is-conv-open': isChatOpen }">
                <div wire:poll.10s class="messages__container__listing">
                    <div class="messages__container__listing__heading">
                        <x-utils.button-text wire:click="$set('filters', 'all')" name_parent="messages__container__listing__heading" text="Tous" title="Voir tous les messages" class-button="button {{$filters == 'all' ? 'button--login' : 'button--border'}}"/>
                        <x-utils.button-text wire:click="$set('filters', 'read')" name_parent="messages__container__listing__heading" text="Lus" title="Voir seulement les messages lus" class-button="button {{$filters == 'read' ? 'button--login' : 'button--border'}}"/>
                        <x-utils.button-text wire:click="$set('filters', 'unread')" name_parent="messages__container__listing__heading" text="Non-lus" title="Voir seulement les messages non-lus" class-button="button {{$filters == 'unread' ? 'button--login' : 'button--border'}}"/>
                    </div>
                    @foreach($conversations as $conversation)
                        @php
                            $otherUser = $conversation->buyer_id === auth()->id()
                                    ? $conversation->seller
                                    : $conversation->buyer;

                            $unread = $conversation->messages->contains(function ($message) {
                                return $message->sender_id != auth()->id() && !$message->read;
                            });
                        @endphp
                        <div @click="isChatOpen = true" class="messages__container__listing__item messages__container__listing__item--{{$unread ? 'unread' : ''}}">
                            <button data-test="conversation" wire:click="selectConversation({{ $conversation->id }})" class="messages__container__listing__item__button" title="Voir la conversation avec  {!! $otherUser->first_name . ' ' . $otherUser->last_name !!}"></button>
                            <div class="messages__container__listing__item__imgContainer">
                                <img class="messages__container__listing__item__imgContainer__img" src="{!! Str::startsWith($otherUser->profil_picture, 'assets')? asset($otherUser->profil_picture) : asset('storage/photos/users/originals/' . $otherUser->profil_picture) !!}" alt="Image de profil de l'utilisateur">
                            </div>
                            <div class="messages__container__listing__item__infos">
                                <h3 class="messages__container__listing__item__infos__name">
                                    {{ $otherUser->first_name . ' ' . $otherUser->last_name }}
                                </h3>
                                <span class="messages__container__listing__item__infos__post">
                                    {{ $conversation->post->name }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="messages__container__content">
                    @if($selectedConversation == null)
                        <div class="messages__container__content__heading messages__container__content__heading--select">
                            <p class="messages__container__content__heading__text">
                                Sélectionnez une conversation
                            </p>
                        </div>
                    @else
                        <div class="messages__container__content__heading">
                            <div class="messages__container__content__heading__back">
                                <x-utils.button  @click="isChatOpen = false"     wire:click="$set('selectedConversationId', null)" name_parent="messages__container__content__heading__back" svg="arrow-button" class-button="button--icon" title="Retour sur la liste des conversations"/>
                            </div>
                            <div class="messages__container__content__heading__sender">
                                @php
                                    $otherUser = $conversation_selected->buyer_id === auth()->id()
                                            ? $conversation_selected->seller
                                            : $conversation_selected->buyer;
                                @endphp
                                <div class="messages__container__content__heading__sender__imgContainer">
                                    <img class="messages__container__content__heading__sender__imgContainer__img" src="{!! Str::startsWith($otherUser->profil_picture, 'assets')? asset($otherUser->profil_picture) : asset('storage/photos/users/originals/' . $otherUser->profil_picture) !!}" alt="Image de profil de l'utilisateur">
                                </div>
                                <span class="messages__container__content__heading__sender__name">
                                    {{ $otherUser->first_name . ' ' . $otherUser->last_name }}
                                </span>
                            </div>
                            <div class="messages__container__content__heading__post">
                                {{ $conversation_selected->post->name }}
                            </div>
                            <x-utils.link href="{{ route('public.posts.show', $conversation_selected->post->id) }}" label="Voir l'annonce" name_parent="messages__container__content__heading" class-button="button--red" title="Aller voir l'annonce" svg="arrow-button"/>
                        </div>
                        <div class="messages__container__content__main">
                            <div wire:poll.5s class="messages__container__content__main__listing">
                                @foreach($messages as $message)
                                    <div class="messages__container__content__main__listing__messageContainer messages__container__content__main__listing__messageContainer--{{$message->sender_id === auth()->id() ? 'mine' : 'theirs'}}">
                                        <p class="messages__container__content__main__listing__messageContainer__message">
                                            {{ $message->text }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                            <form class="messages__container__content__main__form" wire:submit.prevent="store" method="Post">
                                @csrf

                                <x-user.form.fields.input wire:model="text" name_parent="messages__container__content__main__form" field_name="text" placeholder="Écrivez votre message..." label="" required="required"/>

                                <x-user.form.buttons.button name_parent="messages__container__content__main__form" class_button="button--input" svg="send"/>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</main>

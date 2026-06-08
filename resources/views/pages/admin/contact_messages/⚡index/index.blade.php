<main class="contactMessagesPage">
    <x-user.utils.heading modifier="" title="Vos messages de contact"/>

    <section class="unread">
        <div class="wrapper wrapper--small">
            <h2 class="maintitle maintitle--small maintitle--blue unread__title">
                Non-lus
            </h2>
            <div class="unread__listing">
                @forelse($messages_unread as $message)
                    <x-admin.article_card
                        id="{{ $message->id }}"
                        subject="{{ $message->subject }}" message="{{ Str::limit($message->message, 30) }}"
                        name="{{ $message->first_name }} {{ $message->last_name }}"
                        day="{{ $message->created_at->diffForHumans() }}"
                        email="{{ $message->email }}"
                        label="Répondre"
                        img_path="{!! $message !!}"
                    />
                @empty
                    <p class="empty__text">Tous les messages ont été lus</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="read">
        <div class="wrapper wrapper--small">
            <h2 class="maintitle maintitle--small maintitle--blue read__title">
                Lus
            </h2>
            <div class="read__listing">
                @forelse($messages_read as $message)
                    <x-admin.article_card
                        id="{{ $message->id }}" modifier="read"
                        subject="{{ $message->subject }}" message="{{ Str::limit($message->message, 30) }}"
                        name="{{ $message->first_name }} {{ $message->last_name }}"
                        day="{{ $message->created_at->diffForHumans() }}"
                        email="{{ $message->email }}"
                        label="Répondre"
                        img_path="{!! $message !!}"
                    />
                @empty
                    <p class="empty__text">Tous les messages ont été lus</p>
                @endforelse
            </div>
        </div>
    </section>
    @if($isOpenShowModal)
        <x-user.modal.modal outside="$dispatch('toggleModal', { modal: 'show' })" modifier="messages">
            <x-slot:title>
                Message de {{ $openMessage->first_name }} {{ $openMessage->last_name }}
            </x-slot:title>

            <x-slot:content>
                <div class="modal__container__content">
                    <p class="modal__container__content__email">{{ $openMessage->email }}</p>
                    <p class="modal__container__content__date">
                        {{ \Carbon\Carbon::parse($openMessage->created_at)->locale(app()->getLocale())->translatedFormat('d F Y à G:i') }}
                    </p>
                </div>

                <span class="modal__container__subject">
                    Sujet : {{ $openMessage->subject }}
                </span>

                <p class="modal__container__message">
                    Message : {{ $openMessage->message }}
                </p>

                <div class="modal__container__buttons">
                    <x-utils.button-text wire:click="markRead" name_parent="modal__container__buttons" classButton="button button--border" title="Marquer le message comme lu" text="Marquer le message comme lu"/>

                    <x-utils.link name_parent="modal__container__buttons"
                        wire:click="toggleReadMessage({{ $openMessage->id }})"
                        href="mailto:{{ $openMessage->email }}"
                        title="Répondre au message de {{ $openMessage->first_name }}"
                        label="Répondre au message"
                        classButton="button--red"
                    />
                </div>
            </x-slot:content>
        </x-user.modal.modal>
    @endif
</main>

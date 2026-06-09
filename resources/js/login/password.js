$('.content__form__password__button').on('click', function () {
    const input = $('.content__form__password__formRow__input');

    const isHidden = input.attr('type') === 'password';

    input.attr('type', isHidden ? 'text' : 'password');

    $(this).find('.content__form__password__button__icon--hide').toggleClass('is-hidden', !isHidden);
    $(this).find('.content__form__password__button__icon--show').toggleClass('is-hidden', isHidden);
});

$('.content__form__password__button--reset').on('click', function () {
    const input = $('.content__form__password__reset__formRow__input');

    const isHidden = input.attr('type') === 'password';

    input.attr('type', isHidden ? 'text' : 'password');

    $(this).find('.content__form__password__reset__button__icon--hide').toggleClass('is-hidden', !isHidden);
    $(this).find('.content__form__password__reset__button__icon--show').toggleClass('is-hidden', isHidden);
});


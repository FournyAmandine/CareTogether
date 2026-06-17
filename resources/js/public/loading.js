import $ from "jquery";

$('.js-loading-form--add').on('submit', function () {
    const $form = $(this);

    const $loader = $form.find('.loading--public');

    if ($loader.length) {
        $loader.addClass('is-visible');
    }
});

$('.js-loading-form--delete').on('submit', function () {
    const $form = $(this);

    const $loader = $form.find('.loading--public');

    if ($loader.length) {
        $loader.addClass('is-visible');
    }
});

$('.js-loading-form--contact').on('submit', function () {
    const $form = $(this);

    const $loader = $form.find('.loading--public');

    if ($loader.length) {
        $loader.addClass('is-visible');
    }
});



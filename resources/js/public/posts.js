import $ from "jquery";

$('#filters').on('click', function () {
    const form = $('#filtersForm');

    form.toggleClass('hidden');

    const isExpanded = !form.hasClass('hidden');

    $(this).attr('aria-expanded', isExpanded);
});





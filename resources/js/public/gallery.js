import $ from "jquery";
import 'magnific-popup';

$('.detail__main__listing').magnificPopup({
    delegate: 'a',
    type: 'image',
    gallery: {
        enabled: true
    },
    mainClass: 'mfp-fade',
});

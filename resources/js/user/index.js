import $ from 'jquery';
window.$ = window.jQuery = $;
import 'slick-carousel';

document.addEventListener('livewire:navigated', () => {
    initSalesSlider();
    initRentalsSlider();
    initRegisteredSlider();
    initRentalCurrentSlider();
    initRentalEndedSlider();
    initSalesIndexSlider();
});

function initSalesSlider() {

    $(document).ready(function () {
        if (!$('.posts__sliderContainer__slider--sale').hasClass('slick-initialized')) {
            $('.posts__sliderContainer__slider--sale').slick({
                arrows: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                rows: 2,
                slidesPerRow: 4,
                infinite: true,
                prevArrow: $('.posts__sliderContainer .js-sale-prev'),
                nextArrow: $('.posts__sliderContainer .js-sale-next')
            });
        }
    });
}

function initRentalsSlider() {

    $(document).ready(function () {
        if (!$('.posts__sliderContainer__slider--rental').hasClass('slick-initialized')) {
            $('.posts__sliderContainer__slider--rental').slick({
                arrows: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                rows: 2,
                slidesPerRow: 4,
                infinite: true,
                prevArrow: $('.posts__sliderContainer .js-rental-prev'),
                nextArrow: $('.posts__sliderContainer .js-rental-next')
            });
        }
    });
}

function initRegisteredSlider() {

    $(document).ready(function () {
        if (!$('.registered__sliderContainer__slider').hasClass('slick-initialized')) {
            $('.registered__sliderContainer__slider').slick({
                arrows: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                rows: 2,
                slidesPerRow: 4,
                infinite: true,
                prevArrow: $('.registered__sliderContainer .js-registered-prev'),
                nextArrow: $('.registered__sliderContainer .js-registered-next')
            });
        }
    });
}

function initRentalCurrentSlider() {

    $(document).ready(function () {
        if (!$('.rentals__sliderContainer__slider--current').hasClass('slick-initialized')) {
            $('.rentals__sliderContainer__slider--current').slick({
                arrows: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                rows: 2,
                slidesPerRow: 4,
                infinite: true,
                prevArrow: $('.rentals__sliderContainer__buttonContainer .js-current-prev'),
                nextArrow: $('.rentals__sliderContainer__buttonContainer .js-current-next')
            });
        }
    });
}

function initRentalEndedSlider() {

    $(document).ready(function () {
        if (!$('.rentals__sliderContainer__slider--ended').hasClass('slick-initialized')) {
            $('.rentals__sliderContainer__slider--ended').slick({
                arrows: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                rows: 2,
                slidesPerRow: 4,
                infinite: true,
                prevArrow: $('.rentals__sliderContainer__buttonContainer .js-ended-prev'),
                nextArrow: $('.rentals__sliderContainer__buttonContainer .js-ended-next')
            });
        }
    });
}

function initSalesIndexSlider() {

    $(document).ready(function () {
        if (!$('.sales__sliderContainer__slider').hasClass('slick-initialized')) {
            $('.sales__sliderContainer__slider').slick({
                arrows: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                rows: 2,
                slidesPerRow: 4,
                infinite: true,
                prevArrow: $('.sales__sliderContainer__buttonContainer .js-prev'),
                nextArrow: $('.sales__sliderContainer__buttonContainer .js-next')
            });
        }
    });
}




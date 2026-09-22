import Swiper from 'swiper';

import { Navigation, Pagination } from 'swiper/modules';

import 'swiper/css';

import 'swiper/css/navigation';

import 'swiper/css/pagination';


let links=document.querySelectorAll('.custom-link');

links.forEach((link)=>{
    link.addEventListener('click',()=>{
        if(!link.classList.contains('active')){
            link.classList.add('active');
        }
    })
})

document.addEventListener('DOMContentLoaded', function () {

    const homeCards = document.querySelectorAll('#homepage-announces .card-announce');

    homeCards.forEach(function (card) {

        card.style.setProperty('background-color', 'white', 'important');

    });

});


document.addEventListener('DOMContentLoaded', function () {

    const swiperElement = document.querySelector('.announce-swiper');

    if (!swiperElement) {
        return;
    }

    new Swiper(swiperElement, {

        modules: [Navigation, Pagination],

        slidesPerView: 1,

        loop: true,

        navigation: {

            nextEl: swiperElement.querySelector('.swiper-button-next'),

            prevEl: swiperElement.querySelector('.swiper-button-prev'),

        },

        pagination: {

            el: swiperElement.querySelector('.swiper-pagination'),

            clickable: true,

        },

    });

});
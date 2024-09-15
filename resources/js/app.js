import './bootstrap';

import Alpine from 'alpinejs';
import Swiper from 'swiper/bundle';
import 'swiper/swiper-bundle.css';

document.addEventListener('DOMContentLoaded', function () {
    var swiper = new Swiper('.swiper-container', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
});


window.Alpine = Alpine;

Alpine.start();


document.addEventListener('DOMContentLoaded', function() {
    const menuButton = document.querySelector('header button');
    const menu = document.querySelector('header ul');

    menuButton.addEventListener('click', function() {
        menu.classList.toggle('hidden');
    });
});

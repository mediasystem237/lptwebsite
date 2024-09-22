import './bootstrap';

import Alpine from 'alpinejs';
import Swiper from 'swiper/bundle';
import 'swiper/swiper-bundle.css';

// Initialiser Swiper après que le DOM soit chargé
document.addEventListener('DOMContentLoaded', () => {
    const swiper = new Swiper('.swiper-container', {
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

// Initialiser Alpine.js
window.Alpine = Alpine;
Alpine.start();

// Gestion du menu déroulant (responsive)
document.addEventListener('DOMContentLoaded', () => {
    const menuButton = document.querySelector('header button');
    const menu = document.querySelector('header ul');

    if (menuButton && menu) {
        menuButton.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const swiper = new Swiper('.swiper-container', {
        loop: true,
        speed: 700, // Rendre la transition plus fluide
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 5000, // Change l'image toutes les 5 secondes
            disableOnInteraction: false,
        },
        effect: 'fade', // Effet de fondu entre les slides
    });
});

import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 10,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        640: {
            slidesPerView: 3,
            spaceBetween: 10,
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 15,
        },
        1024: {
            slidesPerView: 7,
            spaceBetween: 30,
        },
    },
});

document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("default-modal");
    const closeButton = modal.querySelector(
        '[data-modal-hide="default-modal"]'
    );
    const video = modal.querySelector("video");
    const iframe = modal.querySelector("iframe");

    function stopVideo() {
        if (video) {
            video.pause();
            video.currentTime = 0; // Mengembalikan video ke awal
        }
        if (iframe) {
            const src = iframe.src;
            iframe.src = ""; // Reset src untuk menghentikan video
            iframe.src = src; // Mengembalikan src untuk menjaga elemen tetap aktif
        }
    }

    closeButton.addEventListener("click", stopVideo);

    // Jika modal ditutup dengan cara lain (misalnya klik di luar modal)
    modal.addEventListener("hidden", stopVideo);
});

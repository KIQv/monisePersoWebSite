var ul = document.querySelector('nav ul');
var menuBtn = document.querySelector('.menu-btn i');

function menuOpen() {
    if (ul.classList.contains('open')) {
        ul.classList.remove('open');
    }else{
        ul.classList.add('open');
    }
}
var swiper = new Swiper(".mySwiper", {
    cssMode: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    mousewheel: true,
    keyboard: true,
  });
  var swiper = new Swiper(".conteudoDestaque", {
    slidesPerView: 3,
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
  var swiper = new Swiper(".conteudoDepoimento", {
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
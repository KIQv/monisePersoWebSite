var ul = document.querySelector("nav ul");
var menuBtn = document.querySelector(".menu-btn i");

/////////////////////////////////////////////////////////////////////////////
/* VITRINE DE PRODUTOS */
function pegarUrl(url){
  let request = new XMLHttpRequest()
  request.open("GET", url, false)
  request.send()
  return request.responseText
}
let data = pegarUrl("https://monisepersonalizados.online/admin/lista-produto.php");
let produtos = JSON.parse(data);

$(document).ready(function(e){

  produtos.forEach((i)=>loadProducts(i));


});
console.log(produtos)
function loadProducts(data){

  var div = document.createElement('div');
  
  if (div.classList) div.classList.add("swiper-slide");
  else div.className += " swiper-slide";

  div.innerHTML = '<div class="doces swiper-slide">'+
                        '<img src="https://monisepersonalizados.online/admin/'+data.fotoProduto1+'" alt="Doces Monise Personalizados"/>'+
                        '<h3>'+data.nomeProduto+'</h3>'+
                        '<p>'+data.descProduto+'</p>'+
                    '</div>';
document.getElementById("docesVitrine").appendChild(div);
}

/////////////////////////////////////////////////////////////////////////////

function menuOpen() {
  if (ul.classList.contains("open")) {
    ul.classList.remove("open");
  } else {
    ul.classList.add("open");
  }
}
var swiper = new Swiper(".mySwiper", {
  effect: "fade",
  loop: true,
  autoplay: {
    delay: 3500,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  mousewheel: false,
  keyboard: true,
});
var swiper = new Swiper(".conteudoDestaque", {
  slidesPerView: 3,
  spaceBetween: 30,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    "@0.00": {
      slidesPerView: 1,
      spaceBetween: 100,
    },
    "@0.75": {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    "@1.00": {
      slidesPerView: 3,
      spaceBetween: 40,
    },
    "@1.50": {
      slidesPerView: 3,
      spaceBetween: 50,
    },
  },
});
var swiper = new Swiper(".conteudoDepoimento", {
  spaceBetween: 30,
  loop: true,
  autoplay: {
    delay: 3500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});
var swiper = new Swiper(".conteudoKits", {
  slidesPerView: 3,
  spaceBetween: 30,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    "@0.00": {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    "@0.75": {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    "@1.00": {
      slidesPerView: 3,
      spaceBetween: 40,
    },
    "@1.50": {
      slidesPerView: 4,
      spaceBetween: 50,
    },
  },
});

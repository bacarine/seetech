/*--------------- Testimonial Slider ---------------*/ 
var swiper = new Swiper(".testimonial-slider", {

    spaceBetween: 25,
    loop:true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,

    },

    pagination: {
      el: ".swiper-pagination1",
      clickable:true,
    },

    breakpoints: {
        0: {
            slidesPerView: 1,
        },

        1024: {
            slidesPerView: 2,
        },

        1600: {
            slidesPerView: 3,
        },
    },

});
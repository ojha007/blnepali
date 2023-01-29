(function ($) {
    'use strict';


    $('#bl-hotScrolling').owlCarousel({
        loop: true,
        margin: 24,
        dots: false,
        responsiveClass: true,
        navText : ["<i class='fas fa-arrow-left'></i>","<i class='fas fa-arrow-right'></i>"],
        responsive: {
            0: {
                items: 1,
                nav: true,
                margin:0,
            },
            600: {
                items: 3,
                nav: false,
            },
            1000: {
                items: 4,
                nav: true,
                loop: false,
                margin: 24
            }
        }
    })

   })(jQuery);

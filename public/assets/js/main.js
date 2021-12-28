$(".chosen-select").chosen();

 $('.popup_btn').magnificPopup({
    removalDelay: 500, //delay removal by X to allow out-animation
    callbacks: {
      beforeOpen: function() {
         this.st.mainClass = this.st.el.attr('data-effect');
      }
    },
    midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
  });

//   owl carousel
/*
$('.loop').owlCarousel({
    center: true,
    items:2,
    loop:true,
    margin:10,
    responsive:{
        600:{
            items:4
        }
    }
});
$('.nonloop').owlCarousel({
    center: true,
    items:2,
    loop:false,
    margin:10,
    responsive:{
        600:{
            items:4
        }
    }
});*/

//range calendar

/*$(function() {
        $('.calendar').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });
*/

// dropdown tabs
    /*$('.tab_open').click(function() {
        $('.g_popup_openedside').slideUp();
        $(this).next('.g_popup_openedside').stop().slideToggle();
    });*/


    //tabs


/*$(document).ready(function() {

        $('.header_tablinks li a').on('click', function(e) {
            var currentNewsValue = $(this).attr('href');

            $('.table_tab ').hide();
            $(currentNewsValue).fadeIn(500);


            $(this).parent('li').addClass('active').siblings().removeClass('active');
            e.preventDefault();
        });
    });

*/

//datepicker

/*$('[data-toggle="datepicker"]').datepicker({
        inline: true,
        format: 'dd-mm-yyyy'
    });
*/

// $('.file_up').change(function() {
//         filename = $(this)[0].files[0].name;
//         $(this).next('.upload_inp_containerr').find('p').text(filename);
//     })

// owl carousel

const mainSwiper = () =>{
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        effect: "fade",
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      });
}

// owl carousel end

// mega menu

const openMega = () => {
    $('[data-js-mega]').click(function(e){
        $('.product_categories_megamenu').stop().fadeToggle();
        $(this).toggleClass('active')
    });
    $('.megamenu_close').click(function(){
         $('.product_categories_megamenu').fadeOut();
         $('[data-js-mega]').removeClass('active');
    });

    $(document).click(function(e){
        $('.product_categories_megamenu').fadeOut();
        $('[data-js-mega]').removeClass('active');
    });
    $('[data-js-mega]').click(function(e){
        e.stopPropagation();
    });
    $('.product_categories_megamenu').click(function(e){
        e.stopPropagation();
    });
}

// mega menu end
// search
const searchOpen = () => {
    $('.search_open').click(function(){
        $('.search_box input').addClass('active');
        $(this).hide();
        $('.search_submit').show();
    });

    $('.search_open').click(function(e){
        e.stopPropagation();
    });
    $('.search_submit').click(function(e){
        e.stopPropagation();
    });

    $('.search_box input').click(function(e){
        e.stopPropagation();
    });
    $(document).click(function() {
    $('.search_box input').removeClass('active');
        $('.search_open').show();
        $('.search_submit').hide();
    });
}
//search end

// form validate

const formValidate = () =>{
    $(document).ready(function() {
    $('[data-js-form]').on('submit', function(e) {
        var curr_form = $(this),
            error = false,
            first_input = null;

        curr_form.find('.required').each(function() {
            var curr = $(this),
                val = curr.val();

            if ($.trim(val) == '' || val == 0) {
                error = true;
                curr.parent().addClass('must_fill').removeClass('req_input_filled');

                if (!first_input) {
                    first_input = curr;
                }
            } else {
                curr.parent().removeClass('must_fill').addClass('req_input_filled');
            }

            curr.change(function() {
                var new_val = curr.val();

                if ($.trim(new_val) == '' || new_val == 0) {
                    curr.addClass('must_fill').removeClass(
                        'req_input_filled');
                } else {
                    curr.removeClass('must_fill').addClass(
                        'req_input_filled');
                }
            });
        });



        if (!error) {
            


        } else {
            
            return false;
        }


    });

});
}

// form validate end
// tabs
const tabs = () => {
    $(document).ready(function() {

        $('.tab-links a').on('click', function(e) {
            var currentNewsValue = $(this).attr('href');

            $('.tab ').hide();
            $(currentNewsValue).fadeIn(500);


            $(this).addClass('active').siblings().removeClass('active');
            e.preventDefault();
        });
    });
    

}
// tabs end

// swiper carousel main
const owlGallery = () =>{
    $('[data-js-owl-gallery]').owlCarousel({
        loop:false,
        margin:0,
        nav:true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 8000,
        responsive:{
            0:{
                items:2,
                margin:13,
            },
            450:{
                items:3,
                margin:13,
            },
            768:{
                items:4,
                margin:13,
            },
            1000:{
                items:6,
                margin: 13,
            }
        }
    });
}
// swiper carousel main end

// media carousel
const owlMedia = () =>{
    $('[data-js-owl-media]').owlCarousel({
        loop:false,
        margin:0,
        nav:true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 8000,
       responsive:{
            0:{
                items:1,
                margin:0,
            },
            450:{
                items:2,
                margin:13,
            },
            768:{
                items:3,
                margin:13,
            },
            1000:{
                items:4,
                margin: 19,
            }
        }
    });
}
// media carousel end

// partner carousel
const owlPartner = () =>{
    $('[data-js-owl-partner]').owlCarousel({
        loop:true,
        margin:0,
        nav:false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 2000,
        responsive:{
            0:{
                items:3,
                margin:15,
                dots:false,
            },
            450:{
                items:3,
                margin:13,
            },
            768:{
                items:4,
                margin:13,
                
            },
            1000:{
                items:7,
                margin: 19,
            }
        }
    });
}
// partner carousel end
const  parrallax = () => {
     $(window).scroll(function(){
        $(".standatr-page-banner").css("background-size", (100 + 10 * $(window).scrollTop() / 250) + "%");
    });
}

const  parrallaxAbout = () => {
     $(window).scroll(function(){
        $(".about_page_image").css("background-size", (100 + 10 * $(window).scrollTop() / 250) + "%");
    });
}
$('.menu_open').click(function(){
    $('.side_menu').addClass('opened');
    $('.layer').show();
});

$('.side_menu_close , .layer').click(function(){
    $('.side_menu').removeClass('opened');
    $('.layer').hide();
});

$('.product_tab_gallery_tabs.tab-links a').click(function(e){
    $(this).parents('.product_tab_gallery_tabs').find('.tab-links a').removeClass('active');
    $(this).addClass('active')
})

$(window).on('load', function () {
    if ($(window).width() > 768) {
    AOS.init();
    } else {
    $('*').removeAttr('data-aos');
    }
})

$(document).ready(function() {
  // $('.nice-select').niceSelect();
});


const fancy = () =>{
    Fancybox.bind("[data-fancybox]", {
    // Your options go here
    });
}




// owl 
const mainSwiperLaunch = document.querySelector('[data-main-swiper]');
mainSwiperLaunch ? mainSwiper() : null; 
// owl end

// owl 
const launcFancy = document.querySelector('[data-fancybox]');
launcFancy ? fancy() : null; 
// owl end

// megameu
const launchMega = document.querySelector('[data-js-mega]');
launchMega ? openMega() : null; 
// megamenu end

// search open
const launchSearchOopen = document.querySelector('[data-js-search-open]');
launchSearchOopen ? searchOpen() : null; 
// search open

// form validate
const launchFormValidate = document.querySelector('[data-js-form]');
launchFormValidate ? formValidate() : null; 
// form validate end
// partnerCarousel
const partnerCarousel = document.querySelector('[data-js-owl-partner]');
partnerCarousel ? owlPartner() : null; 
// partnerCarousel end
// tabs
const launchTab = document.querySelector('[data-js-tab]');
launchTab ? tabs() : null; 
// tabs end

// carousel swiper
const launchCarouselOwl = document.querySelector('[data-js-owl-gallery]');
launchCarouselOwl ? owlGallery() : null; 
// carousel swiper end

// carousel swiper
const launchOwlMedia = document.querySelector('[data-js-owl-media]');
launchOwlMedia ? owlMedia() : null; 
// carousel swiper end

// image scale standart
const launchparallax = document.querySelector('.standatr-page-banner');
launchparallax ? parrallax() : null; 
// image scale standart end
// image scale about
const launchparallaxAbout = document.querySelector('.about_page_image');
launchparallaxAbout ? parrallaxAbout() : null; 
// mage scale aboutend
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/jquery.fancybox.js"></script>
<script src="/assets/js/jquery.mCustomScrollbar.js"></script>
<script src="/assets/js/owl.carousel.js"></script>
<script src="/assets/js/chosen.jquery.js"></script>
<script src="/assets/js/jquery.magnific-popup.js"></script>
<script src="/assets/js/swiper-bundle.min.js"></script>
<script src="/assets/js/aos.js"></script>
<script src="/assets/js/jquery.nice-select.js"></script>
<script src="/assets/js/main.js"></script>
{{--<script src="/assets/js/main-slider-api.js?v=30"></script>--}}
<script src="/assets/js/main-slider-api2.js?v=4"></script>
<script>


     $('[data-f-id]').find('a').css("display", "none")
     $('[data-f-id]').css("opacity", "1")

     $('[data-f-id]').each(function () {
         if ($(this).has('img').length == 0)
         {
             $(this).html('');
             $(this).css('display', 'none')
         }
         else
         {
             const img = $(this).find('img');
             $(img).attr('data-fancybox', "single");
             $(this).html('');
             $(this).html(img);
         }
     })
    $('.product-inner-tabs_box').find('img').attr('data-fancybox', "single");

     $('.tab').each(function () {
         //$(this).find('.product-inne-tab-content').children().last().remove();
         const tabContent = $(this).find('.product-inne-tab-content');
         if ($(this).find("[data-f-id]").has('img').length == 0){
             $(this).find("[data-f-id]").remove();
         }
         if ($(tabContent).text().length <= 1)
         {
             const tabID = `#${$(this).attr('id')}`;
             $(`a[href = "${tabID}"]`).css('display', 'none')
         }
         console.log($(tabContent).text())
     });


</script>
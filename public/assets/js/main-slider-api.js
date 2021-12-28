
$( document ).ready(function() {
    const a = document.querySelector('.product_tab_gallery_sliderbox-first .tab-links');
    const categories = document.querySelectorAll('[data-cat]');
    for(key of categories)
    {
        f(key)
    }
});


const tablinks = document.querySelectorAll('.product_tab_gallery_sliderbox-first .tab-links>a');
const wrapper = document.querySelector('.product_tab_gallery_sliderbox-first .product_tab_gallery_sliderbox_inner .owl-carousel');

tablinks.forEach(element => {
    element.addEventListener('click' ,launchTabbing);
});

function launchTabbing(){
    $(`[data-cat="${$(this).data('cat_id')}"] .product_tab_gallery_sliderbox_inner`).html('');
    let array = getProductsBySubCategoryID($(this).data('sub'));
    for(key in array){
        const arrayKey = array[key];
        let html = '<div class="owl-carousel" data-js-owl-gallery >';
        arrayKey.forEach(element => {
            html += getProductHtml(element)
            //$('.product_tab_gallery_sliderbox-first .product_tab_gallery_sliderbox_inner ').html(html);
            $(`[data-cat="${$(this).data('cat_id')}"] .product_tab_gallery_sliderbox_inner`).html(html);
            owlCarouselEvent();
        });
        function owlCarouselEvent() {
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
    }
}


function getProductHtml(element) {
   return `<div class="item">
            <div class="product_card">
              <a href="products/${element.id}">
                <div class="product-card-img">
                  <img src="${element.image}" alt="">
                </div>
                <div class="product-card-desc">
                  <p class="product-ard-name">${element.name}</p>
                  <p class="product-card-category">${element.category}</p>
                  <p class="product-card-price">${element.price}</p>
                </div>
              </a>
            </div>
          </div>`;
}

function getProductsBySubCategoryID(id) {
    let array = [];
    $.ajax({
        type: 'GET',
        url: `api/sub-category/${id}`,
        dataType: 'JSON',
        async: true,
        success: (data) => {
            array['products'] = data.products.map(product => {
                const p = {
                    'id': product.id,
                    'price': product.price,
                    'name': product.name ? product.name[lang] : '',
                    'category': product.sub_category.name ? product.sub_category.name[lang] : '',
                    'image': product.image
                }
                return p
            })
        }
    })
    return array;
}


function f(category) {
    const a =category.querySelector('a');
    const array = getProductsBySubCategoryID($(a).data('sub'));
    //console.log(array);
    $(a).addClass('active');
    for(key in array){
        const arrayKey = array[key];
        let html = '<div class="owl-carousel" data-js-owl-gallery >';
        arrayKey.forEach(element => {
            html += getProductHtml(element)
            //$('.product_tab_gallery_sliderbox-first .product_tab_gallery_sliderbox_inner ').html(html);
            $(`[data-cat="${$(category).data('cat')}"] .product_tab_gallery_sliderbox_inner`).html(html);
            owlCarouselEvent();
        });
        function owlCarouselEvent() {
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
    }
}

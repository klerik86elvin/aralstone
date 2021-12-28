  const data2 = {
        "products": [
            {
                "id": 1,
                "price": "25.00",
                "name": "Ammofos",
                "category": "Apatit Phosagro",
                "slug": "product-inner.html",
                "image": "assets/images/product2.jpg"
            },
            {
                "id": 2,
                "price": "25.00",
                "name": "Ammofos",
                "category": "Apatit Phosagro",
                "slug": "product-inner.html",
                "image": "assets/images/product3.jpg"
            },
            {
                "id": 3,
                "price": "25.00",
                "name": "Ammofos",
                "category": "Apatit Phosagro",
                "slug": "product-inner.html",
                "image": "assets/images/product1.jpg"
            },
            {
                "id": 4,
                "price": "25.00",
                "name": "Ammofos",
                "category": "Apatit Phosagro",
                "slug": "product-inner.html",
                "image": "assets/images/product1.jpg"
            },
            {
                "id": 5,
                "price": "25.00",
                "name": "Ammofos",
                "category": "Apatit Phosagro",
                "slug": "product-inner.html",
                "image": "assets/images/product2.jpg"
            },
            {
                "id": 6,
                "price": "25.00",
                "name": "Ammofos",
                "category": "Apatit Phosagro",
                "slug": "product-inner.html",
                "image": "assets/images/product3.jpg"
            },
            {
                "id": 7,
                "price": "25.00",
                "name": "Ammofos",
                "category": "Apatit Phosagro",
                "slug": "product-inner.html",
                "image": "assets/images/product1.jpg"
            },
            {
                "id": 8,
                "price": "25.00",
                "name": "Ammofos",
                "category": "Apatit Phosagro",
                "slug": "product-inner.html",
                "image": "assets/images/product2.jpg"
            },
            {
                "id": 9,
                "price": "25.00",
                "name": "Ammofos",
                "category": "Apatit Phosagro",
                "slug": "product-inner.html",
                "image": "assets/images/product1.jpg"
            },

        ],
    }
const lang = document.querySelector('html').getAttribute('lang');
const tablinks2 = document.querySelectorAll('.product_tab_gallery_sliderbox-second .tab-links>a');
const wrapper2 = document.querySelector('.product_tab_gallery_sliderbox-second .product_tab_gallery_sliderbox_inner .owl-carousel');

tablinks2.forEach(element => {
    element.addEventListener('click' ,launchTabbingSecond);
});

function launchTabbingSecond(){
    let flag = true
    for(key in data2){
        const arrayKey = data[key];
        var length = arrayKey.length;
        let html = '<div class="owl-carousel" data-js-owl-gallery >';
        arrayKey.forEach(element => {
            const name = element.name;
            const category = element.category;
            const price = element.price;
            const id = element.id;
            const image = element.image;
            // wrapper.innerHTML = "";
            html += `<div class="item">
                        <div class="product_card">
                          <a href="${id}">
                            <div class="product-card-img">
                              <img src="${image}" alt="">
                            </div>
                            <div class="product-card-desc">
                              <p class="product-ard-name"></p>
                              <p class="product-card-category">${category.lang}</p>
                              <p class="product-card-price">${price}</p>
                            </div>
                          </a>
                        </div>
                      </div>`;

            $('.product_tab_gallery_sliderbox-second .product_tab_gallery_sliderbox_inner ').html(html);
            owlCarouselEvent();

        });
        //dddd
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
        //ddd

    }

}



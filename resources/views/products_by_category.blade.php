<!DOCTYPE html>
<html lang="az">
@include('layouts.head')
<body>
<!-- header-->
@include('layouts.header')
<!-- header end-->
<main class="main" role="main">
    <section class="products-section product-filter-section ">
        <div class="place-for-header"></div>
        <div class="container">
            <div class="row">
                <div class="product-page-container">
                    <!--breadcrumb-->
                    <div class="breadcrumb_cont black-breadcrumb">
                        <ul>
                            <li>
                                <a href="/">{{__('Əsas səhifə')}}</a>
                            </li>
                            <li>
                                <a href="/products">{{__('Məhsullar')}} </a>
                            </li>
                        </ul>
                    </div>
                    <!--breadcrumb-->
                    <div class="page_in_title">
                        <h3>{{$categoryName}}</h3>
                    </div>
                    <div class="product-page-filter">
                        <div class="row">
                            <div class="product_tab_gallery_tabs tab-links d-flex justify-content-center" data-aos="fade-up" data-aos-duration="1500">
                                @foreach($categories as $category)
                                    <a href="#tab{{$category->id}}" class="" data-cat_id="{{$category->id}}">{{$category->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="product-page-product-list">
                        <div class="row d-flex justify-content-center">
                            @foreach($products as $a)
                                <div class="col-lg-2 col-md-3 col-6" data-cat_id="{{$a->category->id}}">
                                <div class="product_card" data-product-name="{{\Illuminate\Support\Str::lower($a->name)}}">
                                    <a href="{{route('product', $a->id)}}">
                                        <div class="product-card-img">
                                            <img src="{{$a->image}}" alt="">
                                        </div>
                                        <div class="product-card-desc">
                                            <p class="product-ard-name">{{$a->name}}</p>
                                            <p class="product-card-category">{{$a->category->name}}</p>
                                            <p class="product-card-price">{{$a->price}}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- main end-->
@include('layouts.footer')

@include('layouts.scripts')
<script>
    const tablinks = document.querySelectorAll('.product_tab_gallery_tabs a');
    tablinks.forEach(element => {
        element.addEventListener('click' ,launchTabbing);
    });
    function launchTabbing(){
        $(`[data-category="${$(this).data('cat_id')}"] .product_tab_gallery_sliderbox_inner`).html('');
        let array = getProductsByCategoryID($(this).data('cat_id'));
        console.log(getProductsByCategoryID($(this).data('cat_id')));
        return;
        for(key in array){
            const arrayKey = array[key];
            let html = '<div class="owl-carousel" data-js-owl-gallery >';
            arrayKey.forEach(element => {
                html += getProductHtml(element)
                //$('.product_tab_gallery_sliderbox-first .product_tab_gallery_sliderbox_inner ').html(html);
                $('.product_tab_gallery_sliderbox_inner').find('.owl-carousel').html(html);
                owlCarouselEvent();
            });
            console.log(html);
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
    function getProductsByCategoryID(id) {
        let array = [];
        $.ajax({
            type: 'GET',
            url: `/api/category/${id}`,
            async: false,
            dataType: 'JSON',
            success: (data) => {
                array['products'] = data.products.map(product => {
                    const p = {
                        'id': product.id,
                        'price': product.price,
                        'name': product.name ? product.name[lang] : '',
                        'category': product.category.name ?  product.category.name[lang] : '',
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
        $(a).addClass('active');
        for(key in array){
            const arrayKey = array[key];
            let html = '<div class="owl-carousel" data-js-owl-gallery >';
            arrayKey.forEach(element => {
                html += getProductHtml(element)
                //$('.product_tab_gallery_sliderbox-first .product_tab_gallery_sliderbox_inner ').html(html);
                $(`[data-category="${$(category).data('category')}"] .product_tab_gallery_sliderbox_inner`).html(html);
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
</script>
</body>

</html>
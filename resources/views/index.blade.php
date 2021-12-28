<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

@include('layouts.head')

<body>
    <!-- header-->
    @include('layouts.header')
    <!-- header end-->
    <main class="main" role="main">
        @include('layouts.slider')
        <section class="product_tab_gallery_section">
            <div class="container">
                <div class="row">
                    <div class="product_tab_gallery_section_container product_tab_gallery_sliderbox-first">
                        <h3 data-aos="fade-up" data-aos-duration="1500">{{__('Məhsullar')}}</h3>
                        <div class="product_tab_gallery_tabs">
                            <div class="product_tab_gallery_tabs tab-links d-flex justify-content-center" data-aos="fade-up" data-aos-duration="1500">
                                @foreach($categories as $category)
                                    <a href="#tab{{$category->id}}" class="{{$selectedCategory->id == $category->id ? "active" : ""}}" data-cat_id="{{$category->id}}">{{$category->name}}</a>
                                @endforeach
                            </div>
                            <div class="product_tab_gallery_sliderbox" data-aos="fade-up" data-aos-duration="2000">
                                <div class="product_tab_gallery_sliderbox_inner ">
                                    <div class="owl-carousel" data-js-owl-gallery>
                                        @foreach($selectedCategory->products as $product)
                                            <div class="item">
                                                <div class="product_card">
                                                    <a href="{{route('product', $product->id)}}">
                                                        <div class="product-card-img">
                                                            <img src="{{$product->image}}" alt="">
                                                        </div>
                                                        <div class="product-card-desc">
                                                            <p class="product-ard-name">{{$product->name}}</p>
                                                            <p class="product-card-category">{{$product->category->name}}</p>
                                                            <p class="product-card-price">{{$product->price}}</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- more link-->
                                <div class="tab-product-gallery-dots-more" style="justify-content: flex-end;">
                                    <a href="{{route('products')}}" class="more_product_link"> {{__('Hamsına bax')}} <i></i></a>
                                </div>
                                <!-- more link end-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="banners" class="main_banners_section">
            <div class="container">
                <div class="row">
                    <div class="mb_container">
                        @foreach($banners as $b)
                            <a href="{{$b->link}}" class="mb_left mr-2" data-aos="fade-right" data-aos-duration="1500">
                                <img src="{{$b->getFirstMediaUrl('main')}}" alt="">
                                {!! $b->text !!}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section class="main-partners-section">
            <div class="container">
                <div class="row">
                    <div class="main_partner_container">
                        <div class="owl-carousel" data-js-owl-partner>
                            @foreach($partners as $p)
                                <div class="item">
                                    <a href="/partners" target="_blank">
                                        <img src="{{$p->getFirstMediaUrl('main')}}" alt="">
                                    </a>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class="main_media_section">
            <div class="container">
                <div class="row">
                    <div class="main-media-slider">
                        <div class="main_media_title_more">
                            <h3>{{$contents->name}}</h3>
                            <a href="{{route('content-type', $contents->id)}}" class="more_product_link"> {{__('Hamsına bax')}} <i></i></a>
                        </div>
                        <div class="owl-carousel" data-js-owl-media>
                            @foreach($contents->contents as $a)
                                <div class="item">
                                    <div class="media_card">
                                        <a href="{{route('content-show', $a->id)}}" class="media_card_link">
                                            <div class="media_card_img">
                                                <img src="{{$a->getFirstMediaUrl('main')}}" alt="">
                                            </div>
                                            <div class="media_card_desc">
                                                <h5 class="media_card_title">{{$a->name}}</h5>
                                                <div class="media_card_shortdesc">
                                                    <p style="overflow: hidden;text-overflow: ellipsis;height: 70px">{{$a->title}}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- main end-->
    <!--footer-->
    @include('layouts.footer')
    <!--footer end-->
    <!-- popup content-->
    {{--<div class="standart_popup mfp-with-anim mfp-hide" id="forget-popup">
        <div class="standart_popup_content">
            <h4>Şifrəmi unutdum</h4>
            <form action="" data-js-form>
                <div class="popup_form">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="required">
                    </div>
                    <div class="form-group forget-password-link">
                        <a class=" popup_btn" href="#login-popup" data-effect="mfp-zoom-in">Daxil ol</a>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="popup-submit">Göndər</button>
                    </div>
                </div>
            </form>
        </div>
    </div>--}}
    <!---->
    @include('layouts.scripts')
{{--    <script src="//code-eu1.jivosite.com/widget/D2l72ltjBq" async></script>--}}
</body>
<script>
    const tablinks = document.querySelectorAll('.product_tab_gallery_sliderbox-first .tab-links>a');
    tablinks.forEach(element => {
        element.addEventListener('click' ,launchTabbing);
    });
    const categories = document.querySelectorAll('[data-category]');
    const test = document.querySelector('[data-category]');
    // for(key of categories)
    // {
    //     f(key)
    // }
    function launchTabbing(){
        $('.product_tab_gallery_sliderbox_inner').find('.owl-carousel').html('');
        let array = getProductsBySubCategoryID($(this).data('cat_id'));
        for(key in array){
            const arrayKey = array[key];
            let html = '<div class="owl-carousel" data-js-owl-gallery >';
            arrayKey.forEach(element => {
                html += getProductHtml(element)
                //$('.product_tab_gallery_sliderbox-first .product_tab_gallery_sliderbox_inner ').html(html);
                $('.product_tab_gallery_sliderbox_inner').find('.owl-carousel').html(html);
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
            url: `api/category/${id}`,
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
</html>

<!DOCTYPE html>
<html lang="az">

@include('layouts.head',['title' => $product->name])
@section('title','test')

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
                                <a href="{{route('products')}}">{{__('Məhsullar')}} </a>
                            </li>
{{--                            <li>--}}
{{--                                <a href="#"> Mineral Tarla Gübrələri </a>--}}
{{--                            </li>--}}
                            <li>
                                <a href="#"> {{$product->name}}</a>
                            </li>
                        </ul>
                    </div>
                    <!--breadcrumb-->
                </div>
            </div>

        </div>

        <div class="container">
            <div class="row">
                <div class="pi_inner">
                    <div class="product-inner-product-detail">
                        <div class="product-inner-product-detail-container">
                            <div class="product-inner-image">
                                <img src="{{$product->getFirstMediaUrl('main')}}" alt="">
                            </div>
                            <div class="product-inner-desc">
                                <h4 class="product-inner-title">{{$product->name}}</h4>
                                <li class="py-2">
                                    <span>{{__('İstehsalçı ölkə')}}</span>
                                    <p>{{$product->country_name}}</p>
                                </li>
                                <span class="product-inner-price">{{$product->price}}</span>
                                <div class="product-inner-specs">
                                    <ul>
                                        <li>
                                            <span>{{__('Kateqoriya')}}</span>
                                            <p>{{$category}}</p>
                                        </li>
                                        <li>
                                            <span>{{__('İstehsalçı şirkət')}}</span>
                                            <p>{{$product->company_name}}</p>
                                        </li>

                                    </ul>
                                </div>
                                <div class="product_inner_links">
                                    <a target="_blank" href="https://wa.me/+994504895500" class="contact_wp">
                                        <img src="/assets/images/wp.svg" alt="">
                                        <p>{{__('Bizimlə Əlaqə')}}</p>
                                    </a>
                                    <a href="#order-popup" data-effect="mfp-zoom-in"
                                       class="order_now popup_btn">{{__('Sifariş et')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <img src="/assets/images/aralstone_logo_2.svg" class="g_logo2" alt="">
                </div>
            </div>
            @if(\Illuminate\Support\Facades\Session::get('success'))
                <div class="alert alert-success alert-block text-center">
                    <strong>{{ \Illuminate\Support\Facades\Session::get('success') }}</strong>
                </div>
            @endif
        </div>

        <div class="product-inner-tabs" data-js-tab>
            <div class="product_inner_tablink_container">
                <div class="product_inner_tablinks tab-links">
                    <a href="#tab1" class="active">{{__('Məlumat')}}</a>
                    <a href="#tab2">{{__('Tətbiqi')}}</a>
                    <a href="#tab3">{{__('Üstünlükləri')}}</a>
                    <a href="#tab4">{{__('Təhlükəsizlik qaydaları')}}</a>
                </div>
            </div>
            <div class="product-inner-tabs_box">
                <!-- tab-->
                <div class="tab opened" id="tab1">
                    <div class="product-inner-tab-container">
                        <div class="product-inne-tab-content">
                            {!! $product->getTranslation('text', app()->getLocale(), false) !!}
                        </div>
                    </div>
                </div>
                <!--tab end-->
                <!-- tab-->
                <div class="tab " id="tab2">
                    <div class="product-inner-tab-container">
                        <div class="product-inne-tab-content">
                            {!! $product->getTranslation('applying', app()->getLocale(), false) !!}
                        </div>
                    </div>
                </div>
                <!--tab end-->
                <!-- tab-->
                <div class="tab " id="tab3">
                    <div class="product-inner-tab-container">
                        <div class="product-inne-tab-content">
                            {!! $product->getTranslation('advantage', app()->getLocale(), false)  !!}
                        </div>
                    </div>
                </div>
                <!--tab end-->
                <!-- tab-->
                <div class="tab " id="tab4">
                    <div class="product-inner-tab-container">
                        <div class="product-inne-tab-content">
                            {!! $product->getTranslation('safety_regulations', app()->getLocale(), false) !!}
                        </div>
                    </div>
                </div>
                <!--tab end-->
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="product_inner_similar_products">
                    <div class="page_in_title">
                        <h3>{{__('Oxşar məhsullar')}}</h3>
                    </div>
                    <div class="product_tab_gallery_sliderbox_inner">
                        <div class="owl-carousel" data-js-owl-gallery>
                            @foreach($products as $p)
                            <div class="item">
                                <div class="product_card">
                                    <a href="{{route('product', $p->id)}}">
                                        <div class="product-card-img">
                                            <img src="{{$p->getFirstMediaUrl('main')}}" alt="">
                                        </div>
                                        <div class="product-card-desc">
                                            <p class="product-ard-name">{{$p->name}}</p>
                                            <p class="product-card-category">{{$p->category->name}}</p>
                                            <p class="product-card-price">{{$p->price}}</p>
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
<!--footer-->
@include('layouts.footer')
<!--footer end-->

<div class="standart_popup mfp-with-anim mfp-hide" id="order-popup">
    <div class="standart_popup_content">
        <h4>Sifariş et</h4>
        <form action="/order" method="POST" data-js-form>
            @csrf
            <div class="popup_form">
                <div class="form-group">
                    <label>Ad, Soyad</label>
                    <input type="text" name="name" class="required">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <input type="hidden" name="product_id" value="{{request()->segment(2)}}">
                <div class="form-group">
                    <label>Epoçt</label>
                    <input type="email" name="email" class="required">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Telefon</label>
                    <input type="tel" name="phone" class="required">
                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Ünvan </label>
                    <input type="text" name="address" class="required">
                    @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="popup-submit">Göndər</button>
                </div>
                @if(\Illuminate\Support\Facades\Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <strong>{{ \Illuminate\Support\Facades\Session::get('success') }}</strong>
                    </div>
                @endif
            </div>
        </form>

    </div>
</div>
@include('layouts.scripts')
</body>

</html>
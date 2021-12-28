<!DOCTYPE html>
<html lang="az">

@include('layouts.head')

<body>
<!-- header-->
@include('layouts.header')
<!-- header end-->
<main class="main" role="main">
    <section class="standatr-page-banner media_banner"
             style="background-image: url(/assets/images/media_banner.jpg);">
        <div class="container">
            <div class="row">
                <div class="standart_page_banner_container">
                    <!--breadcrumb-->
                    <div class="breadcrumb_cont">
                        <ul>
                            <li>
                                <a href="#">{{__('Əsas səhifə')}}</a>
                            </li>
                            <li>
                                <a href="#">{{__('Media')}}</a>
                            </li>
                        </ul>
                    </div>
                    <!--breadcrumb-->
                    <h3 class="standart_banner_title" data-aos="fade-up" data-aos-duration="1500">{{__('Media')}}</h3>
                    <img src="/assets/images/standart_aralstone_logo.svg" class="standart_banner_logo" alt="">
                </div>
            </div>
        </div>
    </section>
    <div class="page_in_nav_links">
        <div class="container">
            <div class="row">
                <div class="page_in_navlinks_container">
                    <ul>
                        @foreach($types as $t)
                            <li class="active">
                                <a href="{{route('content-type', $t->id)}}">{{$t->name}}</a>
                            </li>
                        @endforeach
                            <li class="">
                                <a href="/media">{{__('GALEREYA')}}</a>
                            </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--share-->
    <div class="media_inner_container_box">
        <div class="container">
            <div class="row">
                <div class="media_inner_container">
                    <div class="medie_inner_container_textside">
                        <a href="/" class="go_back">
                            <img src="/assets/images/back-arrow.svg" alt="">
                            <p>Geri qayıt</p>
                        </a>
                        <div class="media_inner_contetbox">
                            <div class="media_inner_title">
                                <h4>{{$content->name}}</h4>
                                <span class="media_inner_date">
                                        <img src="/assets/images/clock.svg" alt="">
                                        <p>{{$content->created_at}}</p>
                                    </span>
                            </div>
                            <div class="media_inner_content">
                                <p>{!! $content->text !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="medie_inner_container_imageside">
                        <img src="{{$content->getFirstMediaUrl('main')}}" alt="">
                    </div>
                </div>
{{--                <div class="media_inner_share">--}}
{{--                    <p>Paylaşmaq</p>--}}
{{--                    <div class="media_inner_share_socials">--}}
{{--                        <a href="#">--}}
{{--                            <img src="/assets/images/s_fb.svg" alt="">--}}
{{--                        </a>--}}
{{--                        <a href="#">--}}
{{--                            <img src="/assets/images/s_insta.svg" alt="">--}}
{{--                        </a>--}}
{{--                        <a href="#">--}}
{{--                            <img src="/assets/images/s_tw.svg" alt="">--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
    <!--share end-->
    <!--main media section-->
    <section class="main_media_section media_inner_slider mt-4">
        <div class="container">
            <div class="row">
                <div class="main-media-slider">
                    <div class="owl-carousel" data-js-owl-media>
                        @foreach($contents as $c)
                            <div class="item">
                                <div class="media_card">
                                    <a href="{{route('content-show', $c->id)}}" class="media_card_link">
                                        <div class="media_card_img">
                                            <img src="{{$c->getFirstMediaUrl('main')}}" alt="">
                                        </div>
                                        <div class="media_card_desc">
                                            <h5 class="media_card_title">{{$c->name}}</h5>
                                            <div class="media_card_shortdesc">
                                                <p>{{$c->title}}</p>
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
    <!--main media section end-->
</main>
<!-- main end-->
<!--footer-->
@include('layouts.footer')
<!--footer end-->


<!-- popup content-->
<div class="standart_popup mfp-with-anim mfp-hide" id="login-popup">
    <div class="standart_popup_content">
        <h4>Daxil ol</h4>
        <form action="" data-js-form>
            <div class="popup_form">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="required">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="required">
                </div>
                <div class="form-group forget-password-link">
                    <a class=" popup_btn" href="#register-popup" data-effect="mfp-zoom-in">Şifrəmi unutdum</a>
                </div>
                <div class="form-group">
                    <button type="submit" class="popup-submit">Daxil ol</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!---->
<!-- popup content-->
<div class="standart_popup mfp-with-anim mfp-hide" id="register-popup">
    <div class="standart_popup_content">
        <h4>Qeydiyyatdan keç</h4>
        <form action="" data-js-form>
            <div class="popup_form">
                <div class="form-group">
                    <label>Ad</label>
                    <input type="text" class="required">
                </div>
                <div class="form-group">
                    <label>Soyad</label>
                    <input type="text" class="required">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="required">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="required">
                </div>
                <div class="form-group forget-password-link">
                    <a class=" popup_btn" href="#login-popup" data-effect="mfp-zoom-in">Bir hesabım var</a>
                </div>
                <div class="form-group">
                    <button type="submit" class="popup-submit">Qeydiyyatdan keç</button>
                </div>
            </div>
        </form>
    </div>
</div>
@include('layouts.scripts')

</body>

</html>
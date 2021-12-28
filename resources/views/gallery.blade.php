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
                        @foreach($contents as $c)
                            <li class="{{request()->segment(2) == $c->id ? 'active' : ''}}">
                                <a href="{{route('content-type', $c->id)}}">{{$c->name}}</a>
                            </li>
                        @endforeach
                        <li class="{{request()->segment(1) == 'media' ? 'active' : ''}}">
                            <a href="/media">{{__('GALEREYA')}}</a>
                        </li>
                        {{--<li class="{{request()->segment(1) == 'partners' ? 'active' : ''}}">
                            <a href="/partners">{{__('Partnyorlar')}}</a>
                        </li>
                        <li class="{{request()->segment(1) == 'katalog' ? 'active' : ''}}">
                            <a href="/katalog">{{__('Məhsul Kataloqu')}}</a>
                        </li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="gallery_section">
        <div class="container">
            <div class="row">
                <div class="gallery_container">
                    <div class="gallery_photos">
                        <div class="page_in_title media_in_title">
                            <h3>{{__('Fotolar')}}</h3>
                        </div>
                        <div class="gallery_photos_cont">
                            @foreach($photo as $p)
                                <div class="gallery-card">
                                <a data-fancybox="single" data-src="{{$p->getFirstMediaUrl('main')}}">
                                    <img src="{{$p->getFirstMediaUrl('main')}}" alt="">
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!--videos-->
                    {{--<div class="gallery_videos_cont">
                        <div class="page_in_title media_in_title">
                            <h3>{{__('Videolar')}}</h3>
                        </div>
                        <div class="gallery_videos">
                            @foreach($video as $v)
                                <div class="gallery-video-card">
                                    <a data-fancybox href="{{$v->url}}">
                                        <div class="gallery_video_img">
                                            <img src="" alt="{{$v->url}}">
                                        </div>
                                        <p class="gallery_video_desc">{{$v->v_title}}</p>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>--}}
                </div>
            </div>
        </div>
    </section>
</main>
<!-- main end-->
@include('layouts.footer')
@include('layouts.scripts')

</body>

</html>
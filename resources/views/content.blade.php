<!DOCTYPE html>
<html lang="az">

@include('layouts.head')

<body>
<!-- header-->
@include('layouts.header')
<!-- header end-->
<main class="main" role="main">
    <section class="standatr-page-banner media_banner"
             style="background-image: url(/assets/images/bg-2.jpg);">
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
                                <a href="#">{{__('Layihələrimiz')}}</a>
                            </li>
                        </ul>
                    </div>
                    <!--breadcrumb-->
                    <h3 class="standart_banner_title" data-aos="fade-up" data-aos-duration="1500">{{__('LAYİHƏLƏRİMİZ')}}</h3>
                    <img src="/assets/images/standart_aral_logo.svg" class="standart_banner_logo" alt="">
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
    <div class="media_page_container">
        <div class="container">
            <div class="row">
                <div class="media_page_container_inner">
                    <div class="page_in_title media_in_title">
                        <h3>{{$content->name}}</h3>
                    </div>
                    <div class="media-page-card-list">
                        <div class="row">
                            @foreach($content->contents as $a)
                            <div class="col-lg-3 col-md-4 col-12">
                                <div class="media_card">
                                    <a href="{{route('content-show', $a->id)}}" class="media_card_link">
                                        <div class="media_card_img">
                                            <img src="{{$a->getFirstMediaUrl('main')}}" alt="">
                                        </div>
                                        <div class="media_card_desc">
                                            <h5 class="media_card_title">{{$a->name}}</h5>
                                            <div class="media_card_shortdesc">
                                                <p>{{$a->title}}</p>
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
        </div>
    </div>
</main>
<!-- main end-->
@include('layouts.footer')
@include('layouts.scripts')

</body>

</html>
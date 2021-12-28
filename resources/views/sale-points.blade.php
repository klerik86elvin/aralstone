<!DOCTYPE html>
<html lang="az">

@include('layouts.head')

<body>
<!-- header-->
@include('layouts.header')
<!-- header end-->
<main class="main" role="main">
    <section class="standatr-page-banner" style="background-image: url(assets/images/media_banner.jpg);">
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
                                <a href="#">{{__('Əlaqə')}}</a>
                            </li>
                        </ul>
                    </div>
                    <!--breadcrumb-->
                    <h3 class="standart_banner_title" data-aos="fade-up" data-aos-duration="1500">{{__('Əlaqə')}}</h3>
                    <img src="assets/images/standart_aralstone_logo.svg" class="standart_banner_logo" alt="">
                </div>
            </div>
        </div>
    </section>
    <div class="page_in_nav_links">
        <div class="container">
            <div class="row">
                <div class="page_in_navlinks_container">
                    <ul>
                        <li>
                            <a href="/contact">{{__('Bizə yazın')}}</a>
                        </li>
                        <li class="active">
                            <a href="/sale-points">{{__('Satış nöqtələri')}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="sale_points_box">
        <div class="container">
            <div class="row">
                <div class="sale_points_filter">
                    <div class="sale_point_select_cont">
                        <select name="" class="nice-select" onchange="chooseCity(this);">
                            <option value="">{{__('Şəhər')}}</option>
                            @foreach($cities as $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="sale_point_select_point" style="display: none">
                        <select name="" class="nice-select" onchange="chooseAddress(this);">
                        </select>
                    </div>
                    {{--<div class="sale_point_input">
                        <span class="p_search_icon"></span>
                        <input type="text" placeholder="Rayon, kənd" id="search-input" class="controls">
                    </div>--}}
                </div>

                <div class="sale_points_container">
                    <div class="sale_point_map" id="map"></div>
                </div>
            </div>
        </div>
    </div>

</main>
<!-- main end-->
<!--footer-->
@include('layouts.footer')
<!--footer end-->

<script src="assets/js/map.filter.js?v=5"></script>

<script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1CTCDRKUuLGpkG7HEvPve9Ic0W4fjyls&callback=initAutocomplete&libraries=places&v=weekly"
        async></script>

@include('layouts.scripts')

<script>

</script>
</body>

</html>
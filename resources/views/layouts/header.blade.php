<header class="header">
    <div class="container">
        <div class="row">
            <!--header top-->
            <div class="header_container">
                <div style="display: flex">

                    <a href="/" class="logo">
                        <img src="/assets/images/logo.svg" alt="">
                    </a>
                </div>
                <div class="header-settings">
                    <div class="search_box" data-js-search-open>
                        <form action="{{route('search')}}" method="GET">
                            <input type="text" name="result" placeholder="Məhsul axtarışı" class="">
                            <button class="search_open search_submit" type="submit">
                                <img src="/assets/images/search.svg" alt="">
                            </button>
                            <button class="search_open open_search_input" type="button">
                                <img src="/assets/images/search.svg" alt="">
                            </button>
                        </form>

                    </div>
                    <!-- <button class="header-set header-search bg_setting"></button> -->
                    <a href="tel:+994555008807" class="header-set call-center">
                        <div class="call-center-icon">
                            <img src="/assets/images/headphones.svg" alt="">
                        </div>
                        <div class="call-center-desc">
                            <p>{{__('Bizə zəng edin')}}</p>
                            <span>+994 50 489 55 00</span>
                        </div>
                    </a>
                    @include('layouts.lang-table')
                   {{-- <a class=" popup_btn login_link" href="#login-popup" data-effect="mfp-zoom-in">
                        Daxil ol
                    </a>--}}
                </div>
            </div>
            <!--header top end-->
            <!--header bottom-->
            <div class="header_bottom d-flex justify-content-center">
                {{--<a href="#" class="product_cats" data-js-mega>
                    <p>{{__('Məhsul Kateqoriyaları')}}</p>
                    <img src="/assets/images/mcat_drop.svg" alt="">
                </a>--}}
                <!-- megamenu-->
                {{--<div class="product_categories_megamenu">
                    <div class="product_categories_megamenu_inner">
                        @foreach($categories as $c)
                            <div class="product_categories_megamenu_inner_category">
                            <h4>{{$c->name}}</h4>
                            <ul>
                                @foreach($c->subCategories as $sub)
                                    <li>
                                        <a href="{{'/categories/'.$c->id.'/'.$sub->id}}">{{$sub->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @endforeach
                        <button class="megamenu_close"></button>
                    </div>
                </div>--}}
                <!--megamenu end-->
                <div class="header-navbar">
                    <ul>
                        <li>
                            <a class="{{request()->segment(1)== null ? "active" : ""}}" href="/">{{__('Əsas səhifə')}}</a>
                        </li>
                        <li>
                            <a class="{{request()->segment(1)== "about-us" ? "active" : ""}}" href="/about-us">{{__('Haqqımızda')}}</a>
                        </li>
                        <li>
                            <a class="{{request()->segment(1)== "products" ? "active" : ""}}" href="{{route('products')}}">{{__('Məhsullar')}}</a>
                        </li>
                        <li>
                            <a class="{{request()->segment(1)== "content-type" ? "active" : ""}}" href="/content-type/1">{{__('Media')}}</a>
                        </li>
                        <li>
                            <a class="{{request()->segment(1)== "contact" ? "active" : ""}}" href="/contact">{{__('Əlaqə')}}</a>
                        </li>
                    </ul>
                    <button class="menu_open">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
            <!--header bottom end-->
        </div>
    </div>
    <!-- mobile sidebar-->
    <div class="side_menu">
        <div class="side_menu_header">
            <a href="/">
                <img src="/assets/images/logo.svg" alt="">
            </a>
            <button class="side_menu_close"></button>
        </div>
        <div class="side_menu_inner">
            <div class="side_menu_navbar">
                <ul>
                    <li>
                        <a href="/">{{__('Ana səhifə')}}</a>
                    </li>
                    <li>
                        <a href="/about-us">{{__('Haqqımızda')}}</a>
                    </li>
                    <li>
                        <a href="{{route('products')}}">{{__('Məhsullar')}}</a>
                    </li>
                    <li>
                        <a href="/media">{{__('Media')}}</a>
                    </li>
                    <li>
                        <a href="/contact">{{__('Əlaqə')}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- mobile sidebar end-->
    <div class="layer"></div>
</header>
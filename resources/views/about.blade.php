<!DOCTYPE html>
<html lang="az">
    @include('layouts.head')
    <body>
        @include('layouts.header')
        <main class="main" role="main">
            <section class="about_page_section ">
                <div class="about_page_image page-padding" style="background-image: url({{$data->getFirstMediaUrl('main')}});">
                    <div class="container">
                        <div class="row">
                            <div class="about_page_container">
                                <!--breadcrumb-->
                                <div class="breadcrumb_cont">
                                    <ul>
                                        <li>
                                            <a href="#">{{__('Əsas səhifə')}}</a>
                                        </li>
                                        <li>
                                            <a href="#">{{__('Haqqımızda')}}</a>
                                        </li>
                                    </ul>
                                </div>
                                <!--breadcrumb-->
                                <div class="about-page-content">
                                    <h3 class="text-center" data-aos="fade-up" data-aos-duration="2000">{{__('Haqqımızda')}}</h3>
                                    <div class="about_page_text_content" data-aos="fade-up" data-aos-duration="2000">
                                        {!! $data->text !!}
                                    </div>
                                </div>
                                <div class="aze_gubre_logo">
                                    <img src="/assets/images/aralstone_logo.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        @include('layouts.footer')
    </body>
</html>
@include('.layouts.scripts')

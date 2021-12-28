<!DOCTYPE html>
<html lang="az">

@include('layouts.head')

<body>
<!-- header-->
    @include('layouts.header')
    <!-- header end-->
    <main class="main" role="main">
        <section class="standatr-page-banner agro-banner" style="background-image: url(assets/images/aqro_banner.jpg);">
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
                                    <a href="#">{{__('Aqronom Xidməti')}}</a>
                                </li>
                            </ul>
                        </div>
                        <!--breadcrumb-->
                        <h3 class="standart_banner_title" data-aos="fade-up" data-aos-duration="1500">{{__('Aqronom Xidməti')}}
                        </h3>
                        <img src="/assets/images/standart_gubre_logo.svg" class="standart_banner_logo" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section class="standart_page_section">
            <div class="container">
                <div class="row">
                    <div class="standart_page_container">
                        <div class="standart_page_text_side">
                            <div class="standart_page_text_side_content">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer took a galley of type and scrambled it to make a type specimen book.
                                    It has survived not only five centuries, but also the leap into electronic
                                    typesetting, remaining essentially unchanged. It was popularised in the 1960s with
                                    the release of Letraset sheets containing Lorem Ipsum passages, and more recently
                                    with desktop publishing software like Aldus PageMaker including versions of Lorem
                                    Ipsum.</p><br>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer took a galley of type and scrambled it to make a type specimen book.
                                    It has survived not only five centuries, but also the leap into electronic
                                    typesetting, remaining essentially unchanged. It was popularised in the 1960s with
                                    the release of Letraset sheets containing Lorem Ipsum passages, and more recently
                                    with desktop publishing software like Aldus PageMaker including versions of Lorem
                                    Ipsum.</p>
                            </div>
                        </div>
                        <div class="standart_page_img_side">
                            <img src="/assets/images/spage_img.png" alt="">
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
    @include('layouts.scripts')
</body>

</html>
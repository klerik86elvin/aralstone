
<div class="main_page_carousel" data-main-swiper>
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach($slider as $s)
                <div class="swiper-slide">
                <img src="{{$s->getFirstMediaUrl('main')}}" />
                <!-- slider inner content-->
                <div class="main-slider-content">
                    <div class="container">
                        <div class="row">
                            <div class="main_slider_container">
                                <div class="slider_text_container d-flex align-items-center" data-aos="fade-right" data-aos-duration="2000">
                                    <h3>{{$s->title}}</h3>
                                    <div class="slider_text_content">
                                        <p>{{$s->text}}</p>
                                    </div>
                                    <a href="{{$s->url}}" class="button_hover">{{__('Ətraflı')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- slider inner content end-->
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>

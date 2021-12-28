<!DOCTYPE html>
<html lang="az">
<style>
    .contact_section_form_box_contacts_list a {
        color: white;
    }
</style>
@include('layouts.head')

<body>
<!-- header-->
@include('layouts.header')
<!-- header end-->
<main class="main" role="main">
    <section class="standatr-page-banner" style="background-image: url(assets/images/bg-2.jpg);">
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
                        <li class="active">
                            <a href="/contact">{{__('Bizə yazın')}}</a>
                        </li>
                        <li>
                            <a href="/sale-points">{{__('Satış nöqtələri')}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="contact_section">
        <div class="map_box" id="map"></div>
        <div class="contact-section-form-box">
            <div class="contact-section-fomr-box-inner">
                <div class="contact_section_form_box_contacts">
                    <div class="contact_section_form_box_contacts_title">
                        <h4>{{__('Əlaqə')}}</h4>
                    </div>
                    <ul class="contact_section_form_box_contacts_list" style="color: white;">
                        {!! $contacts !!}
                    </ul>
                    <ul class="contact_page_socials">
                        @foreach($socials as $s)
                        <li>
                            <a href="{{$s->url}}" target="_blank">
                                <img src="/storage/{{$s->icon}}" alt="">
                            </a>
                        </li>
                            @endforeach
                    </ul>
                </div>
                <div class="contact_section_form_box_form">
                    <div class="contact_section_form_box_form_title">
                        <h4>{{__('Bizə yazın')}}</h4>
                    </div>
                    <div class="contact_section_form_box_form_elements">
                        <form action="/contact" method="POST" data-js-form>
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="{{__('Ad')}}" class="">
                                    </div>
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="surname" placeholder="{{__('Soyad')}}" class="">
                                    </div>
                                    @error('surname')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="{{__('Epoçt')}}" class="">
                                    </div>
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                            <textarea name="text" id="" placeholder="{{__('Müraciətin mətni')}}"
                                                      class="required"></textarea>
                                    </div>
                                    @error('text')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="contact-form-submit">{{__('Göndər')}}</button>
                                    </div>
                                    @if(\Illuminate\Support\Facades\Session::get('success'))
                                        <div class="alert alert-success alert-block">
                                            <strong>{{ \Illuminate\Support\Facades\Session::get('success') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </form>
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


<script>
    let map;
    const iconBase =
        "/assets/images/";
    const icons = {
        store: {
            icon: iconBase + "pin.svg",
        },
    };


    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: new google.maps.LatLng(40.41868, 49.87117),
            zoom: 16,
            panControl: false,
            zoomControl: false,
            mapTypeControl: false,
            scaleControl: false,
            streetViewControl: false,
            overviewMapControl: false,
            rotateControl: false,

        });

        const features = [
            {
                position: new google.maps.LatLng(40.42112, 49.87869),
                type: "store",
            },
        ];

        // Create markers.
        for (let i = 0; i < features.length; i++) {
            const marker = new google.maps.Marker({
                position: features[i].position,
                icon: icons[features[i].type].icon,
                map: map,
            });
        }
    }
</script>
<script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1CTCDRKUuLGpkG7HEvPve9Ic0W4fjyls&amp;callback=initMap">
</script>

@include('layouts.scripts')


</body>

</html>
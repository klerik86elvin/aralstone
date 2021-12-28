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
                    <img src="/assets/images/standart_gubre_logo.svg" class="standart_banner_logo" alt="">
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
                            <a href="/media">{{__('Foto / Video')}}</a>
                        </li>
                        <li class="{{request()->segment(1) == 'partners' ? 'active' : ''}}">
                            <a href="/partners">{{__('Partnyorlar')}}</a>
                        </li>
                        <li class="{{request()->segment(1) == 'katalog' ? 'active' : ''}}">
                            <a href="/katalog">{{__('Məhsul Kataloqu')}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="standart_page_section">
        <div class="container">
            <!-- brc end-->
            <div class="standart_page_content">
                <div class="page_title two_side_title">
                    <h2>{{__('Partnyorlar')}}</h2>
                </div>
                <div class="partners_container">
                    <div class="partner_list">
                        @foreach($partners as $p)
                            <!-- partnr box-->
                            <div class="partner_box">
                                <div class="partner_img">
                                    <img src="{{$p->getFirstMediaUrl('main')}}" alt="">
                                </div>
                                <div class="partner_desc">
                                    <a href="#" class="partner_name">{{$p->name}}</a>
                                    <div class="partner_desc_cont">
                                        {{$p->text}}
                                    </div>
                                </div>
                            </div>
                            <!-- partnr box nd-->
                            <!-- partnr box-->
                        @endforeach
                       {{-- <div class="partner_box">
                            <div class="partner_img">
                                <img src="assets/images/partner2.png" alt="">
                            </div>
                            <div class="partner_desc">
                                <a href="#" class="partner_name">Ukrainskaya sırnaya kampaniya</a>
                                <div class="partner_desc_cont">
                                    "Ukrainskaya sırnaya kampaniya" MMC muasir, yüksək texnoloji pendir istehsalçısı olan “Dubnomolko” İSC-nin tərkibinə daxildir. Şirkətin məqsədi milli istehsalçı kimi və Ukrayna pendir bazarının lideri kimi istehsalı və ixracatı artırmaqdır.<br>
                                    "Ukrainskaya sırnaya kampaniya" MMC müasir istesal sahəsi, stabil xammal bazası, peşakar personalı, özəl distribusiya sistemi, məhsul portfelinə güclü marketinq yanaşması olan bir şirkətdir. Şirkət Azərbaycanda "Komo" brendli məhsulları ilə təmsil olunur.
                                </div>
                            </div>
                        </div>
                        <!-- partnr box nd-->
                        <!-- partnr box-->
                        <div class="partner_box">
                            <div class="partner_img">
                                <img src="assets/images/partner3.png" alt="">
                            </div>
                            <div class="partner_desc">
                                <a href="#" class="partner_name">Nordex Food</a>
                                <div class="partner_desc_cont">
                                    NORDEX FOOD şirkəti 1984-cü ildə təsis olunmuşdur.
                                    NORDEX FOOD şirkəti Aralıq dənizi ətrafında olan ölkələrdən ənənəvi olaraq tədarük edilən ağ pendir isteshalında ixtisaslaşdırılan Daniya süd məhsulları şirkətinin özəl mülkiyyətidir.
                                    Dairyland, Sütdiyarı, Taverna, Arkadia, Yeşilova kimi bizim brendlərimiz bütün dünyada tanınmışdır.

                                </div>
                            </div>
                        </div>
                        <!-- partnr box nd-->
                        <!-- partnr box-->
                        <div class="partner_box">
                            <div class="partner_img">
                                <img src="assets/images/partner4.png" alt="">
                            </div>
                            <div class="partner_desc">
                                <a href="#" class="partner_name">VoronejrosAqro</a>
                                <div class="partner_desc_cont">
                                    <P>"VoronejrosAqro" MMC -dinamik inkişaf edən süd məhsulları istehsalçısıdır.1996-cı ildə yaranan şirkət qısa müddət ərzində məhsullarının keyfiyyitilə istehlakçıların rəğbətini qazanıb. Yağlar, spredlər, kolbasnıy pendir və əridilmiş pendirlər istehsalı üzrə ixtisaslaşıb.</P>
                                    Azərbaycan alıcıları, "Yantar", "Voloqodskaya ekstra", "Burenkin Luq" kimi məhsullarını həvəslə istifadə edirlər.
                                </div>
                            </div>
                        </div>
                        <!-- partnr box nd-->
                        <!-- partnr box-->
                        <div class="partner_box">
                            <div class="partner_img">
                                <img src="assets/images/partner5.png" alt="">
                            </div>
                            <div class="partner_desc">
                                <a href="#" class="partner_name">Andruşevskiy</a>
                                <div class="partner_desc_cont">
                                    <P>Andruşevskiy yağ-pendir zavodu 30 ildən çox müddət ərzində MDB ərazisində ən böyük olan yüksək keyfiyyətli pendir və ənənəvi Ukrayna kərə yağı istehsalçılarından biri kimi məşhurdur.</P>
                                    <P>Zavod pendir və yağdan başqa yağsızlaşdırılmış quru süd və zərdab istehsal edir. Müəssisənin xüsusi iftixarı öz yüksək keyfiyyəti və çeşid müxtəlifliyi ilə özünü tanıtmış "Zolotava" TM məhsullarıdır.</P>
                                </div>
                            </div>
                        </div>
                        <!-- partnr box nd-->
                        <!-- partnr box-->
                        <div class="partner_box">
                            <div class="partner_img">
                                <img src="assets/images/partner6.png" alt="">
                            </div>
                            <div class="partner_desc">
                                <a href="#" class="partner_name">Efko</a>
                                <div class="partner_desc_cont">
                                    <P>"Efko" şirkətlər qrupu Rusiyanın ən qabaqcıl yağ istehsalçısıdır. Şirkət əsasən sənaye tipli istehsal etdiyi yağları şirniyyat, cörək və digər qida istehsalı sahələrində istifadə olunur. Bundan əlavə şirkət mayonez,ketçup və bitki yağları istehsal edir.</P>
                                    <P>Şirkət Azərbaycanda "Sloboda", Daçnoe və "Altero" brendləri ilə təmsil olunur.</P>
                                </div>
                            </div>
                        </div>
                        <!-- partnr box nd-->--}}

                    </div>
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
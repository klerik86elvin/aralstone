<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="footer_container">
                <div class="footer-nav-container">
                    <a href="index.html">
                        <img src="assets/images/footer_logo.svg" alt="">
                    </a>
                    <div class="footer-links-side">
                        <!-- link box-->
                        <div class="footer_link_box">
                            <h4>Məlumat</h4>
                            <ul>
                                <li>
                                    <a href="/about-us">{{__('Haqqımızda')}}</a>
                                </li>
                                <li>
                                    <a href="/content-type/1">{{__('Layihələrimiz')}}</a>
                                </li>
                            </ul>
                        </div>
                        <!-- link box end-->
                        <!-- link box-->
                        <div class="footer_link_box">
                            <h4>{{__('Məhsullar')}}</h4>
                            <ul>
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{route('category', $category->id)}}">{{$category->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- link box end-->
                        <!-- link box-->
                        <!-- link box end-->
                        <!-- link box-->
                        <div class="footer_link_box">
                            <h4>{{__('Əlaqə')}}</h4>
                            {!! $contacts !!}
                        </div>
                        <!-- link box end-->

                        <!-- link box-->
                        <div class="footer_link_box">
                            <h4>{{__('Sosial Media')}}</h4>
                            <ul>
                                @foreach($socials as $s)
                                    <li>
                                        <a href="#" target="_blank">
                                            <div class="social_img_box">
                                                <img src="/storage/{{$s->footer_icon}}" alt="">
                                            </div>
                                            <p>{{$s->name}}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- link box end-->


                    </div>
                </div>
                <div class="footer-copyright-container">
                    <p>Copyright © 2021 Azergubre LLC All rights reserved.</p>
                    <a href="http://www.marline.agency" target="_blank" rel="noopener noreferrer">
                        <img style="width: 150px" src="/assets/images/d_by.svg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!DOCTYPE html>
<html lang="az">
@include('layouts.head')
<body>
<!-- header-->
@include('layouts.header')
<!-- header end-->
<main class="main" role="main">
    <section class="products-section product-filter-section ">
        <div class="place-for-header"></div>
        <div class="container">
            <div class="row">
                <div class="product-page-container">
                    <!--breadcrumb-->
                    <div class="breadcrumb_cont black-breadcrumb">
                        <ul>
                            <li>
                                <a href="/">{{__('Əsas səhifə')}}</a>
                            </li>
                            <li>
                                <a href="/products">{{__('Nəticə')}}</a>
                            </li>
                        </ul>
                    </div>
                    <!--breadcrumb-->
                    <div class="page_in_title">
                        <h3>{{__('Məhsullar')}}</h3>
                    </div>
                    <div class="product-page-product-list">
                        <div class="row">
                            @foreach($products as $a)
                                <div class="col-lg-2 col-md-3 col-6" data-cat_id="{{$a->category->id}}">
                                <div class="product_card" data-product-name="{{\Illuminate\Support\Str::lower($a->name)}}">
                                    <a href="{{route('product', $a->id)}}">
                                        <div class="product-card-img">
                                            <img src="{{$a->image}}" alt="">
                                        </div>
                                        <div class="product-card-desc">
                                            <p class="product-ard-name">{{$a->name}}</p>
                                            <p class="product-card-category">{{$a->category->name}}</p>
                                            <p class="product-card-price">{{$a->price}}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @foreach($contentType as $type)
                        <div class="media_page_container_inner">
                        <div class="page_in_title media_in_title">
                            <h3>{{$type->name}}</h3>
                        </div>
                        <div class="media-page-card-list">
                            <div class="row">
                                @foreach($type->contents as $c)
                                    <div class="col-lg-3 col-md-4 col-12">
                                        <div class="media_card">
                                            <a href="{{route('content-show', $c->id)}}" class="media_card_link">
                                                <div class="media_card_img">
                                                    <img src="{{$c->getFirstMediaUrl('main')}}" alt="">
                                                </div>
                                                <div class="media_card_desc">
                                                    <h5 class="media_card_title">{{$c->name}}</h5>
                                                    <div class="media_card_shortdesc">
                                                        <p>{{$c->title}}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
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
<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<script src="https://unpkg.com/@webcreate/infinite-ajax-scroll/dist/infinite-ajax-scroll.min.js"></script>
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
                                <a href="/products">{{__('Məhsullar')}} </a>
                            </li>
                        </ul>
                    </div>
                    <!--breadcrumb-->
                    <div class="page_in_title">
                        <h3 class="text-center">{{__('Məhsullar')}}</h3>
                    </div>
                    <div class="product-page-filter">
                        <div class="row">
                            <div class="product_tab_gallery_tabs tab-links d-flex justify-content-center" data-aos="fade-up" data-aos-duration="1500">
                                @foreach($categories as $category)
                                    <a href="{{route('category', $category->id)}}" class="{{request()->segment(2) == $category->id ? "active" : ""}}" data-cat_id="{{$category->id}}">{{$category->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="product-page-product-list">
                        <div class="row d-flex justify-content-center">
                            @include('products-data')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="ajax-load text-center" style="display: none">
        <p>
            <img style="height: 200px" src="{{asset('assets/images/loader.gif')}}" alt="">
        </p>
    </div>
</main>
<!-- main end-->
@include('layouts.footer')

@include('layouts.scripts')
<script>
    let categoryID = 0;
    function loadMoreData(page) {
        $.ajax({
            url: `?page=${page}`,
            type: 'get',
            beforeSend: function () {
                $(".ajax-load").show();
            }
        })
            .done(function (data) {
                if (data.html == " "){
                    $('.ajax-load').html("No more records found")
                    return;
                }
                $('.ajax-load').hide();
                $('.product-page-product-list').find('.row').append(data.html)
            })
    }
    var  page = 1;
    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() && categoryID == 0){
            page++;
            loadMoreData(page);
        }
    });

    $('.select-container').on('click', 'ul.list', function(e) {
        $('.product-page-product-list').find('.row').html('');
        categoryID = e.target.getAttribute('data-value');
        if (categoryID != 0) {
            $.ajax({
                url: `api/category/${categoryID}/products`,
                type: 'get',
                contentType: 'application/json',
                beforeSend: function () {

                    console.log($('.ajax-load-by-category'));
                    $('.ajax-load').show();
                }
            })
                .done(function (data) {
                    $('.product-page-product-list').find('.row').html('');
                    $('.product-page-product-list').find('.row').append(data.html);
                    $('.ajax-load').hide();
                })
        }
        else {
            loadMoreData(page)
        }
    });




</script>
</body>

</html>
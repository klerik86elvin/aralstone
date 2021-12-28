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
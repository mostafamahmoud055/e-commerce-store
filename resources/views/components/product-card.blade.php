<div class="col-lg-3 col-md-6 col-12">
    <form action="{{ route('cart.store') }}" method="post">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
    <!-- Start Single Product -->
    <div class="single-product">
        <div class="product-image">
            <img src="{{ $product->ImageUrl }}" alt="#">
            @if ($product->sale_percent)
                <span class="sale-tag">-{{ $product->sale_percent }}%</span>
            @endif
            @if ($product->new)
                <span class="new-tag">{{ $product->new }}</span>
            @endif
            <div class="button">
                <button type="submit" href="{{ route('product.show',$product->id) }}" class="btn"><i class="lni lni-cart"></i> Add to
                    Cart</button>
            </div>
        </div>
        <div class="product-info">
            <span class="category">{{ $product->category->name }}</span>
            <h4 class="title">
                <a href="{{ route('product.show',$product->slug) }}">{{ $product->name }}</a>
            </h4>
            <ul class="review">
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star"></i></li>
                <li><span>4.0 Review(s)</span></li>
            </ul>
            <div class="price">
                <span>{{ Currency::format($product->price) }}</span>
                @if ($product->compare_price)
                    <span class="discount-price">{{ Currency::format( $product->compare_price )}}</span>
                @endif
            </div>
        </div>
    </div>
    <!-- End Single Product -->
</form>
</div>

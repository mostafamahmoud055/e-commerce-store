<div class="cart-items">
    <a href="javascript:void(0)" class="main-btn">
        <i class="lni lni-heart"></i>
        <span class="total-items">{{ $count }}</span>
    </a>
    <!-- Shopping Item -->
    <div class="shopping-item">
        <div class="dropdown-cart-header">
            <span >{{ $count }} Items</span>
            <a href="{{ route('cart.index') }}">Wish List</a>
        </div>
        <ul class="shopping-list">
            @foreach ($items as $item)
                <li>
                    <form action="{{ route('wishlist.destroy',$item->id) }}" method="post">
                        @csrf
                        @method('delete')
                        {{-- <button style="line-height:0;border-color:transparent" class="remove-item" type="submit"><i class="lni lni-close"></i></button> --}}
                        <button href="javascript:void(0)" type="submit" class="remove" title="Remove this item"><i
                                class="lni lni-close"></i></button>
                    </form>
                    <div class="cart-img-head">
                        <a class="cart-img" href="{{ route('product.show',$item->product->slug) }}"><img
                                src="{{ $item->product->image_url }}" alt="#"></a>
                    </div>

                    <div class="content">
                        <h4><a href="{{ route('product.show',$item->product->slug) }}">
                            {{ $item->product->name }}</a></h4>
                        <p class="quantity"><span class="amount">{{ Currency::format($item->product->price) }}</span></p>
                    </div>
                </li>
            @endforeach
        </ul>
        {{-- <div class="bottom">
            <div class="button">
                <a href="{{ route('cart.store') }}" class="btn animate">Checkout</a>
            </div>
        </div> --}}
    </div>
    <!--/ End Shopping Item -->
</div>

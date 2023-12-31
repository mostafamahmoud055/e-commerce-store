<x-front-layout title="Cart">

    <x-slot name="breadcrumb">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">Cart</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li>
                                <a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a>
                            </li>
                            <li>
                                <a href="{{ route('products.index') }}">Shop</a>
                            </li>
                            <li>Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <div class="shopping-cart section">
        <div class="container">
            <x-alert type="success" class="mb-3" />
            <div class="cart-list-head">
                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-12"></div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <p>Product Name</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Quantity</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Subtotal</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Discount</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Remove</p>
                        </div>
                    </div>
                </div>
                @foreach ($cart->get() as $item)
                    <div class="cart-single-list" id={{ $item->id }}>
                        <div class="row align-items-center">
                            <div class="col-lg-1 col-md-1 col-12">
                                <a href="{{ route('product.show', $item->product->slug) }}"><img
                                        src="{{ $item->product->image_url }}" alt="#"/></a>
                            </div>
                            <div class="col-lg-4 col-md-3 col-12">
                                <h5 class="product-name">
                                    <a href="{{ route('product.show', $item->product->slug) }}">
                                        {{ $item->product->name }}</a>
                                </h5>
                                <p class="product-des">
                                    <span><em>Type:</em> Mirrorless</span>
                                    <span><em>Color:</em> Black</span>
                                </p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <div class="count-input">
                                    <input data-id="{{ $item->id }}" class="form-control item-quantity"
                                        value="{{ $item->quantity }}" />

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>{{ Currency::format($item->quantity * $item->product->price) }}</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>-{{ Currency::format($item->product->sale_percent) }}%</p>
                            </div>
                            <div class="col-lg-1 col-md-2 col-12">
                                <form action="{{ route('cart.destroy',$item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button style="line-height:0;border-color:transparent" class="remove-item" type="submit"><i class="lni lni-close"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="https://demo.graygrids.com/themes/shopgrids/cart.html#"
                                            target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon" />
                                            <div class="button">
                                                <button class="btn">Apply Coupon</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Shipping<span>Free</span></li>
                                        {{-- <li>You Save<span>$29.00</span></li>
                                        <li class="last">You Pay<span>$2531.00</span></li> --}}
                                        <li>Cart Subtotal<span id="total">{{ Currency::format($cart->total()) }}</span></li>
                                    </ul>
                                    <div class="button">
                                        <a href="{{ route('checkout') }}"
                                            class="btn">Checkout</a>
                                        <a href="https://demo.graygrids.com/themes/shopgrids/product-grids.html"
                                            class="btn btn-alt">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            const csrf_token = '{{ csrf_token() }}';
        </script>
        <script src="{{ asset('dist/js/jquery-3.6.1.min.js') }}"></script>
    @endpush
        @vite('resources/js/cart.js')
</x-front-layout>

<x-front-layout title="Checkout">
    <x-slot name="breadcrumb">

        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">checkout</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{ route('home') }}"><i class="lni lni-home"></i>
                                    Home</a>
                            </li>
                            <li><a href="{{ route('products.index') }}">Shop</a></li>
                            <li>checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    @if (session()->has('order-failed'))
        <div class="alert alert-danger">
            {{ session('order-failed') }}
        </div>
    @endif
    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form action="{{ route('checkout') }}" method="post">
                        @csrf
                        <div class="checkout-steps-form-style-1">
                            <ul id="accordionExample">
                                <li>
                                    <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                        aria-expanded="true" aria-controls="collapseThree">Your Personal Details </h6>
                                    <section class="checkout-steps-form-content collapse show" id="collapseThree"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <div class="row">
                                                        <div class="col-md-6 form-input form">
                                                            <x-form.input name="address[first_name]"
                                                                value="{{ Auth::user()->first_name }}"
                                                                label="First Name"/>
                                                        </div>
                                                        <div class="col-md-6 form-input form">
                                                            <x-form.input name="address[last_name]"
                                                                value="{{ Auth::user()->last_name }}"
                                                                label="Last Name" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">

                                                    <div class="form-input form">
                                                        <x-form.input name="address[email]" label="Email Adderss"
                                                            value="{{ Auth::user()->email }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">

                                                    <div class="form-input form">
                                                        <x-form.input name="address[phone_number]" label="Phone Number"
                                                            value="{{ Auth::user()->phone_number }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">

                                                    <div class="form-input form">
                                                        <x-form.input name="address[street]" label="Street" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">

                                                    <div class="form-input form">
                                                        <x-form.input name="address[city]" label="City" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 d-none">
                                                <div class="single-form form-default">

                                                    <div class=" form-input form">
                                                        <x-form.select name="address[country]" :options="$countries"
                                                            label="Country" selected="EG" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">

                                                    <div class="form-input form">
                                                        <x-form.input name="address[building]" label="Building" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">

                                                    <div class="form-input form">
                                                        <x-form.input name="address[floor]" label="Floor" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">

                                                    <div class="form-input form">
                                                        <x-form.input name="address[apartment]" label="Apartment" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="single-form form-default">

                                                    <div class="form-input form">
                                                        <x-form.select name="address[country]" label="Country"
                                                            selected="us" :options="$countries" />
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-12">
                                                    <div class="single-checkbox checkbox-style-3">
                                                        <input type="checkbox" id="checkbox-3">
                                                        <label for="checkbox-3"><span></span></label>
                                                        <p>My delivery and mailing addresses are the same.</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="checkout-payment-option">
                                                        <h6 class="heading-6 font-weight-400 payment-title">Select Delivery
                                                            Option</h6>
                                                        <div class="payment-option-wrapper">
                                                            <div class="single-payment-option">
                                                                <input type="radio" name="shipping" checked=""
                                                                    id="shipping-1">
                                                                <label for="shipping-1">
                                                                    <img src="data:image/webp;base64,UklGRrYAAABXRUJQVlA4TKoAAAAvO8AHAJdgpm2b8cc3GuvZ7AsNBW3bsDh9m4K2bZjyRzkSv902/7FYSgKEWroPedfQlwQIjZ4AoZbygZAAJTBy28aRt2ba7mT8/99u95z2FtH/CcBPvzhvq1X2YnyuBDvf+ricb5BcZYyPzVKbVAY73gKw11HkfH8w1KBifFdlsJ6A/kq6KkmuAPGsAEkK8AykBgCegdQgbcyJ8RCZE4sWorvhNLrbKPYbAw=="
                                                                        alt="Sipping" data-pagespeed-url-hash="4092129372"
                                                                        onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                                                                        id="pagespeed_img_rHQArJ18Py1">
                                                                    <p>Standerd Shipping</p>
                                                                    <span class="price">$10.50</span>
                                                                </label>
                                                            </div>
                                                            <div class="single-payment-option">
                                                                <input type="radio" name="shipping" id="shipping-2">
                                                                <label for="shipping-2">
                                                                    <img src="data:image/webp;base64,UklGRuoBAABXRUJQVlA4TN4BAAAvO8AHEM/juG0jSVLNPjd/YHPaeO5qW2kwaBvJkb/gef7M+m8YtG0jyH0Kj+n5I/qFINumCPOnvMHjeX4nRCEMkRCEqBAVIQxBYGbhwqzZgVIIxEaYRbWJEAgy5rbkO+AxSOhsIMZvUmPZOJORU2qEIDCDiCEwF1xOZjDCYP3tP4KSZsv7P8JIfCYCOYNANAlKQROxFMJGFIRADM1xaApBGCIiWgTGuO88jncs6/XdXn9MBti2badqcHd3qJe6C3Xq7u7umnJKv/+chDsGbzwlEf1nG7BtG2JLIel6BFSTUi1MzqAAn4mIdLArAwmwgh+dPNoUfmYCfu77QanODyblWxaGscqvp+kdA5Y0ybLPKlAHricMmIL0K5Pyq9vxgDXOrJr0Py/gFtVh3kKnk/b8FRmmYQ2dXqJaH5s3r5VS49D1yaQ8sBT50dNhjqDT94DmT0jJOxtsX0p5HkkeSxEXUfchBqzoKmiSo6eBLMEueTTtdMxhQBxC6FT02meViGgvrVpeoAwGHkQz8z5m2MCAPYv1FANWdcvCedtpnKFdMwXCUPO6oNPHUQuMku0QgUUMuLHCxLdAj4m+AqXcRshZJU+9Tw8qhw1iYMxjAG6HVCvfy5PmG/xV996oWakE"
                                                                        alt="Sipping" data-pagespeed-url-hash="91661997"
                                                                        onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                                                                        id="pagespeed_img_TM2xRAY3_L2">
                                                                    <p>Standerd Shipping</p>
                                                                    <span class="price">$10.50</span>
                                                                </label>
                                                            </div>
                                                            <div class="single-payment-option">
                                                                <input type="radio" name="shipping" id="shipping-3">
                                                                <label for="shipping-3">
                                                                    <img src="data:image/webp;base64,UklGRlwFAABXRUJQVlA4TE8FAAAvO8AHEI2Yads21Xb7HNH/KH5MBAJJ/pQjjCOQTXGL5ASSNuufckH20/8oWmJnHcBC17Zt07bV+tzH6VWqiP/g+936At8b+ZmR9z5rBJvvKm7P9nxGkVRb27It+7rf9/twy0AG6EEBtwYw/cnhMvMUrjFcR7/wfs8tsbZtU3vmvu+PnRKSIqwm2JULsipIAbb14W5ZsG2bdrRO3LZt27Zt87RjnHfb0c2teue9th0nX135sm3btu3cCQDic/3BF5dH7/z7+yKdS5X8/3Ceaih/Mmjk+MOzCsa0QMYrlJJ+qYN7v0L74/f38QdnL1VXHaY5k1ZMKsGvx+3kndP7qyhL1jof+QmZTMzA53E6euvU5kxRRbYTcFFYyibeEFmr6EPy48LjK5pH/72ypCgSugQCFlLYmj1JFR/AZIl9l+5tKZ3Tsm0E7xUMlrOgV1IBA0d2Xk/c2JlWzHkUyBcEFrPK97V9vyWXpDb3InchG5asINNUhbmoy5Gf72dAmdur1ZLdyvvEwf7FIiV+6yFA0tVT98nRT5dnQsliqx9ZWUZHslSAItuRXE5HiswhMKcoTsdy3+ldrtD/9rsuPP720r9BCNx6PBiQCiV6kqmc7H2WoGfnxIlh4+W7kB4soTcFbcX3jfUeCZpffvlhyGh9XD/yCoZWODn/wKWbWjB7l1lQ1TpkxofdiWv7TGMYw6TswKLwrxk3Fzp7avfirFbj20ahSgMJTQEpUoqbYXPr2hN7kI89OjO//a9lJddV1B2uWJ0LCTtY4KL7buRWgyHLlCar9NAn0xTmqWhJxZ/9IcEA4PWmBQYkljBavyWILMCEpgIKkoIJWguf7Fvfh2xH2bU/nXdpy0Xq6amu5EBkLxAX3X/dlZblN2hZIQfynQqHYZ4qMiti8xoSCIAyVE0t9Nv/v9Mh0KBMQQIUpIok+JriVPPWFBrunH1BTtw7/aeSOy57cGu/bmr5ClpoWfUOndhEJ7RGk9+Rs6qQsK4nx3QOLG0TezoLIoq01eO1vqbmFunRMy+cVHbgi0nrO4kmpsgG0qgSIIV24mQ6mwAnPpy0KOPOUu/Oq50w2qGXl+Cn0Ow00gaVQmQN15LESo3TDF1ArO5FyIceKK3SpQLtXbWLfgLPtQqrDl+qxnamjmxTXPzSloRTN9P/B6Pjq0qskM+QA4NOD/8LBkpA+xQqwqtRwmqELwXtCtOXOLVl6h9GatHRppGLTIXyGQyI0G7v9gT8+WsqbBC+VGshX1kZVu/2PAwNi4wZUjXsdDLPkLRhijy9qIYz2ABCu7OD+DUJy8CXgmr0p+j67UpiGyKGtCedfXPGRaRzCeZbxF9ZhF5gaPVITOZaQv9UklaRSGcAxmuNBQhNgID/dBL8Y4kIrz5L8B6whBt2mRfO0WtpMyuuOJ+RXb+IxE+650CGjvH+7cX13diH7bAs7YYqYyajtGs3wP7z10xhBFcapirkLM2Y8y/cGFZz6WhxooyJGTSrZmfGqMVMnoHhjk4YphnbNnyhX6EAdqS6v9rWjDEmKle1s6KibQTC52GWGNI0CSTQpSvCqxaMxrXAJ0ok1ehBUM5RyPzMBeELYC74O3f9x+eEShxSbSDwg1qIX5OwCq40/EBrCybv9Nutf/n4Qs943uVehjMhR9A7XY+tg95W5R/K9Qcq9uP9q7nwAbp9rKFid15+JGK6Ujn14Y7GyO0EkLjd9bIa7kC9q/3gwPbR5rYR6wysSh+ceZmd5Adpof8AqaiJ3vkDUlz1J5DtRwjy+v+192B4JLpK+GQ6PBomg71PKFTf/XyDwVAQoMUnFwZ9lgIA"
                                                                        alt="Sipping" data-pagespeed-url-hash="386161918"
                                                                        onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                                                                        id="pagespeed_img_d4LfyxLoJt3">
                                                                    <p>Standerd Shipping</p>
                                                                    <span class="price">$10.50</span>
                                                                </label>
                                                            </div>
                                                            <div class="single-payment-option">
                                                                <input type="radio" name="shipping" id="shipping-4">
                                                                <label for="shipping-4">
                                                                    <img src="data:image/webp;base64,UklGRuoDAABXRUJQVlA4TN0DAAAvO8AHADXRzf9/nRS1hbu7uztE7u7uTuTu7u6wvti6u/vo6n/+u89/GsBCSymBEDZFCyAkIyPcHpACyCZCUlKizaGA6WJD3J10Y+Du4qvBXTuYNj4hBZykdxVcBfY9S5H4rKmfA0mSFDWc5y64u7MgUZJk07ZyPvzatm3btu17n23br/8TEARPj+5qyT/BfrECJV51adT+pomyd0okzj7qvQuMz21KBP/ime47W5S9ViL4Vk+dplsc8uinOHsXkL+RJl+FIo9+BUb/eCAw+g/4lS+tNuMGrwK9d57Nes6vfBoY/RVKkP8mx7aV11qn2Z48/qkA4uyz6aGHdD6ZDvPVwOg3hGyzntUKqTqf9DV7OTzbG+2QQYaPEnH2AQIPKF6aHju0QtLyW/l+AJ7traW/RDJ8FEmTLxC+KH9/1nI7Lo//4ZzWL410vlnnoKwrrzVELpMDcEuQokiORqPRCMCzuyIyeJaC24n0ojqKDEVkZGRkTupgT7j8qComwM/k1EXkOFtT4EgcysGD5aIB9ckPK4w/4XEhjugCr0D/tUIKUUDxkk8gY0UbcbwqTYQ1eIe1BUAp2BKwQNSjEu24DHjTiVrUYBQBxO4oLDbwEafviWg9HxksJQUpLeKSGhFc7WHT6QtLRg5YRuzwIbd4VpxisFbE7khDXvzKF/aLZfPd0Mprw4pbldG51Xo96Tzd/Ro+9X0iksU/+TUE6A+bLjg8yQ6bJqKz4g5mwWozW7C/AAtiY3fchyh75zhfv2tybDc6N5sce2xWk27DiTT5Bp/6ARG5jEfhmgebjKFg0flEXrGNlect1g8A6lSsjooqQBNGognD9xgRaYVkt+E8QtJz40ZVeiHiDNsHIDdJgBHNKE1SWBnCE+SfdkgjIt1PlldzKyI2IKwZ8akJ4EFc8QYOAlJKiShndnSGF0xO3UTm+8FAfxBxgVSANWc837FJaLHt/E/DScdHvkTl5n9e3s09Iv1XUWD0i2u7uoZQqVsD6KKejQnqnnDAlaMJYNGDwd+NxffstxLCXKAbz1IIXjA6txA5Tbe58GorXqmAQF6p8ErFBZyy5CAAbP7KARWAD99U4Fc+s1lNW21HYyDKP+i980n7mxGQv+ISsk99f+WlnozOrS8AeDcPHpPBs3iLwGJs1tOk8810nuyC07d6rPfOI/1XoX/5SlCS9JvRucnk2OHen62Hwh8sdkO09JfwmTz+I6D1P4LnI+CB3XJp+a1C+5tutRnz7G5k8Q+h8D7gPN1H2EOy+Lsk/RIjPJ/6oVZIEmXvOJRSlL95bnbog9I+OnH6gfK4jofkNpxC6AA="
                                                                        alt="Sipping" data-pagespeed-url-hash="680661839"
                                                                        onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                                                                        id="pagespeed_img_HjyIffBlCX4">
                                                                    <p>Standerd Shipping</p>
                                                                    <span class="price">$10.50</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            <div class="col-md-12">
                                                <div class="steps-form-btn button">
                                                    <button type="submit" class="btn btn-alt">Pay Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-coupon">
                            <p>Appy Coupon to get discount!</p>
                            <form action="https://demo.graygrids.com/themes/shopgrids/checkout.html#">
                                <div class="single-form form-default">
                                    <div class="form-input form">
                                        <input type="text" placeholder="Coupon Code">
                                    </div>
                                    <div class="button">
                                        <button class="btn">apply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="checkout-sidebar-price-table mt-30">
                            <h5 class="title">Pricing Table</h5>
                            <div class="sub-total-price">
                                <div class="total-price">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price">{{ Currency::format($cart->total()) }}</p>
                                </div>
                                <div class="total-price shipping">
                                    <p class="value">Shipping:</p>
                                    <p class="price">Free</p>
                                </div>
                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price">{{ Currency::format($cart->total()) }}</p>
                                </div>
                            </div>
                            {{-- <div class="price-table-btn button">
                                <a href="javascript:void(0)" class="btn btn-alt">Checkout</a>
                            </div> --}}
                        </div>
                        {{-- <div class="checkout-sidebar-banner mt-30">
                            <a href="https://demo.graygrids.com/themes/shopgrids/product-grids.html">
                                <img src="./Checkout - ShopGrids Bootstrap 5 eCommerce HTML Template._files/xbanner.jpg.pagespeed.ic.LvXPDH29uT.webp"
                                    alt="#" data-pagespeed-url-hash="3287776380"
                                    onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-front-layout>

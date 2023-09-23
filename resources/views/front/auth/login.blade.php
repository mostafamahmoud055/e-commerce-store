<x-front-layout>
    <x-slot name="breadcrumb">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">{{ request()->is('admin/*') ? 'Admin' : 'Login' }}</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="https://demo.graygrids.com/themes/shopgrids/index.html"><i
                                        class="lni lni-home"></i>
                                    Home</a>
                            </li>
                            <li>{{ request()->is('admin/*') ? 'Admin' : '' }} Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <form class="card login-form" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="title">
                                <h3>{{ request()->is('admin/*') ? 'Admin Login' : ' Login Now' }}</h3>
                            </div>
                            @if (!request()->is('admin/*') )
                            <div class="social-login">
                                <div class="row justify-content-evenly">
                                    <div class="col-lg-4 col-md-4 col-12"><a class="btn facebook-btn" href="{{ route('auth.socialite.redirect','facebook') }}"><i class="lni lni-facebook-filled"></i> Facebook
                                            login</a></div>
                                    {{-- <div class="col-lg-4 col-md-4 col-12"><a class="btn twitter-btn" href="javascript:void(0)"><i class="lni lni-twitter-original"></i> Twitter
                                            login</a></div> --}}
                                    <div class="col-lg-4 col-md-4 col-12"><a class="btn google-btn" href="{{ route('auth.socialite.redirect','google') }}"><i class="lni lni-google"></i> Google login</a>
                                    </div>
                                </div>
                            </div>
                            <div class="alt-option">
                                <span>Or</span>
                            </div>
                            @endif
                            <div class="form-group input-group">
                                <label
                                    for="reg-fn">{{ request()->is('admin/*') ? 'Email' : ' Email or mobile' }}</label>
                                <input class="form-control" name="{{ config('fortify.username') }}" id="reg-email"
                                    required="">
                            </div>
                            <div class="form-group input-group">
                                <label for="reg-fn">Password</label>
                                <input class="form-control" type="password" name="password" id="reg-pass"
                                    required="">
                            </div>
                            @error(config('fortify.username'))
                                <div class="text-danger">
                                    {{ ucfirst(config('fortify.username')) . ' ' . 'are Password is Incorrect' }}
                                </div>
                            @enderror
                            <div class="d-flex flex-wrap justify-content-between bottom-content">
                                @if (!request()->is('admin/*'))
                                    <div class="form-check">
                                        <input type="checkbox" name="remember" class="form-check-input width-auto"
                                            id="exampleCheck1">
                                        <label class="form-check-label">Remember me</label>
                                    </div>
                                @endif
                                @if (Route::has('password.request'))
                                    <a class="lost-pass" href="{{ route('password.request') }}">Forgot
                                        password?</a>
                                @endif
                            </div>
                            <div class="button">
                                <button class="btn" type="submit">Login</button>
                            </div>
                            @if (!request()->is('admin/*'))
                                <p class="outer-link">Don't have an account? <a href="{{ route('register') }}">Register
                                        here
                                    </a>
                                </p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </x-front.layouts>

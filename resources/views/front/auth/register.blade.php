<x-front-layout>
    <x-slot name="breadcrumb">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">Login</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="https://demo.graygrids.com/themes/shopgrids/index.html"><i
                                        class="lni lni-home"></i>
                                    Home</a>
                            </li>
                            <li>Register</li>
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
                    <form class="card register-form" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="title">
                                <h3>Register Now</h3>
                            </div>
                            {{-- <div class="social-login">
                                <div class="row">
                                    <div class="col-12"><a class="btn facebook-btn"
                                            href="javascript:void(0)"><i class="lni lni-facebook-filled"></i> Facebook
                                            login</a></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12"><a class="btn google-btn"
                                            href="javascript:void(0)"><i class="lni lni-google"></i> Google login</a>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="form-group input-group">
                                <label for="reg-fn">Fisrt name</label>
                                <input class="form-control" name="first_name" value="{{old('first_name')}}">
                                @error('first_name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group input-group">
                                <label for="reg-fn">Last name</label>
                                <input class="form-control" name="last_name" value="{{old('last_name')}}">
                                @error('last_name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            <div class="form-group input-group">
                                <label for="reg-fn">Email</label>
                                <input class="form-control" name="email" value="{{old('email')}}">
                                @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            <div class="form-group input-group">
                                <label for="reg-fn">Phone Number</label>
                                <input class="form-control" name="phone_number" value="{{old('phone_number')}}">
                                @error('phone_number')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            <div class="form-group input-group">
                                <label for="reg-fn">Password</label>
                                <input class="form-control" type="password" name="password">
                                @error('password')
                                <div class="text-danger">
                                    {!! $message !!}
                                </div>
                            @enderror
                            </div>
                            <div class="form-group input-group">
                                <label for="reg-fn">Confirm Password</label>
                                <input class="form-control" type="password" name="password_confirmation">
                            </div>
                            <div class="d-flex flex-wrap justify-content-between bottom-content">
                                @if (Route::has('password.request'))
                                    <a class="lost-pass" href="{{ route('password.request') }}">Forgot
                                        password?</a>
                            </div>
                            @endif
                            <div class="button">
                                <button class="btn" type="submit">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </x-front.layouts>

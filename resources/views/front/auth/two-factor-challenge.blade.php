<x-front-layout>
    <x-slot name="breadcrumb">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">2FA Challenge</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="https://demo.graygrids.com/themes/shopgrids/index.html"><i
                                        class="lni lni-home"></i>
                                    Home</a>
                            </li>
                            <li>2FA Challenge</li>
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
                    <form class="card login-form" method="post" action="{{ route('two-factor.login') }}">
                        @csrf
                        <div class="card-body">
                            <div class="title">
                                <h3>2FA Challenge</h3>
                                <p>You Must Enter 2FA Code</p>
                            </div>
                            <div class="form-group input-group">
                                <label for="reg-fn">2FA Code</label>
                                <input class="form-control" name="code" id="reg-email" required="">
                            </div>
                            @error('code')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="button">
                            <button class="btn" type="submit">Submit</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </x-front.layouts>

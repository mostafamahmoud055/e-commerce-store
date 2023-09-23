<x-front-layout>
    <x-slot name="breadcrumb">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">Twor Factor Authentication</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="https://demo.graygrids.com/themes/shopgrids/index.html"><i
                                        class="lni lni-home"></i>
                                    Home</a>
                            </li>
                            <li>Twor Factor</li>
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
                    <form class="card login-form" method="post" action="{{ route('two-factor.enable') }}">
                        @csrf
                        <div class="card-body text-center">
                            <div class="title">
                                <h3>Twor Factor Authentication</h3>
                                <p>You can enable/disable 2FA.</p>
                            </div>
                            @if (session('status') == 'two-factor-authentication-enabled')
                                <div class="mb-4 font-medium text-sm">
                                    Please finish configuring two factor authentication below.
                                </div>
                            @endif
                            <div class="button">
                                @if (!Auth::user()->two_factor_secret)
                                    <button class="btn" type="submit">Enable</button>
                                @else
                                    <div class="p-4">
                                        {!! Auth::user()->twoFactorQrCodeSvg() !!}
                                    </div>
                                    <h3>Recovery Codes</h3>
                                    <ul class="mb-3">
                                        @foreach (Auth::user()->recoveryCodes() as $code)
                                            <li>{{ $code }}</li>
                                        @endforeach
                                    </ul>

                                    @method('delete')
                                    <button class="btn mt-3" type="submit">Disable</button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </x-front.layouts>

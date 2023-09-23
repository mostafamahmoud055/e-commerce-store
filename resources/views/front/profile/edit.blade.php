<x-front-layout title="Profile">
    <x-slot name="breadcrumb">

        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">Profile</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{ route('home') }}"><i class="lni lni-home"></i>
                                    Home</a>
                            </li>
                            <li><a href="">profile</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <x-alert type="success" class="mb-3" />
                    <form action="{{ route('user-profile-information.update') }}" method="post">
                        @csrf
                        @method('put')
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
                                                            <x-form.input name="first_name"
                                                                value="{{ Auth::user()->first_name }}"
                                                                label="First Name" />
                                                        </div>
                                                        <div class="col-md-6 form-input form">
                                                            <x-form.input name="last_name" label="Last Name"
                                                                value="{{ Auth::user()->last_name }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">

                                                    <div class="form-input form">
                                                        <x-form.input name="email" label="Email Adderss"
                                                            value="{{ Auth::user()->email }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">

                                                    <div class="form-input form">
                                                        <x-form.input name="phone_number" label="Phone Number"
                                                            value="{{ Auth::user()->phone_number }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">

                                                    <div class="form-input form">
                                                        <x-form.input name="street" label="Street" :value="$profile->street ?? ''" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">

                                                    <div class="form-input form">
                                                        <x-form.input name="city" label="City" :value="$profile->city ?? ''" />
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-6 d-none">
                                                <div class="single-form form-default">

                                                    <div class=" form-input form">
                                                        <x-form.select name="country" :options="$countries"
                                                            label="Country" selected="EG" />
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="col-md-6">
                                                <div class="single-form form-default">

                                                    <div class="form-input form">
                                                        <x-form.input name="building" label="Building"
                                                            :value="$profile->building ?? ''" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">

                                                    <div class="form-input form">
                                                        <x-form.input name="floor" label="Floor" :value="$profile->floor ?? ''" />
                                                    </div>
                                                    <div class="form-input form">
                                                        <x-form.select name="country" label="Country" :options="$countries"
                                                            :selected="$profile->country ?? ''" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <div class="form-input form">
                                                        <x-form.input name="apartment" label="Apartment"
                                                            :value="$profile->apartment ?? ''" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="steps-form-btn button">
                                                    <button type="submit" class="btn btn-alt">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-front-layout>

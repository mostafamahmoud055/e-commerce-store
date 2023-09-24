<x-front-layout title="Order Details">
    <x-slot name="breadcrumb">

        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">Order #{{ $order->number }}</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{ route('home') }}"><i class="lni lni-home"></i>
                                    Home</a>
                            </li>
                            <li><a href="">Orders</a></li>
                            <li>Order #{{ $order->number }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <section class="checkout-wrapper section">
        <div class="container">
            <div style="height: 50vh;width: 100%" id="map"></div>
        </div>
    </section>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap"
        defer></script>
    <script>
        function initMap() {
            const location = {
                lat: -34.397,
                lng: 150.644
            }
            const map = new google.maps.Map(document.getElementById("map"), {
                center: location,
                zoom: 15,
            });
            const marker = new google.maps.Marker({
                position: location,
                map: map,
            });
        }

        window.initMap = initMap;
    </script>

</x-front-layout>

<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@section('backend-head')
    <style>
        [type=radio] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* IMAGE STYLES */
        [type=radio] + img {
            cursor: pointer;
            padding: 20px;
        }

        /* CHECKED STYLES */
        [type=radio]:checked + img {
            outline: 3px solid #354db9;
            outline-style: dashed;
        }
    </style>
@endsection
@if($lang == 'ar')
    @section('pageTitle', 'الدفع')
@else
    @section('pageTitle', 'Payment')
@endif
@section('frontend-main')
    <section class="page-head">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline">
                        <li>
                            <a href="/">@lang('frontend.home')</a>
                        </li>
                        <li>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="{{ route('cart') }}">@lang('frontend.cart')
                            </a>
                        </li>
                        <li>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="{{ route('checkout') }}">@lang('frontend.checkout')
                            </a>
                        </li>
                        <li>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a style="color: #c41230">@lang('frontend.buying')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="payment-page">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="pay-add">
                        <h4>{{ $dafaultAdress->city }} - {{ $dafaultAdress->district }} - {{ $dafaultAdress->street }}...</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-total text-left">
                        <h4>
                            @lang('frontend.total'):
                            <a>{{ $my_total }}</a>
                            {{ $currentLanguage['name_'.$lang] }}
                        </h4>
                    </div>
                </div>

                <div class="col-md-12">


                    <div class="tab-content">
                        <div style="border: none" class="cart-info22 profile-box">
                            <h4 style="color: white">@lang('frontend.Chose')</h4>
                            <div class="cart-info222">
                                <div class="payf text-center">
                                    <form action="{{ route('payMethod') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="col-xs-6">
                                            <div class="form-check">
                                                <label>
                                                    <input class="form-check-input" type="radio" name="payMethod" value="0" checked>
                                                    <img src="{{ asset('frontend/imgs/p1.jpg') }}" alt="img"/>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-check">
                                                <label>
                                                    <input class="form-check-input" type="radio" name="payMethod" value="1">
                                                    <img src="{{ asset('frontend/imgs/bank.png') }}" alt="img"/>
                                                </label>
                                            </div>
                                        </div>
                                        <button style="width: 100%;border-radius: 0 ;margin-top: 20px" type="submit" class="btn btn-primary">@lang('frontend.pay')</button>
                                        <div class="clearfix"></div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('frontend-footer')
    <script>
        function init() {
            var map = new google.maps.Map(document.getElementById('map-canvas'), {
                center: {
                    lat: 24.774265,
                    lng: 46.738586
                },
                zoom: 12
            });
            var searchBox = new google.maps.places.SearchBox(document.getElementById('pac-input'));
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(document.getElementById('pac-input'));
            google.maps.event.addListener(searchBox, 'places_changed', function () {
                searchBox.set('map', null);

                var places = searchBox.getPlaces();
                var bounds = new google.maps.LatLngBounds();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function (place) {
                        var marker = new google.maps.Marker({
                            position: place.geometry.location,
                            draggable: true
                        });
                        var lat = marker.getPosition().lat();
                        var lng = marker.getPosition().lng();
                        $('#lat').val(lat);
                        $('#lng').val(lng);
                        google.maps.event.addListener(marker, 'position_changed', function () {
                            var lat = marker.getPosition().lat();
                            var lng = marker.getPosition().lng();
                            $('#lat').val(lat);
                            $('#lng').val(lng);
                        });
                        marker.bindTo('map', searchBox, 'map');
                        google.maps.event.addListener(marker, 'map_changed', function () {
                            if (!this.getMap()) {
                                this.unbindAll();
                            }
                        });
                        bounds.extend(place.geometry.location);
                    }(place));
                }
                map.fitBounds(bounds);
                searchBox.set('map', map);
                map.setZoom(Math.min(map.getZoom(), 12));
            });
        }

        google.maps.event.addDomListener(window, 'load', init);
    </script>
@endsection
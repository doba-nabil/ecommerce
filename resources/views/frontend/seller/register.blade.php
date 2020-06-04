<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')

@section('pageTitle', 'تسجيل متجر جديد')
@section('frontend-main')

    <section class="re-password login-page">
        <img src="{{ asset() }}" alt="img"/>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="re-password-con login-con login-register">
                        <div class="login-title text-center">
                            <h4>تسجيل العضوية</h4>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="login1 text-center">
                                <a href="#">هل لديك حساب من قبل ؟تسجيل الدخول هنا</a>
                                <h5>أو تسجيل الدخول عبر</h5>
                                <div class="login1-l">
                                    <h4>
                                        <a href="#">
                                            <i class="fa fa-facebook"></i>
                                            تسجيل الدخول عبر الفيس بوك
                                        </a>
                                    </h4>
                                    <h4>
                                        <a href="#">
                                            <i class="fa fa-google-plus"></i>
                                            تسجيل الدخول عبر جوجل بلس
                                        </a>
                                    </h4>
                                </div>
                                <p>تسجيل دخول عبر حساب التواصل الأجتماعي لتجنب انشاء حساب</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="login2">
                                <form>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">البريد الالكتروني أو رقم الجوال</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">كلمة المرور</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">تأكيد كلمة المرور </label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="exampleCheck1">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            نعم، أرسل لي رسائل البريد الإلكتروني حول العروض الخاصة
                                            والحصرية و الترويجية.</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">بالنقر على زر التسجيل ، فإنك توافق على العضوية</label>
                                    </div>

                                    <button type="submit" class="">تسجيل الدخول</button>
                                    <a href="#">قم بتسجيل الدخول عبر الرسالة النصية</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="banars">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banar1">
                        <a href="{{ $bottomBanner5->url }}"><img
                                    src="{{ asset('pictures/banners/' . $bottomBanner5->picture) }}" alt="img"
                                    style="height: 150px;"/></a>
                        @if (isset($bottomBanner5->price))
                            <div class="banar-con2">
                                <h4>@lang('frontend.enjoy')</h4>
                                <a href="{{ $bottomBanner5->url }}">{{ $bottomBanner5->price }}$</a>
                            </div>
                        @endif
                        <p>{{ $bottomBanner5['title_'.$lang] }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="banar2">
                        <a href="{{ $bottomBanner6->url }}"><img
                                    src="{{ asset('pictures/banners/' . $bottomBanner6->picture) }}" alt="img"
                                    style="height: 250px;"/></a>
                        @if (isset($bottomBanner6->price))
                            <div class="banar-con2">
                                <h4>@lang('frontend.enjoy')</h4>
                                <a href="{{ $bottomBanner6->url }}">{{ $bottomBanner6->price }}$</a>
                            </div>
                        @endif
                        <p>{{ $bottomBanner6['title_'.$lang] }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="banar3">
                        <a href="{{ $bottomBanner7->url }}"><img src="{{ asset('pictures/banners/' . $bottomBanner7->picture) }}" alt="img" style="height: 250px;"/></a>
                        @if (isset($bottomBanner7->price))
                            <div class="banar-con2">
                                <h4>@lang('frontend.enjoy')</h4>
                                <a href="{{ $bottomBanner7->url }}">{{ $bottomBanner7->price }}$</a>
                            </div>
                        @endif
                        <p>{{ $bottomBanner7['title_'.$lang] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <form action="{{ route('storeRegister') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <section class="multi-step-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="wizard">
                            <div class="wizard-inner">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab">
                                            <span class="step-head">@lang('frontend.primary_info')</span>
                                        </a>
                                    </li>
                                    <li role="presentation" class="disabled">
                                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab">
                                            <span class="step-head">@lang('frontend.additional_info')</span>
                                        </a>
                                    </li>
                                    <li role="presentation" class="disabled">
                                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab">
                                            <span class="step-head">@lang('frontend.contact1')</span>
                                        </a>
                                    </li>
                                    <li role="presentation" class="disabled">
                                        <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab">
                                            <span class="step-head">@lang('frontend.payment_info')</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-horizontal">
                                <div class="tab-content">
                                    <div class="tab-pane active" role="tabpanel" id="step1">
                                        <div class="form-group">
                                            <label for="name_ar" class="control-label col-md-2 col-md-offset-1">@lang('frontend.name_ar')</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" required name="name_ar" id="name_ar" value="{{ old('name_ar') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name_en" class="control-label col-md-2 col-md-offset-1">@lang('frontend.name_en')</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" required name="name_en" id="name_en" value="{{ old('name_en') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="username" class="control-label col-md-2 col-md-offset-1">@lang('frontend.username')</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" id="username" value="{{ Auth::user()->name }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="category_id" class="control-label col-md-2 col-md-offset-1">@lang('frontend.store_category')</label>
                                            <div class="col-md-7">
                                                <select name="category_id" id="category_id" class="select form-control">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category['name_'.$lang] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="package_id" class="control-label col-md-2 col-md-offset-1">@lang('frontend.package')</label>
                                            <div class="col-md-7">
                                                <input type="text" value="{{ $package['name_'.$lang] }}" class="form-control" disabled>
                                                <input type="hidden" name="package_id" id="package_id" value="{{ $packageID }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="country_id" class="control-label col-md-2 col-md-offset-1">@lang('frontend.country')</label>
                                            <div class="col-md-7">
                                                <select name="country_id" id="country_id" class="select form-control">
                                                    <option value="0">@lang('frontend.Chose')</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country['name_'.$lang] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="currency_id" class="control-label col-md-2 col-md-offset-1">@lang('frontend.currency')</label>
                                            <div class="col-md-7">
                                                <select name="currency_id" id="currency_id" class="select form-control">
                                                    @foreach ($currencies as $currency)
                                                        <option value="{{ $currency->id }}">{{ $currency['name_'.$lang] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <ul class="list-inline pull-left">
                                            <li><a class=" next-step">@lang('frontend.move_on')</a></li>
                                        </ul>

                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="step2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @if ($package->map == 1)
                                                    <div class="form-group">
                                                        <label for="pac-input" class="control-label col-md-2">@lang('frontend.location')</label>
                                                        <div class="col-md-9">
                                                            <div id="map-canvas"></div>
                                                            <input id="pac-input" type="text" placeholder="ابحث عن مدينتك">
                                                            <input type="hidden" id="lat" name="lat">
                                                            <input type="hidden" id="lng" name="lng">
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="form-group">
                                                    <label for="description_ar" class="control-label col-md-2 ">@lang('frontend.des_ar')</label>
                                                    <div class="col-md-9">
                                                        <textarea name="description_ar" id="description_ar" cols="30" rows="4" required class="form-control">{{ old('description_ar') }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description_en" class="control-label col-md-2 ">@lang('frontend.des_en')</label>
                                                    <div class="col-md-9">
                                                        <textarea name="description_en" id="description_en" cols="30" rows="4" required class="form-control">{{ old('description_en') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <ul class="list-inline pull-left" style="margin-left: 45px;">
                                                    <li><a class="prev-step">@lang('frontend.previous')</a></li>
                                                    <li><a class=" next-step">@lang('frontend.move_on')</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="step3">
                                        <div class="form-group">
                                            <label for="city_id" class="control-label col-md-2 col-md-offset-1">@lang('frontend.city')</label>
                                            <div class="col-md-7">
                                                <select name="city_id" id="city_id" class="select form-control" style="width: 100%">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="address" class="control-label col-md-2 col-md-offset-1">@lang('frontend.address')</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="address" id="address" required value="{{ old('address') }}">
                                            </div>
                                        </div>
                                        @if ($package->phone == 1 || $package->mobile == 1)
                                            <div class="form-group">
                                                <label for="code" class="control-label col-md-2 col-md-offset-1">@lang('frontend.country_key')</label>
                                                <div class="col-md-7">
                                                    <select name="code" id="code" class="form-control select" style="width: 100%" disabled>

                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($package->phone == 1)
                                            <div class="form-group">
                                                <label for="phone" class="control-label col-md-2 col-md-offset-1">@lang('frontend.phone')</label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="phone" id="phone" required value="{{ old('phone') }}">
                                                </div>
                                            </div>
                                        @endif
                                        @if ($package->mobile == 1)
                                            <div class="form-group">
                                                <label for="inputEmail" class="control-label col-md-2 col-md-offset-1">@lang('frontend.mobile')</label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="mobile" id="mobile" required value="{{ old('mobile') }}">
                                                </div>
                                            </div>
                                        @endif
                                        <ul class="list-inline pull-left" style="margin-left: 45px;">
                                            <li><a class="prev-step">@lang('frontend.previous')</a></li>
                                            <li><a class=" next-step">@lang('frontend.move_on')</a></li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="step4">
                                        <p style="margin-bottom: 25px;"> @lang('frontend.seller_re1') {{ $package->price }} @lang('frontend.seller_re2').</p>
                                        <table class="table table-bordered table-responsive text-center banks">
                                            <tr>
                                                <th>@lang('frontend.bank')</th>
                                                <th>@lang('frontend.owner')</th>
                                                <th>@lang('frontend.account_no')</th>
                                                <th>@lang('frontend.ipan')</th>
                                            </tr>
                                            @foreach ($banks as $bank)
                                                <tr>
                                                    <td>{{ $bank['name_'.$lang] }}</td>
                                                    <td>{{ $bank['owner_'.$lang] }}</td>
                                                    <td>{{ $bank->account }}</td>
                                                    <td>{{ $bank->ipan }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2 col-md-offset-1">
                                                    <label for="name">@lang('frontend.username')</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" disabled class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2 col-md-offset-1">
                                                    <label for="bank_id">@lang('frontend.bank')</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <select name="bank_id" id="bank_id" class="form-control select" style="width: 100%">
                                                        @foreach ($banks as $bank)
                                                            <option value="{{ $bank->id }}">{{ $bank['name_'.$lang] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2 col-md-offset-1">
                                                    <label for="owner_name">@lang('frontend.owner')</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="text" id="owner_name" name="owner_name" required value="{{ old('owner_name') }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2 col-md-offset-1">
                                                    <label for="phone">@lang('frontend.phone')</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="text" id="phone" name="phone" required value="{{ old('phone') }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2 col-md-offset-1">
                                                    <label for="ipan">@lang('frontend.ipan')</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="text" id="ipan" name="ipan" required value="{{ old('ipan') }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2 col-md-offset-1">
                                                    <label for="picture">@lang('frontend.transfer_pic')</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="file" id="picture" name="picture" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2 col-md-offset-1">
                                                    <label for="notes">@lang('frontend.notes')</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <textarea name="notes" id="notes" cols="30" rows="2" class="form-control" >{{ old('notes') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="list-inline pull-left" style="margin-left: 45px;">
                                            <li><a class="prev-step">@lang('frontend.previous')</a></li>
                                            <li><button class="next-step" type="submit"> @lang('frontend.save')</button></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

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
            google.maps.event.addListener(searchBox, 'places_changed', function() {
                searchBox.set('map', null);

                var places = searchBox.getPlaces();
                var bounds = new google.maps.LatLngBounds();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var marker = new google.maps.Marker({
                            position: place.geometry.location,
                            draggable: true
                        });
                        var lat = marker.getPosition().lat();
                        var lng = marker.getPosition().lng();
                        $('#lat').val(lat);
                        $('#lng').val(lng);
                        google.maps.event.addListener(marker, 'position_changed', function(){
                            var lat = marker.getPosition().lat();
                            var lng = marker.getPosition().lng();
                            $('#lat').val(lat);
                            $('#lng').val(lng);
                        });
                        marker.bindTo('map', searchBox, 'map');
                        google.maps.event.addListener(marker, 'map_changed', function() {
                            if (!this.getMap()) {
                                this.unbindAll();
                            }
                        });
                        bounds.extend(place.geometry.location);
                    }(place));
                }
                map.fitBounds(bounds);
                searchBox.set('map', map);
                map.setZoom(Math.min(map.getZoom(),12));
            });
        }
        google.maps.event.addDomListener(window, 'load', init);
    </script>
    <script>
        $(document).ready(function () {
            var base_url = $('#base-url').val();
            var current_url = document.URL.substring(base_url.length);
            $('#country_id').on('change',function(e){
                console.log(e);
                var country_id = e.target.value;
                $.get(base_url + '/ajax-cities?country_id='+ country_id,function(data){
                    $('#city_id').empty();
                    $.each(data,function(index, subcatObj){
                        $('#city_id').append('<option value="'+subcatObj.id+'">'+subcatObj.name_ar+'</option>');
                    });
                });
            });

            $('#country_id').on('change',function(e){
                console.log(e);
                var country_id = e.target.value;
                $.get(base_url + '/ajax-code?country_id='+ country_id,function(data){
                    $('#code').empty();
                    $.each(data,function(index, subcatObj){
                        $('#code').append('<option value="'+subcatObj.id+'">'+subcatObj.code+'</option>');
                    });
                });
            });
        });
    </script>
@endsection
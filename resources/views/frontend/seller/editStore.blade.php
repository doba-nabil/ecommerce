<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@if($lang == 'ar')
    @section('pageTitle', 'تعديل بيانات متجري')
@else
    @section('pageTitle', 'Edit my Store')
@endif

@section('frontend-main')
    <section style="margin: 70px 0">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="profile-box">
                        <div class="panel-heading profile-box">
                            <h4 class="panel-title">@lang('frontend.my_store_edit')</h4>
                        </div>
                        <div class="panel-body">
                            @include('common.done')
                            @include('common.errors')
                            <form action="{{ route('storeEditSave') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="name_ar">@lang('frontend.name_ar')</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="name_ar" id="name_ar" value="{{ $store->name_ar }}" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="name_en">@lang('frontend.name_en')</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="name_en" id="name_en" value="{{ $store->name_en }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="description_ar">@lang('frontend.des_ar')</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="description_ar" id="description_ar" cols="30" rows="5" class="form-control">{{ $store->description_ar }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="description_en">@lang('frontend.des_en')</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="description_en" id="description_en" cols="30" rows="5" class="form-control">{{ $store->description_en }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="category_id">@lang('frontend.store_category')</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="category_id" id="category_id" class="form-control select">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        @if ($category->id == $store->category_id)
                                                            selected
                                                        @endif
                                                    >{{ $category['name_'.$lang] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="currency_id">@lang('frontend.currency')</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="currency_id" id="currency_id" class="form-control select">
                                                @foreach ($currencies as $currency)
                                                    <option value="{{ $currency->id }}"
                                                        @if ($currency->id == $store->currency_id)
                                                            selected
                                                        @endif
                                                    >{{ $currency['name_'.$lang] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="country_id">@lang('frontend.country')</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="country_id" id="country_id" class="form-control select">
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}"
                                                        @if ($country->id == $store->country_id)
                                                            selected
                                                        @endif
                                                    >{{ $country['name_'.$lang] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="city_id">@lang('frontend.city')</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="city_id" id="city_id" class="form-control select">
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}"
                                                        @if ($city->id == $store->city_id)
                                                            selected
                                                        @endif
                                                    >{{ $city['name_'.$lang] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="address">@lang('frontend.address')</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="address" id="address" value="{{ $store->address }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                @if ($store->package->phone == 1)
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="phone">@lang('frontend.phone')</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" name="phone" id="phone" value="{{ $store->phone }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($store->package->mobile == 1)
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="mobile">@lang('frontend.mobile')</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" name="mobile" id="mobile" value="{{ $store->mobile }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($store->package->email == 1)
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="email">@lang('frontend.email')</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" name="email" id="email" value="{{ $store->email }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($store->package->website == 1)
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="website">@lang('frontend.website')</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" name="website" id="website" value="{{ $store->website }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($store->package->social == 1)
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="facebook">@lang('frontend.facebook')</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" name="facebook" id="facebook" value="{{ $store->facebook }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="twitter">@lang('frontend.twitter')</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" name="twitter" id="twitter" value="{{ $store->twitter }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="youtube">@lang('frontend.youtube')</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" name="youtube" id="youtube" value="{{ $store->youtube }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="google">@lang('frontend.google')</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" name="google" id="google" value="{{ $store->google }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="instagram">@lang('frontend.instagram')</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" name="instagram" id="instagram" value="{{ $store->instagram }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($store->package->days_work == 1)
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="days_work">@lang('frontend.store_days')</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="number" name="days_work" id="days_work" value="{{ $store->days_work }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($store->package->hours_work == 1)
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="hours_work">@lang('frontend.store_hours')</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="number" name="hours_work" id="hours_work" value="{{ $store->hours_work }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($store->package->stuff_namber == 1)
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="stuff_namber">@lang('frontend.store_stuff')</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="number" name="stuff_namber" id="stuff_namber" value="{{ $store->stuff_namber }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($store->package->map == 1)
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="map">@lang('frontend.location')</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div id="map-canvas"></div>
                                                <input type="hidden" id="lat" name="lat" value="{{ $store->lat }}">
                                                <input type="hidden" id="lng" name="lng" value="{{ $store->lng }}">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($store->package->photos == 1)
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="images">@lang('frontend.store_album')</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="file" name="images[]" id="images" multiple>
                                            </div>
                                        </div>
                                    </div>
                                    @if (count($store->images) > 0)
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                @foreach ($store->images as $image)
                                                    <div class="col-md-3">
                                                        <div class="image-preview">
                                                            <img src="{{ asset('pictures/stores/' . $image->path) }}" alt="{{ $store->name_ar }}">
                                                            <a href="{{ route('StoreDeleteImg', $image->id) }}" class="btn btn-danger btn-block">ازالة</a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endif
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input style="border-radius: 0;width: 100%" type="submit" class="form-control btn btn-primary" value="@lang('frontend.update')">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('frontend-footer')
    <script>
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
            center: {
                lat: {{ $store->lat }},
                lng: {{ $store->lng }}
            },
            zoom: 15
        });
        var marker = new google.maps.Marker({
            map: map,
            position: {
                lat: {{ $store->lat }},
                lng: {{ $store->lng }}
            },
            draggable: true
        });
        google.maps.event.addListener(marker, 'position_changed', function(){
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();
            $('#lat').val(lat);
            $('#lng').val(lng);
        });
    </script>
@endsection
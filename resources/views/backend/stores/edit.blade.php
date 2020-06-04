@extends('backend.layout.master')
@section('backend-head')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpJvvKOEwbrtgfuV3EHwvkyjmly49LHLY&libraries=places"></script>
@endsection
@section('backend-main')
    <section class="backend">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">تعديل بيانات المتجر "{{ $store->name_ar }}"</h3>
                    </div>
                    <div class="panel-body">
                        @include('common.done')
                        @include('common.errors')
                        <form action="{{ route('stores.update', $store->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="owner">صاحب المتجر</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="owner" id="owner" class="form-control" value="{{ $store->user->name }}" disabled readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{ route('users.edit', $store->user->id) }}" style="display: inline-block; margin-top: 5px">تعديل بيانات صاحب المتجر</a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="name_ar">اسم المتجر العربية</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="name_ar" id="name_ar" class="form-control" value="{{ $store->name_ar }}" required >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="name_en">الاسم بالانجليزية</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="name_en" id="name_en" class="form-control" value="{{ $store->name_en }}" placeholder="اسم المتجر باللغة الانجليزية">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="package_id">الباقة</label>
                                    </div>
                                    <div class="col-md-10">
                                        <select name="package_id" id="package_id" class="form-control select">
                                            @foreach ($packages as $package)
                                                <option value="{{ $package->id }}"
                                                    @if ($package->id == $store->package_id)
                                                        selected
                                                    @endif
                                                >{{ $package->name_ar }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="category_id">الفئة</label>
                                    </div>
                                    <div class="col-md-10">
                                        <select name="category_id" id="category_id" class="form-control select">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    @if ($category->id == $store->category_id)
                                                        selected
                                                    @endif
                                                >{{ $category->name_ar }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="currency_id">العملة</label>
                                    </div>
                                    <div class="col-md-10">
                                        <select name="currency_id" id="currency_id" class="form-control select">
                                            @foreach ($currencies as $currency)
                                                <option value="{{ $currency->id }}"
                                                    @if ($currency->id == $store->currency_id)
                                                        selected
                                                    @endif
                                                >{{ $currency->name_ar }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="commission">العمولة</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="commission" id="commission" class="form-control" value="{{ $store->commission }}" placeholder="عمولة المتجر">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="country_id">الدولة</label>
                                    </div>
                                    <div class="col-md-10">
                                        <select name="country_id" id="country_id" class="form-control select">
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}"
                                                    @if ($country->id == $store->country_id)
                                                        selected
                                                    @endif
                                                >{{ $country->name_ar }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="city_id">المدينة</label>
                                    </div>
                                    <div class="col-md-10">
                                        <select name="city_id" id="city_id" class="form-control select">
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}"
                                                    @if ($city->id == $store->city_id)
                                                        selected
                                                    @endif
                                                >{{ $city->name_ar }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="address">العنوان</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="address" id="address" class="form-control" value="{{ $store->address }}" placeholder="عنوان المتجر">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="phone">رقم الهاتف</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="phone" id="phone" class="form-control" value="{{ $store->phone }}" placeholder="رقم الهاتف الثابت الخاص بالمتجر">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="mobile">رقم الجوال</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="mobile" id="mobile" class="form-control" value="{{ $store->mobile }}" placeholder="رقم الجوال الخاص بالمتجر">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="email">البريد الالكتروني</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="email" id="email" class="form-control" value="{{ $store->email }}" placeholder="البريد الالكتروني الخاص بالمتجر">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="facebook">صفحة الفيسبوك</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="facebook" id="facebook" class="form-control" value="{{ $store->facebook }}" placeholder="رابط صفحة الفيسبوك الخاصة بالمتجر">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="twitter">حساب تويتر</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="twitter" id="twitter" class="form-control" value="{{ $store->twitter }}" placeholder="رابط حساب تويتر الخاص بالمتجر">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="youtube">قناة اليوتيوب</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="youtube" id="youtube" class="form-control" value="{{ $store->youtube }}" placeholder="رابط قناة اليوتيوب الخاصة بالمتجر">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="google">حساب جوجل</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="google" id="google" class="form-control" value="{{ $store->google }}" placeholder="رابط حساب جوجل الخاص بالموقع">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="instagram">انستاجرام</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="instagram" id="instagram" class="form-control" value="{{ $store->instagram }}" placeholder="رابط حساب انستاجرام الخاص بالموقع">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="website">الموقع الالكتروني</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="website" id="website" class="form-control" value="{{ $store->website }}" placeholder="رابط الموقع الالكتروني الخاص بالمتجر">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="description_ar">الوصف بالعربية</label>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea name="description_ar" id="description_ar" rows="6" class="form-control">{{ $store->description_ar }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="description_en">الوصف بالانجليزية</label>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea name="description_en" id="description_en" rows="6" class="form-control">{{ $store->description_en }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="map-canvas">الموقع على الخريطة</label>
                                    </div>
                                    <div class="col-md-10">
                                        <div id="map-canvas"></div>
                                        <input type="hidden" id="lat" name="lat" value="{{ $store->lat }}">
                                        <input type="hidden" id="lng" name="lng" value="{{ $store->lng }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="picture">الصورة الشخصية</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="file" name="picture" id="picture">
                                    </div>
                                </div>
                            </div>
                            @if (isset($store->user->picture))
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-2">
                                            <div class="image-preview">
                                                <img src="{{ asset('pictures/avatars/' . $store->user->picture) }}" alt="{{ $store->name_ar }}">
                                                <a href="{{ route('deleteUserImg', $store->user->id) }}" class="btn btn-danger btn-block">ازالة</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group" @if (isset($store->user->picture)) style="margin-top: 60px;" @endif>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2">
                                        <input value="1" type="checkbox" name="status" @if ($store->status == 1) checked @endif><label style="margin-right: 5px;">مفعل</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input value="1" type="checkbox" name="nice" @if ($store->nice == 1) checked @endif><label style="margin-right: 5px;">متجر مميز</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2">
                                        <input type="submit" value="تحديث" class="form-control btn btn-success">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('backend-footer')
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
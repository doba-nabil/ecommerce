@extends('backend.layout.master')
@section('backend-main')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">تعديل بيانات الباقة "{{ $package->name_ar }}"</div>
                <div class="panel-body">
                    @include('common.done')
                    @include('common.errors')
                    <form method="post" action="{{ route('packages.update', $package->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name_ar">الاسم بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ $package->name_ar }}" required placeholder="اسم الباقة باللغة العربية">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name_en">الاسم بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name_en" name="name_en" value="{{ $package->name_en }}" required placeholder="اسم الباقة باللغة الانجليزية">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="price">سعر الباقة</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="price" name="price" value="{{ $package->price }}" required placeholder="سعر الباقة بالريال السعودي">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="days">مدة الاشتراك</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="days" name="days" value="{{ $package->days }}" placeholder="مدة الاشتراك بالأيام" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="products_namber">عدد المنتجات</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="products_namber" name="products_namber" value="{{ $package->products_namber }}" placeholder="الحد الأقصى للمنتجات الممكن اضافتها" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="map">الظهور على الخريطة</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="map" id="map" class="form-control select">
                                        <option value="0" @if ($package->map == 0) selected @endif>لا</option>
                                        <option value="1" @if ($package->map == 1) selected @endif>نعم</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="photos">السماح بألبوم صور</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="photos" id="photos" class="form-control select">
                                        <option value="0" @if ($package->photos == 0) selected @endif>لا</option>
                                        <option value="1" @if ($package->photos == 1) selected @endif>نعم</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="comments">السماح بالتعليقات</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="comments" id="comments" class="form-control select">
                                        <option value="0" @if ($package->comments == 0) selected @endif>لا</option>
                                        <option value="1" @if ($package->comments == 1) selected @endif>نعم</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="reviews">سجل الزوار</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="reviews" id="reviews" class="form-control select">
                                        <option value="0" @if ($package->reviews == 0) selected @endif>لا</option>
                                        <option value="1" @if ($package->reviews == 1) selected @endif>نعم</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="phone">رقم هاتف</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="phone" id="phone" class="form-control select">
                                        <option value="0" @if ($package->phone == 0) selected @endif>لا</option>
                                        <option value="1" @if ($package->phone == 1) selected @endif>نعم</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="mobile">رقم جوال</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="mobile" id="mobile" class="form-control select">
                                        <option value="0" @if ($package->mobile == 0) selected @endif>لا</option>
                                        <option value="1" @if ($package->mobile == 1) selected @endif>نعم</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="email">بريد الكتروني</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="email" id="email" class="form-control select">
                                        <option value="0" @if ($package->email == 0) selected @endif>لا</option>
                                        <option value="1" @if ($package->email == 1) selected @endif>نعم</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="website">موقع الكتروني</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="website" id="website" class="form-control select">
                                        <option value="0" @if ($package->website == 0) selected @endif>لا</option>
                                        <option value="1" @if ($package->website == 1) selected @endif>نعم</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="social">التواصل الاجتماعي</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="social" id="social" class="form-control select">
                                        <option value="0" @if ($package->social == 0) selected @endif>لا</option>
                                        <option value="1" @if ($package->social == 1) selected @endif>نعم</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="branches">اضافة فروع</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="branches" id="branches" class="form-control select">
                                        <option value="0" @if ($package->branches == 0) selected @endif>لا</option>
                                        <option value="1" @if ($package->branches == 1) selected @endif>نعم</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="days_work">أيام العمل</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="days_work" id="days_work" class="form-control select">
                                        <option value="0" @if ($package->days_work == 0) selected @endif>لا</option>
                                        <option value="1" @if ($package->days_work == 1) selected @endif>نعم</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="hours_work">ساعات العمل</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="hours_work" id="hours_work" class="form-control select">
                                        <option value="0" @if ($package->hours_work == 0) selected @endif>لا</option>
                                        <option value="1" @if ($package->hours_work == 1) selected @endif>نعم</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="stuff_namber">عدد الموظفين</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="stuff_namber" id="stuff_namber" class="form-control select">
                                        <option value="0" @if ($package->stuff_namber == 0) selected @endif>لا</option>
                                        <option value="1" @if ($package->stuff_namber == 1) selected @endif>نعم</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="search_appearance">نتائج البحث</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="search_appearance" id="search_appearance" class="form-control select">
                                        <option value="1000" @if ($package->search_appearance == 1000) selected @endif>اول 1000 نتيجة</option>
                                        <option value="300" @if ($package->search_appearance == 300) selected @endif>اول 300 نتيجة</option>
                                        <option value="100" @if ($package->search_appearance == 100) selected @endif>اول 100 نتيجة</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="description_ar">الوصف بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea name="description_ar" id="description_ar" rows="6" class="form-control">{{ $package->description_ar }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="description_en">الوصف بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea name="description_en" id="description_en" rows="6" class="form-control">{{ $package->description_en }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="picture">صورة الباقة</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="file" name="picture" id="picture">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-2">
                                    <div class="image-preview">
                                        <img src="{{ asset('pictures/packages/' . $package->picture) }}" alt="{{ $package->name_ar }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <input value="1" type="checkbox" name="status" @if ($package->status == 1) checked @endif><label style="margin-right: 5px;">مفعل</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-2">
                                    <input type="submit" class="form-control btn btn-success" value="تحديث">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

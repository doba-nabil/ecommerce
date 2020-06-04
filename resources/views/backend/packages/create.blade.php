@extends('backend.layout.master')
@section('backend-main')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">اضافة باقة اشتراك جديدة</div>
                <div class="panel-body">
                    @include('common.done')
                    @include('common.errors')
                    <form method="post" action="{{ route('packages.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name_ar">الاسم بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ old('name_ar') }}" required placeholder="اسم الباقة باللغة العربية">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name_en">الاسم بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name_en') }}" required placeholder="اسم الباقة باللغة الانجليزية">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="price">سعر الباقة</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}" required placeholder="سعر الباقة بالريال السعودي">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="days">مدة الاشتراك</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="days" name="days" value="{{ old('days') }}" placeholder="مدة الاشتراك بالأيام" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="products_namber">عدد المنتجات</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="products_namber" name="products_namber" value="{{ old('products_namber') }}" placeholder="الحد الأقصى للمنتجات الممكن اضافتها" class="form-control" required>
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
                                        <option value="0">لا</option>
                                        <option value="1">نعم</option>
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
                                        <option value="0">لا</option>
                                        <option value="1">نعم</option>
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
                                        <option value="0">لا</option>
                                        <option value="1">نعم</option>
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
                                        <option value="0">لا</option>
                                        <option value="1">نعم</option>
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
                                        <option value="0">لا</option>
                                        <option value="1">نعم</option>
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
                                        <option value="0">لا</option>
                                        <option value="1">نعم</option>
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
                                        <option value="0">لا</option>
                                        <option value="1">نعم</option>
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
                                        <option value="0">لا</option>
                                        <option value="1">نعم</option>
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
                                        <option value="0">لا</option>
                                        <option value="1">نعم</option>
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
                                        <option value="0">لا</option>
                                        <option value="1">نعم</option>
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
                                        <option value="0">لا</option>
                                        <option value="1">نعم</option>
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
                                        <option value="0">لا</option>
                                        <option value="1">نعم</option>
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
                                        <option value="0">لا</option>
                                        <option value="1">نعم</option>
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
                                        <option value="1000">اول 1000 نتيجة</option>
                                        <option value="300">اول 300 نتيجة</option>
                                        <option value="100">اول 100 نتيجة</option>
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
                                    <textarea name="description_ar" id="description_ar" rows="6" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="description_en">الوصف بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea name="description_en" id="description_en" rows="6" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="">صورة الباقة</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="file" name="picture" id="picture" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <input value="1" type="checkbox" name="status"><label style="margin-right: 5px;">مفعل</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-2">
                                    <input type="submit" class="form-control btn btn-success" value="اضافة">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

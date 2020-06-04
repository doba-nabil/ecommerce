@extends('backend.layout.master')
@section('backend-main')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">اضافة منتج جديد</div>
                <div class="panel-body">
                    @include('common.done')
                    @include('common.errors')
                    <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="store_id">المتجر</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="store_id" id="store_id" class="form-control select">
                                        @foreach ($stores as $store)
                                            <option value="{{ $store->id }}">{{ $store->name_ar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name_ar">الاسم بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ old('name_ar') }}" required placeholder="اسم المنتج باللغة العربية">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name_en">الاسم بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name_en') }}" required placeholder="اسم المنتج باللغة الانجليزية">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="category_id">التصنيف الرئيسي</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="category_id" id="category_id" class="form-control select">
                                        <option value="0">-- اختر التصنيف الرئيسي --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name_ar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="subcategory_id">التصنيف الفرعي</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="subcategory_id" id="subcategory_id" class="form-control select">
                                        <option value="0">-- اختر التصنيف الرئيسي أولا --</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="subsubcategory_id">التصنيف الفرعي الثاني </label>
                                </div>
                                <div class="col-md-10">
                                    <select name="subsubcategory_id" id="subsubcategory_id" class="form-control select">
                                       <option value="0">-- اختر التصنيف الفرعي أولا --</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="price">السعر</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="price" name="price" value="{{ old('price') }}" placeholder="سعر المنتج بدون الخصم" class="form-control" required>
                                </div>
                                <div class="col-md-3">
                                    <select name="currency_id" id="currency_id" class="form-control select">
                                        @foreach ($currencies as $currency)
                                            <option value="{{ $currency->id }}">{{ $currency->name_ar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="discount">الخصم</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="discount" name="discount" value="{{ old('discount') }}" placeholder="سعر المنتج بعد الخصم - يترك فارغا في حالة عدم وجود خصم" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="warranty">الضمان</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="number" id="warranty" name="warranty" value="{{ old('warranty') }}" placeholder="عدد سنوات ضمان المنتج - يترك فارغا في حالة عدم وجود ضمان" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="qty">الكمية المتوفرة</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="number" id="qty" name="qty" value="{{ old('qty') }}" placeholder="الكمية المتوفرة للمنتج" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="min_qty">اقل كمية للطلب</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="number" id="min_qty" name="min_qty" value="{{ old('min_qty') }}" placeholder="الحد الأدني للكمية الممكن طلبها من المنتج" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="country_ar">بلد الصنع بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="country_ar" name="country_ar" value="{{ old('country_ar') }}" placeholder="بلد الصنع باللغة العربية - يترك فارغا في حالة عدم وجود بلد صنع" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="country_en">بلد الصنع بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="country_en" name="country_en" value="{{ old('country_en') }}" placeholder="بلد الصنع باللغة الانجليزية" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="material_ar">الخامة بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="material_ar" name="material_ar" value="{{ old('material_ar') }}" placeholder="خامة المنتج باللغة العربية - يترك فارغا في حالة عدم وجود خامة" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="material_en">الخامة بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="material_en" name="material_en" value="{{ old('material_en') }}" placeholder="خامة المنتج باللغة الانجليزية" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="measure_id">وحدة القياس</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="measure_id" id="measure_id" class="form-control select">
                                        @foreach ($measures as $measure)
                                            <option value="{{ $measure->id }}">{{ $measure->name_ar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="brand_id">الماركة</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="brand_id" id="brand_id" class="form-control select">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name_ar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="code">رقم الموديل</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="code" name="code" value="{{ old('code') }}" placeholder="رقم الموديل من المورد" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="size">المقاس</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="input_fields_wrap">
                                        <button class="add_field_button btn btn-primary" style="margin-bottom: 10px;">اضافة مقاس آخر</button>
                                        <!--<div><input type="text" name="size[]" placeholder="اسم المقاس" class="llll"></div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="colors">الألوان</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="file" name="colors[]" id="colors" multiple>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="description_ar">الوصف بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea name="description_ar" id="description_ar" rows="8" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="description_en">الوصف بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea name="description_en" id="description_en" rows="8" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="picture">الصورة الرئيسية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="file" id="picture" name="picture" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="images">الصور الفرعية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="file" name="images[]" id="images" multiple>
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
                                <div class="col-md-10">
                                    <input value="1" type="checkbox" name="chosen"><label style="margin-right: 5px;">منتجات مختارة</label>
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

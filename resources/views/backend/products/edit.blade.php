@extends('backend.layout.master')
@section('backend-main')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">تعديل بيانات المنتج "{{ $product->name_ar }}"</div>
                <div class="panel-body">
                    @include('common.done')
                    @include('common.errors')
                    <form method="post" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="store">المتجر</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="store" class="form-control" value="{{ $product->store->name_ar }}" disabled>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{ route('stores.edit', $product->store->id) }}" style="display: inline-block; margin-top: 5px">تعديل بيانات المتجر</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name_ar">الاسم بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ $product->name_ar }}" required placeholder="اسم التصنيف باللغة العربية">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name_en">الاسم بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name_en" name="name_en" value="{{ $product->name_en }}" required placeholder="اسم التصنيف باللغة الانجليزية">
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
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if ($category->id == $product->category_id)
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
                                    <label for="subcategory_id">التصنيف الفرعي</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="subcategory_id" id="subcategory_id" class="form-control select">
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}"
                                                @if ($subcategory->id == $product->subcategory_id)
                                                    selected
                                                @endif
                                            >{{ $subcategory->name_ar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--<div class="form-group">-->
                        <!--    <div class="row">-->
                        <!--        <div class="col-md-2">-->
                        <!--            <label for="subcategory_id">التصنيف الفرعي الثاني </label>-->
                        <!--        </div>-->
                        <!--        <div class="col-md-10">-->
                        <!--            <select name="subsubcategory_id" id="subsubcategory_id" class="form-control select">-->
                        <!--                @foreach ($subsubcategories as $subsubcategory)-->
                        <!--                    <option value="{{ $subsubcategory->id }}"-->
                        <!--                        @if ($subcategory->id == $product->subsubcategory_id)-->
                        <!--                            selected-->
                        <!--                        @endif-->
                        <!--                    >{{ $subsubcategory->name_ar }}</option>-->
                        <!--                @endforeach-->
                        <!--            </select>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="price">السعر</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="price" name="price" value="{{ $product->price }}" placeholder="سعر المنتج بالريال بدون الخصم" class="form-control" required>
                                </div>
                                <div class="col-md-3">
                                    <select name="currency_id" id="currency_id" class="form-control select">
                                        @foreach ($currencies as $currency)
                                            <option value="{{ $currency->id }}"
                                                    @if ($currency->id == $product->currency_id)
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
                                    <label for="discount">الخصم</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="discount" name="discount" value="{{ $product->discount }}" placeholder="سعر المنتج بالريال بعد الخصم - يترك فارغا في حالة عدم وجود خصم" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="warranty">الضمان</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="number" id="warranty" name="warranty" value="{{ $product->warranty }}" placeholder="عدد سنوات ضمان المنتج - يترك فارغا في حالة عدم وجود ضمان" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="qty">الكمية المتوفرة</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="number" id="qty" name="qty" value="{{ $product->qty }}" placeholder="الكمية المتوفرة للمنتج" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="min_qty">اقل كمية للطلب</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="number" id="min_qty" name="min_qty" value="{{ $product->min_qty }}" placeholder="الحد الأدني للكمية الممكن طلبها من المنتج" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="country_ar">بلد الصنع بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="country_ar" name="country_ar" value="{{ $product->country_ar }}" placeholder="بلد الصنع باللغة العربية - يترك فارغا في حالة عدم وجود بلد صنع" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="country_en">بلد الصنع بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="country_en" name="country_en" value="{{ $product->country_en }}" placeholder="بلد الصنع باللغة الانجليزية" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="material_ar">الخامة بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="material_ar" name="material_ar" value="{{ $product->material_ar }}" placeholder="خامة المنتج باللغة العربية - يترك فارغا في حالة عدم وجود خامة" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="material_en">الخامة بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="material_en" name="material_en" value="{{ $product->material_en }}" placeholder="خامة المنتج باللغة الانجليزية" class="form-control">
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
                                            <option value="{{ $measure->id }}"
                                                @if ($measure->id == $product->measure_id)
                                                    selected
                                                @endif
                                            >{{ $measure->name_ar }}</option>
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
                                            <option value="{{ $brand->id }}"
                                                @if ($brand->id == $product->brand_id)
                                                    selected
                                                @endif
                                            >{{ $brand->name_ar }}</option>
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
                                    <input type="text" id="code" name="code" value="{{ $product->code }}" placeholder="رقم الموديل من المورد" class="form-control">
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
                                        @foreach ($sizes as $size)
                                            <div>
                                                <input type="text" name="size[]" value="{{ $size->value }}" class="llll">
                                                <a href="#" class="remove_field btn btn-danger">ازالة</a>
                                            </div>
                                        @endforeach
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
                        @if (count($product->colors) > 0)
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    @foreach ($product->colors as $color)
                                        <div class="col-md-2">
                                            <div class="image-preview">
                                                <img src="{{ asset('pictures/colors/' . $color->path) }}" alt="{{ $product->name_ar }}">
                                                <a href="{{ route('deleteColorImg', $color->id) }}" class="btn btn-danger btn-block">ازالة</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div class="form-group" @if (count($product->colors) > 0)
                            style="margin-top: 60px;"
                        @endif>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="description_ar">الوصف بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea name="description_ar" id="description_ar" rows="6" class="form-control">{{ $product->description_ar }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="description_en">الوصف بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea name="description_en" id="description_en" rows="6" class="form-control">{{ $product->description_en }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="picture">الصورة الرئيسية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="file" id="picture" name="picture">
                                </div>
                            </div>
                        </div>
                        @if (isset($product->picture))
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2">
                                        <div class="image-preview">
                                            <img src="{{ asset('pictures/products/' . $product->picture) }}" alt="{{ $product->name_ar }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
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
                        @if (count($product->images) > 0)
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    @foreach ($product->images as $image)
                                        <div class="col-md-2">
                                            <div class="image-preview">
                                                <img src="{{ asset('pictures/products/' . $image->path) }}" alt="{{ $product->name_ar }}">
                                                <a href="{{ route('deleteProductImg', $image->id) }}" class="btn btn-danger btn-block">ازالة</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <input value="1" type="checkbox" name="status" @if ($product->status == 1) checked @endif><label style="margin-right: 5px;">مفعل</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <input value="1" type="checkbox" name="chosen" @if ($product->chosen == 1) checked @endif><label style="margin-right: 5px;">منتجات مختارة</label>
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

<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@if($lang == 'ar')
    @section('pageTitle', 'تعديل المنتج الخاص بك')
@else
    @section('pageTitle', 'Edit Product')
@endif

@section('frontend-main')
    <section style="margin: 70px 0">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="profile-box">
                        <div class="panel-heading profile-box">
                            <h4 class="panel-title">@lang('frontend.edit_product') "{{ $product['name_'.$lang] }}"</h4>
                        </div>
                        <div class="panel-body">
                            @include('common.done')
                            @include('common.errors')
                            <form action="{{ route('editProductSave', $product->id) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="name_ar">@lang('frontend.name_ar')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ $product->name_ar }}" required placeholder="اسم التصنيف باللغة العربية">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="name_en">@lang('frontend.name_en')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="name_en" name="name_en" value="{{ $product->name_en }}" required placeholder="اسم التصنيف باللغة الانجليزية">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="category_id">@lang('frontend.cat')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <select name="category_id" id="category_id" class="form-control select">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                            @if ($category->id == $product->category_id)
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
                                        <div class="col-md-2">
                                            <label for="subcategory_id">@lang('frontend.subcat')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <select name="subcategory_id" id="subcategory_id" class="form-control select">
                                                @foreach ($subcategories as $subcategory)
                                                    <option value="{{ $subcategory->id }}"
                                                            @if ($subcategory->id == $product->subcategory_id)
                                                            selected
                                                            @endif
                                                    >{{ $subcategory['name_'.$lang] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="price">@lang('frontend.price')</label>
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
                                                    >{{ $currency['name_'.$lang] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="discount">@lang('frontend.discount')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" id="discount" name="discount" value="{{ $product->discount }}" placeholder="سعر المنتج بالريال بعد الخصم - يترك فارغا في حالة عدم وجود خصم" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="warranty">@lang('frontend.warranty')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="number" id="warranty" name="warranty" value="{{ $product->warranty }}" placeholder="عدد سنوات ضمان المنتج - يترك فارغا في حالة عدم وجود ضمان" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="qty">@lang('frontend.quantity1')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="number" id="qty" name="qty" value="{{ $product->qty }}" placeholder="الكمية المتوفرة للمنتج" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="min_qty">@lang('frontend.quantity2')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="number" id="min_qty" name="min_qty" value="{{ $product->min_qty }}" placeholder="الحد الأدني للكمية الممكن طلبها من المنتج" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="country_ar">@lang('frontend.made_in_ar')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" id="country_ar" name="country_ar" value="{{ $product->country_ar }}" placeholder="بلد الصنع باللغة العربية - يترك فارغا في حالة عدم وجود بلد صنع" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="country_en">@lang('frontend.made_in_en')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" id="country_en" name="country_en" value="{{ $product->country_en }}" placeholder="بلد الصنع باللغة الانجليزية" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="material_ar">@lang('frontend.quality_ar')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" id="material_ar" name="material_ar" value="{{ $product->material_ar }}" placeholder="خامة المنتج باللغة العربية - يترك فارغا في حالة عدم وجود خامة" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="material_en">@lang('frontend.quality_en')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" id="material_en" name="material_en" value="{{ $product->material_en }}" placeholder="خامة المنتج باللغة الانجليزية" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="measure_id">@lang('frontend.measure')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <select name="measure_id" id="measure_id" class="form-control select">
                                                @foreach ($measures as $measure)
                                                    <option value="{{ $measure->id }}"
                                                            @if ($measure->id == $product->measure_id)
                                                            selected
                                                            @endif
                                                    >{{ $measure['name_'.$lang] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="brand_id">@lang('frontend.brand')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <select name="brand_id" id="brand_id" class="form-control select">
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}"
                                                            @if ($brand->id == $product->brand_id)
                                                            selected
                                                            @endif
                                                    >{{ $brand['name_'.$lang] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="code">@lang('frontend.model')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" id="code" name="code" value="{{ $product->code }}" placeholder="رقم الموديل من المورد" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="size">@lang('frontend.size')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="input_fields_wrap">
                                                <button class="add_field_button btn btn-primary" style="margin-bottom: 10px;">@lang('frontend.onther_size')</button>
                                                @foreach ($sizes as $size)
                                                    <div>
                                                        <input type="text" name="size[]" value="{{ $size->value }}" class="llll">
                                                        <a href="#" class="remove_field btn btn-danger">@lang('frontend.delete')</a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="colors">@lang('frontend.colors')</label>
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
                                                        <a href="{{ route('deleteColorImgF', $color->id) }}" class="btn btn-danger btn-block">ازالة</a>
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
                                            <label for="description_ar">@lang('frontend.des_ar')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <textarea name="description_ar" id="description_ar" class="selector">{{ $product->description_ar }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="description_en">@lang('frontend.des_en')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <textarea name="description_en" id="description_en" class="selector">{{ $product->description_en }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="picture">@lang('frontend.main_pic')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="file" id="picture" name="picture">
                                        </div>
                                    </div>
                                </div>
                                @if (isset($product->picture))
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 col-md-offset-2">
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
                                            <label for="images">@lang('frontend.other_pics')</label>
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
                                                        <a href="{{ route('deleteProductImgF', $image->id) }}" class="btn btn-danger btn-block">@lang('frontend.delete')</a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2 col-md-offset-2">
                                            <input type="submit" class="form-control btn btn-success" value="@lang('frontend.update')">
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
        $(document).ready(function(){
            var base_url = $('#base-url').val();
            $('#category_id').on('change',function(e){
                console.log(e);
                var category_id = e.target.value;
                $.get( base_url + '/ajax-subcats?category_id='+ category_id,function(data){
                    $('#subcategory_id').empty();
                    $.each(data,function(index, subcatObj){
                        $('#subcategory_id').append('<option value="'+subcatObj.id+'">'+subcatObj.name_ar+'</option>');
                    });
                });
            });

            $('#category_id').on('change',function(e){
                console.log(e);
                var category_id = e.target.value;
                $.get( base_url + '/ajax-brands?category_id='+ category_id,function(data){
                    $('#brand_id').empty();
                    $.each(data,function(index, subcatObj){
                        $('#brand_id').append('<option value="'+subcatObj.id+'">'+subcatObj.name_ar+'</option>');
                    });
                });
            });

        });
    </script>
@endsection
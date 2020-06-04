<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@if($lang == 'ar')
    @section('pageTitle', 'اضافة منتج جديد')
@else
    @section('pageTitle', 'Add new Product')
@endif

@section('frontend-main')
    <section style="margin: 70px 0">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="profile-box">
                        <div class="panel-heading profile-box">
                            <h4 class="panel-title">@lang('frontend.add_new_product')</h4>
                        </div>
                        <div class="panel-body">
                            @include('common.done')
                            @include('common.errors')
                            <form action="{{ route('addProductSave') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="name_ar">@lang('frontend.name_ar')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ old('name_ar') }}" required placeholder="@lang('frontend.placeholder1')">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="name_en">@lang('frontend.name_en')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name_en') }}" required placeholder="@lang('frontend.placeholder2')">
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
                                                <option value="0">-- @lang('frontend.cat1') --</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category['name_'.$lang] }}</option>
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
                                                <option value="0">-- @lang('frontend.subcat1') --</option>
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
                                            <input type="text" id="price" name="price" value="{{ old('price') }}" placeholder="@lang('frontend.placeholder3')" class="form-control" required>
                                        </div>
                                        <div class="col-md-3">
                                            <select name="currency_id" id="currency_id" class="form-control select">
                                                @foreach ($currencies as $currency)
                                                    <option value="{{ $currency->id }}">{{ $currency['name_'.$lang] }}</option>
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
                                            <input type="text" id="discount" name="discount" value="{{ old('discount') }}" placeholder="@lang('frontend.placeholder4')" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="warranty">@lang('frontend.warranty')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="number" id="warranty" name="warranty" value="{{ old('warranty') }}" placeholder="@lang('frontend.placeholder5')" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="qty">@lang('frontend.quantity1')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="number" id="qty" name="qty" value="{{ old('qty') }}" placeholder="@lang('frontend.placeholder6')" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="min_qty">@lang('frontend.quantity2')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="number" id="min_qty" name="min_qty" value="{{ old('min_qty') }}" placeholder="@lang('frontend.placeholder7')" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="country_ar">@lang('frontend.made_in_ar')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" id="country_ar" name="country_ar" value="{{ old('country_ar') }}" placeholder="@lang('frontend.placeholder8')" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="country_en">@lang('frontend.made_in_en')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" id="country_en" name="country_en" value="{{ old('country_en') }}" placeholder="@lang('frontend.placeholder9')" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="material_ar">@lang('frontend.quality_ar')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" id="material_ar" name="material_ar" value="{{ old('material_ar') }}" placeholder="@lang('frontend.placeholder10')" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="material_en">@lang('frontend.quality_en')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" id="material_en" name="material_en" value="{{ old('material_en') }}" placeholder="@lang('frontend.placeholder11')" class="form-control">
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
                                                    <option value="{{ $measure->id }}">{{ $measure['name_'.$lang] }}</option>
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
                                                    <option value="{{ $brand->id }}">{{ $brand['name_'.$lang] }}</option>
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
                                            <input type="text" id="code" name="code" value="{{ old('code') }}" placeholder="@lang('frontend.placeholder12')" class="form-control">
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
                                                <div><input type="text" name="size[]" placeholder="@lang('frontend.size_name')" class="llll"></div>
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

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="description_ar">@lang('frontend.des_ar')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <textarea name="description_ar" id="description_ar" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="description_en">@lang('frontend.des_en')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <textarea name="description_en" id="description_en" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="picture">@lang('frontend.main_pic')</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="file" id="picture" name="picture" required>
                                        </div>
                                    </div>
                                </div>
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
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input style="width: 100%;border-radius: 0" type="submit" class="form-control btn btn-primary" value="@lang('frontend.add')">
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
                    $('#brand_id').append('<option value="0">بدون ماركة</option>');
                    $.each(data,function(index, subcatObj){
                        $('#brand_id').append('<option value="'+subcatObj.id+'">'+subcatObj.name_ar+'</option>');
                    });
                });
            });

        });
    </script>
@endsection
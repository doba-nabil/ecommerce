<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@section('pageTitle', $category->name_ar)
@section('frontend-main')
  
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="cat-title">{{ $category['name_'.$lang] }}</h3>
                </div>
            </div>
        </div>
    </section>
    <section class="section-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">

                    <div class="side-con1">
                        <form action="{{ route('filter') }}" method="get" class="form-horizontal" style="border:0;">
                            <input type="hidden" name="category_id" value="{{ $category->id }}">
                            <div class="form-group">
                                <label for="sel1" class="control-label col-md-2">@lang('frontend.catt')</label>
                                <div class="col-md-10">
                                    <select name="subcategory_id" class="form-control select" id="sel1">
                                        <option value="0">@lang('frontend.all_catt')</option>
                                        @foreach ($category->subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}"
                                                    @if (isset($subcategory_id) && $subcategory->id == $subcategory_id)
                                                    selected
                                                    @endif
                                            >{{ $subcategory['name_'.$lang] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sel1" class="control-label col-md-2">@lang('frontend.subcatt')</label>
                                <div class="col-md-10">
                                    <select name="subsubcategory_id" class="form-control select" id="sel1">
                                        <option value="0">@lang('frontend.all_subcatt')</option>
                                        @foreach ($category->subsubcategories as $subsubcategory)
                                            <option value="{{ $subsubcategory->id }}">{{ $subsubcategory['name_'.$lang] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sel1" class="control-label col-md-2">@lang('frontend.brands')</label>
                                <div class="col-md-10">
                                    <select name="brand_id" class="form-control select" id="sel1">
                                        <option value="0">@lang('frontend.all_brandss')</option>
                                        @foreach ($category->brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                @if (isset($brand_id) && $brand_id == $brand->id)
                                                    selected
                                                @endif
                                            >{{ $brand['name_'.$lang] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-default pull-left" value="@lang('frontend.show')">
                        </form>

                    </div>
                    <div class="clearfix"></div>
                    <div class="side-con2-head">
                        <h4>@lang('frontend.prices_for_you')</h4>
                    </div>
                    <div class="side-con2">
                        <form action="{{ route('price') }}" method="get">
                            <input type="hidden" name="category_id" value="{{ $category->id }}">
                            <b>10</b> <input id="ex2" type="text" class="span2" name="price" value="" data-slider-min="10" data-slider-max="1000" data-slider-step="5" data-slider-value="[
                                @if (isset($price))
                            {{ $price }}
                                @else
                                    50,800
                                @endif
                                    ]"/> <b>1000</b>
                            <input type="submit" class="btn btn-default pull-left" value="@lang('frontend.show')">
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="col-md-9">
                    <div class="row">
                        @if (count($products) > 0)
                            @foreach ($products as $product)
                                <div class="col-md-4">
                                    <div class="items-con text-center">
                                        <div class="items-con-img">
                                            <a href="{{ route('single', $product->id) }}">
                                                <img src="{{ asset('pictures/products/' . $product->picture) }}"/>
                                            </a>
                                        </div>
                                        <h4 style="margin: 0"><a href="{{ route('single', $product->id) }}">{{ $product['name_'.$lang] }}</a></h4>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-md-12">
                                <p class="alert alert-danger">@lang('frontend.no_products1')</p>
                            </div>
                        @endif
                        @if (count($products) > 0)
                            <div class="col-md-12">
                                {{ $products }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="banars">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banar2" style="margin-bottom: 40px">
                        <a href="{{ $bottomBanner5->url }}"><img src="{{ asset('pictures/banners/' . $bottomBanner5->picture) }}" alt="img"/></a>
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
                        <a href="{{ $bottomBanner6->url }}"><img src="{{ asset('pictures/banners/' . $bottomBanner6->picture) }}" alt="img"/></a>
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
                    <div class="banar2">
                        <a href="{{ $bottomBanner7->url }}"><img src="{{ asset('pictures/banners/' . $bottomBanner7->picture) }}" alt="img"/></a>
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
@endsection
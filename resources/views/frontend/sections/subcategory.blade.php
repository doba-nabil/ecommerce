<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@section('pageTitle', $subcategory->name_ar)
@section('frontend-main')
    <br>
    <section class="home-product">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="title1">{{ $subcategory['name_'.$lang] }}</h4>
                </div>
                @if (count($subcategory->subsubcategories) > 0)
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div id="accordion" class="panel-group">
                            <ul class="list-unstyled">
                                @foreach ($subcategory->subsubcategories as $subsubcategory)
                                    <li><a href="{{ route('subsubcategory', $subsubcategory->id) }}">{{ $subsubcategory['name_'.$lang] }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @else
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <p class="alert alert-info">لا توجد أقسام فرعية</p>
                    </div>
                @endif
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="sec-content">
                        <div class="row">
                            @if (count($products) > 0)
                                @foreach ($products as $product)
                                    <div class="col-md-4 col-sm-6 col-xs-6">
                                        @include('frontend.productTemplate')
                                    </div>
                                @endforeach
                                <div class="col-md-12 text-center">
                                    {{ $products }}
                                </div>
                            @else
                                <div class="col-md-12">
                                    <p class="alert alert-danger">@lang('frontend.no_products1')</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
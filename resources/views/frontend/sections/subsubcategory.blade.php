<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@section('pageTitle', $subsubcategory->name_ar)
@section('frontend-main')
    <section class="home-product">
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="title1">{{ $subsubcategory['name_'.$lang] }}</h4>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="sec-content ">
                        <div class="row">
                            @if (count($products) > 0)
                                @foreach ($products as $product)
                                    <div class="col-md-3 col-sm-4 col-xs-6">
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
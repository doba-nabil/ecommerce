<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@section('pageTitle', 'اخر المنتجات')
@section('frontend-main')
    <section class="recently-added">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="new-head">
                        <h4 class="alert alert-info">@lang('frontend.latest')</h4>
                    </div>
                </div>
                @if (count($products) > 0)
                    @foreach ($products as $product)
                        <div class="col-md-3">
                            @include('frontend.productTemplate')
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
    </section>
@endsection
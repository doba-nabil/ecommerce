<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@if($lang == 'ar')
    @section('pageTitle', 'جميع التصنيفات')
@else
    @section('pageTitle', 'All Categoreis')
@endif
@section('frontend-main')
    <section class="page-head">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline">
                        <li>
                            <a href="/">@lang('frontend.home')</a>
                        </li>
                        <li>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>@lang('frontend.all_catt')</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section style="margin-bottom: 20px" class="cat-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @foreach($categories as $category)
                    <div class="col-md-3 col-sm-3">
                        <div class="cat-box">
                            <div class="cat-img">
                                <a href="{{ route('category' , $category->id) }}">
                                    <img src="{{ asset('pictures/categories/' . $category->picture) }}" alt="img" />
                                </a>
                            </div>
                            <div style="background: {{ $category->color }}" class="cat-name text-center">
                                <a href="{{ route('category' , $category->id) }}">{{ $category['name_' . $lang] }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <br>
                <div class="col-xs-12 text-center">
                    {{ $categories }}
                </div>
            </div>
        </div>
    </section>
@endsection
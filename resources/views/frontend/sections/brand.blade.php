<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@section('pageTitle', $brand->name_ar)
@section('frontend-main')
    <section class="recently-added">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="new-head">
                        <h4>{{ $brand['name_'.$lang] }}</h4>
                    </div>
                </div>
                @if (count($products) > 0)
                    @foreach ($products as $product)
                        <div class="col-md-3">
                            <div class="added-con">
                                <div class="se-slider-img">
                                    <a href="{{ route('single', $product->id) }}">
                                        <img src="{{ asset('pictures/products/' . $product->picture) }}"/>
                                    </a>
                                </div>
                                <div class="se-slider-con">
                                    <div class="info1">
                                        <h4><a href="{{ route('single', $product->id) }}">{{ $product['name_'.$lang] }}</a></h4>
                                    </div>
                                    <div class="info2">
                                        <div class="price">
                                           <span>
                                            @if (Session::get('currency') !== null)
                                                   @if (Session::get('currency')->id == $product->currency_id)
                                                       {{ $product->price }} {{ $currency['name_'.$lang] }}
                                                   @else
                                                       @if (Session::get('currency')->id == 1)
                                                           {{ round( $product->price*$USD->equal) }} {{ $currency['name_'.$lang] }}
                                                       @else
                                                           {{ round( $product->price/$USD->equal) }} {{ $currency['name_'.$lang] }}
                                                       @endif
                                                   @endif
                                               @else
                                                   @if ($product->currency_id == 1)
                                                       {{ $product->price }} {{ $riyal['name_'.$lang] }}
                                                   @else
                                                       {{ round( $product->price*$USD->equal) }} {{ $riyal['name_'.$lang] }}
                                                   @endif
                                               @endif

                                        </span>
                                        </div>
                                        <div class="star2">
                                            <input id="input-id" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $product->averageRating }}" data-size="xs" disabled="">
                                        </div>
                                    </div>
                                    <div class="info3 text-center">
                                        <ul class="list-inline">
                                            <li><a href="{{ route('single', $product->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                            <li><a href="{{ route('single', $product->id) }}"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="{{ route('addToWish', $product->id) }}"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="{{ route('addToCompare', $product->id) }}"><i class="fa fa-align-left"></i></a></li>
                                        </ul>

                                    </div>
                                </div>
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
    </section>

    <section class="banars">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="banar2">
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
            </div>
        </div>
    </section>


    <section class="sections">
        <div class="container">
            <div class="rows">
                <div class="col-md-10 col-md-offset-2">
                    <div class="sections-contant">
                        @foreach ($categories as $category)
                            <div class="sec-con">
                                <a href="{{ route('category', $category->id) }}" class="se-img">
                                    <img src="{{ asset('pictures/categories/' . $category->picture) }}" alt="{{ $category->name_ar }}"/>
                                </a>
                                <h5><a href="{{ route('category', $category->id) }}">{{ $category['name_'.$lang] }}</a></h5>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
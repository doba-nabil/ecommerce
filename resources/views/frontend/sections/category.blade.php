<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@section('pageTitle', $category['name_'.$lang])
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
                        <li>{{ $category['name_'.$lang] }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section style="margin-bottom: 20px" class="cat-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ad">
                        <a href="{{ $category->link }}"><img src="{{ asset('pictures/categories_banners/' . $category->banner) }}" alt="img"/></a>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="cat-side">
                            <form action="{{ route('searchcategory' , $category->id) }}" method="post">
                                {{ csrf_field() }}
                                <div class="block">
                                    <h5>@lang('frontend.brands')</h5>
                                    @if(count($category->brands) > 0)
                                    @foreach($category->brands as $barnd)
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input name="brand_id[]" value="{{ $barnd->id }}" type="checkbox"> <span>{{ $barnd['name_'.$lang] }}</span>
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                    @else
                                        <h5 class="alert alert-warning">
                                            @lang('frontend.no_brands')
                                        </h5>
                                    @endif
                                </div>
                                @if(count($category->subcategories))
                                <div class="block">
                                    <h5> @lang('frontend.subcat')</h5>
                                    @foreach($category->subcategories as $sub)
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input name="sub_id[]" value="{{ $sub->id }}" type="checkbox"> <span>{{ $sub['name_'.$lang] }}</span>
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                                <div class="block">
                                    <h5>@lang('frontend.price')</h5>
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="from" id="exampleInputPassword1" placeholder="From">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="to" id="exampleInputPassword2" placeholder="To">
                                    </div>
                                </div>
                                <div class="submit">
                                    <button type="submit" class="">@lang('frontend.search')</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9">
                        <div class="cat-p-content">
                            @if(count($products) > 0)
                            @foreach($products as $bestproduct)
                                <div class="col-md-4 col-sm-6">
                                    <div class="product-grid">
                                        <div class="product-image">
                                            <a href="{{ route('single', $bestproduct->id) }}">
                                                <img class="pic-1" src="{{ asset('pictures/products/' . $bestproduct->picture) }}">
                                            </a>
                                            <h5 class="p-title">
                                                <span class="sale"><?php
                                                    $offerRate = $bestproduct->discount/$bestproduct->price*100;
                                                    $offerRate = 100 - $offerRate;
                                                    echo round($offerRate) . '%';
                                                    ?>
                                                </span>
                                                @if($bestproduct->arrival == 1)
                                                    <span class="new">New</span>
                                                @endif
                                            </h5>
                                            <ul class="social">
                                                @auth()
                                                    <li>
                                                        <a role="button" product="{{ $bestproduct->id }}" data-token="{{ csrf_token() }}" class="favourite_add
                                                    @foreach ($bestproduct->wishes as $favourite)
                                                        @if (isset(Auth::user()->id) && $favourite->user_id == Auth::user()->id)
                                                                color55
                                                        @endif
                                                        @endforeach
                                                                " data-tip="Add to Wishlist">
                                                            <i class="fa fa-heart-o"></i>
                                                        </a>
                                                    </li>
                                                @else
                                                    <li>
                                                        <a style="cursor: pointer" type="button" data-toggle="modal" data-target="#myModal1" data-tip="Add to Wishlist">
                                                            <i class="fa fa-heart-o"></i>
                                                        </a>
                                                    </li>
                                                @endauth
                                                <li>
                                                    <a href="{{ route('single', $bestproduct->id) }}" data-tip="Add to Search">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('single', $bestproduct->id) }}" data-tip="Add to Cart">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="title">
                                                <a href="{{ route('single', $bestproduct->id) }}">{{ mb_strimwidth($bestproduct['name_'.$lang] , 0, 33, "...") }}</a>
                                            </h3>
                                            <div class="price">
                                                <div class="price discount"><span>{{ $bestproduct->price }} {{ $bestproduct->currency['name_'.$lang] }}</span>{{ $bestproduct->discount }} {{ $bestproduct->currency['name_'.$lang] }}</div>
                                            </div>
                                            <h5>
                                                <input id="input-id" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $bestproduct->averageRating }}" data-size="xs" disabled="">
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @else
                                <h4 class="alert-warning alert">@lang('frontend.no_products')</h4>
                            @endif
                            <div class="col-md-12">
                                <div class="pag-con text-center" aria-label="Page navigation">
                                    {{ $products }}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
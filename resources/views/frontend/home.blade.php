<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@section('pageTitle', 'الرئيسية')
@section('frontend-main')
    <section class="slider">
        <div id="owl-demo1" class="owl-carousel owl-theme">
            @foreach ($slidersTop as $sliderTop)
                <div class="item">
                    <div class="slider-img">
                        <a href="{{ $sliderTop->link }}">
                            <img src="{{ asset('pictures/mainslider/' . $sliderTop->image) }}" alt="{{ $sliderTop->link }}" />
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="support">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="support-box text-center">
                        <img src="{{ asset('frontend/imgs/i1.png') }}" alt="img" />
                        <h5>Big Saving</h5>
                        <h5>Get Big Disscount Every Day !</h5>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="support-box support2 text-center">
                        <img src="{{ asset('frontend/imgs/i2.png') }}" alt="img" />
                        <h5>Support</h5>
                        <h5>Get Big Disscount Every Day !</h5>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="support-box text-center">
                        <img src="{{ asset('frontend/imgs/i3.png') }}" alt="img" />
                        <h5>Free Shopping</h5>
                        <h5>Get Big Disscount Every Day !</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="banars">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="banar-img">
                        <a href="{{ $banner1->link }}">
                            <img src="{{ asset('pictures/banners/' . $banner1->picture) }}" alt="img" />
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="banar-img">
                        <a href="{{ $banner2->link }}">
                            <img src="{{ asset('pictures/banners/' . $banner2->picture) }}" alt="img" />
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="banar-img">
                        <a href="{{ $banner3->link }}">
                            <img src="{{ asset('pictures/banners/' . $banner3->picture) }}" alt="img" />
                        </a>
                    </div>
                </div>
                <div class="bannar-collect col-md-8 col-sm-8" style="padding: 0">
                    <div class="col-md-12 col-sm-12">
                        <div class="banar-img">
                            <a href="{{ $banner4->link }}">
                                <img src="{{ asset('pictures/banners/' . $banner4->picture) }}" alt="img" />
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="banar-img">
                            <a href="{{ $banner5->link }}">
                                <img src="{{ asset('pictures/banners/' . $banner5->picture) }}" alt="img" />
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="banar-img">
                            <a href="{{ $banner6->link }}">
                                <img src="{{ asset('pictures/banners/' . $banner6->picture) }}" alt="img" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="banar-img">
                        <a href="{{ $banner7->link }}">
                            <img src="{{ asset('pictures/banners/' . $banner7->picture) }}" alt="img" />
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="banar-img">
                        <a href="{{ $banner8->link }}">
                            <img src="{{ asset('pictures/banners/' . $banner8->picture) }}" alt="img" />
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="banar-img">
                        <a href="{{ $banner9->link }}">
                            <img src="{{ asset('pictures/banners/' . $banner9->picture) }}" alt="img" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cat-head">
                        <h4>@lang('frontend.all_catt')</h4>
                    </div>
                </div>
                <div id="owl-demo2" class="owl-carousel owl-theme">
                    @foreach($categories as $category)
                    <div class="item">
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
            </div>
        </div>
    </section>
    <section class="home-product">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-ttabs">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            @if(count($bestproducts) > 0)
                                <li role="presentation" class="active">
                                    <a href="#cat1" aria-controls="cat1" role="tab" data-toggle="tab">@lang('frontend.best')</a>
                                </li>
                            @endif
                            @if(count($fproducts) > 0)
                                <li role="presentation" @if(count($bestproducts) == 0) class="active" @endif>
                                    <a href="#cat2" aria-controls="cat2" role="tab" data-toggle="tab">@lang('frontend.new_pro')</a>
                                </li>
                            @endif
                            @if(count($offers) > 0)
                                <li role="presentation">
                                    <a href="#cat3" aria-controls="cat3" role="tab" data-toggle="tab">@lang('frontend.sale')</a>
                                </li>
                            @endif
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            @if(count($bestproducts) > 0)
                            <div role="tabpanel" class="tab-pane fade in active" id="cat1">
                                @foreach($bestproducts as $bestproduct)
                                <div class="col-md-3 col-sm-4 col-xs-6">
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
                                                    <a href="{{ route('single', $bestproduct->id) }}" data-tip="Show">
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
                            </div>
                            @endif
                           @if(count($fproducts) > 0)
                            <div role="tabpanel" class="tab-pane fade" id="cat2">
                                @foreach($fproducts as $fproduct)
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="product-grid">
                                            <div class="product-image">
                                                <a href="{{ route('single', $fproduct->id) }}">
                                                    <img class="pic-1" src="{{ asset('pictures/products/' . $fproduct->picture) }}">
                                                </a>
                                                <h5 class="p-title">
                                                <span class="sale">
                                                    @if ($fproduct->discount !== null)
                                                        <?php
                                                        $offerRate = $fproduct->discount/$fproduct->price*100;
                                                        $offerRate = 100 - $offerRate;
                                                        echo '-' . round($offerRate) . '%';
                                                        ?>
                                                    @endif
                                                </span>
                                                    @if($fproduct->arrival == 1)
                                                        <span class="new">New</span>
                                                    @endif
                                                </h5>
                                                <ul class="social">
                                                    @auth()
                                                        <li>
                                                            <a role="button" product="{{ $fproduct->id }}" data-token="{{ csrf_token() }}" class="favourite_add
                                                        @foreach ($fproduct->wishes as $favourite)
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
                                                        <a href="{{ route('single', $fproduct->id) }}" data-tip="Add to Search">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('single', $fproduct->id) }}" data-tip="Add to Cart">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="title">
                                                    <a href="{{ route('single', $fproduct->id) }}">{{ $fproduct['name_'.$lang] }}</a>
                                                </h3>
                                                <div class="price">
                                                    <div class="price discount"><span>{{ $fproduct->price }} {{ $fproduct->currency['name_'.$lang] }}</span>{{ $fproduct->discount }} {{ $fproduct->currency['name_'.$lang] }}</div>
                                                </div>
                                                <h5>
                                                    <input id="input-id" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $fproduct->averageRating }}" data-size="xs" disabled="">
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @endif
                            @if (count($offers) > 0)
                            <div role="tabpanel" class="tab-pane fade" id="cat3">
                                @foreach ($offers as $offer)
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="product-grid">
                                        <div class="product-image">
                                            <a href="{{ route('single', $offer->id) }}">
                                                <img class="pic-1" src="{{ asset('pictures/products/' . $offer->picture) }}">
                                            </a>
                                            <h5 class="p-title">
                                                <span class="sale">
                                                    @if ($offer->discount !== null)
                                                     <?php
                                                            $offerRate = $offer->discount/$offer->price*100;
                                                            $offerRate = 100 - $offerRate;
                                                            echo '-' . round($offerRate) . '%';
                                                            ?>
                                                    @endif
                                                </span>
                                                @if($offer->arrival == 1)
                                                    <span class="new">New</span>
                                                @endif
                                            </h5>
                                            <ul class="social">
                                                @auth()
                                                    <li>
                                                        <a role="button" product="{{ $offer->id }}" data-token="{{ csrf_token() }}" class="favourite_add
                                                    @foreach ($offer->wishes as $favourite)
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
                                                    <a href="{{ route('single', $offer->id) }}" data-tip="Add to Search">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('single', $offer->id) }}" data-tip="Add to Cart">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="title">
                                                <a href="{{ route('single', $offer->id) }}">{{ $offer['name_'.$lang] }}</a>
                                            </h3>
                                            <div class="price">
                                                <div class="price discount"><span>{{ $offer->price }} {{ $offer->currency['name_'.$lang] }}</span>{{ $offer->discount }} {{ $offer->currency['name_'.$lang] }}</div>
                                            </div>
                                            <h5>
                                                <input id="input-id" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $offer->averageRating }}" data-size="xs" disabled="">
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="banner1">
        <div class="banner1-img">
            <a href="{{ $banner10->link }}">
                <img src="{{ asset('pictures/banners/' . $banner10->picture) }}" alt="img" />
            </a>
        </div>
    </section>

    @if(count($firstcategory->products) > 0)
    <section class="electronics">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cat-head">
                        <h4>{{ $firstcategory['name_'.$lang] }}</h4>
                    </div>
                </div>
                @foreach($firstcategory->products as $product)
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="elec-box">
                        <div class="col-md-4 col-sm-4 col-xs-4" style="padding: 0 8px">
                            <div class="elec-img">
                                <a href="{{ route('single', $product->id) }}">
                                    <img src="{{ asset('pictures/products/' . $product->picture) }}" alt="img" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8" style="padding: 0 5px">
                            <div class="elec-con">
                                <h3 class="title">
                                    <a href="{{ route('single', $product->id) }}">{{ mb_strimwidth($product['name_'.$lang] , 0, 33, "...") }}</a>
                                </h3>
                                <div class="price">
                                    <span>{{ $product->price }} {{ $product->currency['name_'.$lang] }} </span> {{ $product->discount }} {{ $product->currency['name_'.$lang] }}

                                </div>
                                <h5>
                                    <input id="input-id" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $product->averageRating }}" data-size="xs" disabled="">
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <section class="banner1">
        <div class="banner1-img">
            <a href="{{ $banner11->link }}">
                <img src="{{ asset('pictures/banners/' . $banner11->picture) }}" alt="img" />
            </a>
        </div>
    </section>
    @if(count($secondcategory->products) > 0)
    <section class="electronics">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cat-head">
                        <h4>{{ $secondcategory['name_'.$lang] }}</h4>
                    </div>
                </div>
                @foreach($secondcategory->products as $product)
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="elec-box">
                            <div class="col-md-4 col-sm-4 col-xs-4" style="padding: 0 8px">
                                <div class="elec-img">
                                    <a href="{{ route('single', $product->id) }}">
                                        <img src="{{ asset('pictures/products/' . $product->picture) }}" alt="img" />
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-8" style="padding: 0 5px">
                                <div class="elec-con">
                                    <h3 class="title">
                                        <a href="{{ route('single', $product->id) }}">{{ mb_strimwidth($product['name_'.$lang] , 0, 33, "...") }}</a>
                                    </h3>
                                    <div class="price">
                                        <span>{{ $product->price }} {{ $product->currency['name_'.$lang] }} </span> {{ $product->discount }} {{ $product->currency['name_'.$lang] }}

                                    </div>
                                    <h5>
                                        <input id="input-id" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $product->averageRating }}" data-size="xs" disabled="">
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <section class="brands">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="owl-demo3" class="owl-carousel owl-theme">
                        @foreach($parteners as $partener)
                            <div class="item">
                                <div class="brands-img text-center">
                                    <img title="{{ $partener['title_' . $lang] }}" src="{{ asset('pictures/partners/' . $partener->logo) }}" alt="img" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
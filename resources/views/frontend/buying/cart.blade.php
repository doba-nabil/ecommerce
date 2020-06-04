<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@if($lang == 'ar')
    @section('pageTitle', 'سلة الشراء')
@else
    @section('pageTitle', 'Your Shopping Cart')
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
                        <li>@lang('frontend.cart')</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="cart-page">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-9">
                    <div class="cart-content">
                        <div class="cart-box row">
                            <h4 class="cart-b-title">@lang('frontend.cart')</h4>
                            @if(count(Cart::content()) > 0)
                            @foreach (Cart::content() as $item)
                            <div class="cart-item row" style="margin: 0">
                                <div class="col-md-3 col-sm-3">
                                    <div class="cart-img text-center">
                                        <img src="{{ asset('pictures/products/' . $item->model->picture) }}" alt="img" />
                                    </div>
                                </div>
                                <div class="col-md-9 col-md-9">
                                    <div class="cart-con">
                                        <h4>
                                            {{ mb_strimwidth($item->model['name_'.$lang] , 0, 40, "...") }}
                                            <br> @lang('frontend.code'): {{ $item->model->code }}
                                            <br>
                                            @if (isset($item->model->discount))
                                                <p>{{ $item->model->discount }} {{ $item->model->currency['name_'.$lang] }}</p>
                                                <p style="text-decoration: line-through;">{{ $item->model->price }} {{ $item->model->currency['name_'.$lang] }} </p>
                                                <p>
                                         <span>@lang('frontend.discount1')
                                             <?php
                                             $offerRate = $item->model->discount/$item->model->price*100;
                                             $offerRate = 100 - $offerRate;
                                             echo round($offerRate) . '%';
                                             ?>
                                         </span>
                                                </p>
                                            @else
                                                <p>{{ $item->model->price }} {{ $item->model->currency['name_'.$lang] }}</p>

                                            @endif
                                        </h4>
                                        <br>
                                        <ul class="list-inline">
                                            <li>
                                                <form action="{{ route('removeItem', $item->rowId) }}" method="post">
                                                    {{ csrf_field() }}
                                                    <button class="no-btn"><i class="fa fa-trash-o"> @lang('frontend.delete') </i></button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                                <div class="col-md-12">
                                    <h3 class="alert alert-warning">
                                        @lang('frontend.cart_empty11')
                                    </h3>
                                </div>
                            @endif
                        </div>
                        @if(count(Cart::content()) > 0)
                        <div class="cart-s-link">
                            <a href="#">@lang('frontend.checkout')</a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="cart-side">
                        <div class="cart-s-con">
                            <h4>@lang('frontend.orderDetails')</h4>
                            <div class="cart-s-det">
                                <h5>
                                    <span>@lang('frontend.productsNumber'):</span>
                                    <span>{{ count(Cart::content()) }}</span>
                                </h5>
                                <h5>
                                    <span>@lang('frontend.qty1') : </span>
                                    <span>
                                        <?php
                                        $i = 0;
                                        foreach (Cart::content() as $qty) {
                                            $i+= $qty->qty;
                                        }
                                        echo  $i;
                                        ?>
                                    </span>
                                </h5>
                                <h5>
                                    <span>@lang('frontend.total'):</span>
                                    <span>{{ Cart::total() }} {{ $currentLanguage['name_'.$lang] }}</span>
                                </h5>
                            </div>

                        </div>
                        @if(count(Cart::content()) > 0)
                        <div class="cart-s-link text-center">
                            <a href="{{ route('checkout') }}">@lang('frontend.checkout')</a>
                        </div>
                        @endif
                        <div class="ad2">
                            <a href="{{ $banner->link }}">
                                <img src="{{ asset('pictures/banners/' . $banner->picture) }}" alt="img" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


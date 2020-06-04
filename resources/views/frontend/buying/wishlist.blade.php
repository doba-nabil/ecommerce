<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@if($lang == 'ar')
    @section('pageTitle', 'قائمة الامنيات')
@else
    @section('pageTitle', 'Wishlist')
@endif

@section('frontend-main')
    <section class="cart-page">
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="cart-content">
                        <div class="cart-box row">
                            <h4 class="cart-b-title">@lang('frontend.wishlist') ({{ count($wishs) }})</h4>
                            @if(count($wishs) > 0)
                                @foreach ($wishs as $item)
                                    <div class="cart-item row" style="margin: 0">
                                        <div class="col-md-3 col-sm-3">
                                            <div class="cart-img text-center">
                                                <img src="{{ asset('pictures/products/' . $item->product->picture) }}" alt="img" />
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-md-9">
                                            <div class="cart-con">
                                                <h4>
                                                    {{ mb_strimwidth($item->product['name_'.$lang] , 0, 40, "...") }}
                                                    <br> @lang('frontend.code'): {{ $item->product->code }}
                                                    <br>
                                                    @if (isset($item->product->discount))
                                                        <p>{{ $item->product->discount }} {{ $item->product->currency['name_'.$lang] }}</p>
                                                        <p style="text-decoration: line-through;">{{ $item->product->price }} {{ $item->product->currency['name_'.$lang] }} </p>
                                                        <p>
                                         <span>@lang('frontend.discount1')
                                             <?php
                                             $offerRate = $item->product->discount/$item->product->price*100;
                                             $offerRate = 100 - $offerRate;
                                             echo round($offerRate) . '%';
                                             ?>
                                         </span>
                                                        </p>
                                                    @else
                                                        <p>{{ $item->product->price }} {{ $item->product->currency['name_'.$lang] }}</p>

                                                    @endif
                                                </h4>
                                                <br>
                                            </div>
                                                @auth()
                                                    <ul class="like" style="list-style: none;">
                                                        <li>
                                                            <a role="button" product="{{ $item->product->id }}" data-token="{{ csrf_token() }}" class="favourite_add
                                                        @foreach ($item->product->wishes as $favourite)
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
                                                    </ul>
                                                @endauth
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-md-12">
                                    <h3 class="alert alert-warning">
                                        @lang('frontend.wishlist_empty')
                                    </h3>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


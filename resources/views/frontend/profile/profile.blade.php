<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@section('pageTitle', $user->name)
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
                        <li>@lang('frontend.profile')</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="profile-page">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-3">
                    <div class="profile-tab">
                        <div class="profile-img text-center">
                            <img src="{{ asset('frontend/imgs/person.png') }}" alt="img" />
                        </div>
                        <div class="profile-info">
                            <h5>Hello</h5>
                            @if (isset(Auth::user()->id) && $user->id == Auth::user()->id)
                                <h4>{{ $user->full_name ?? $user->name }}</h4>
                            @elseif (isset(Auth::user()->id) && $user->id !== Auth::user()->id || !isset(Auth::user()->id))
                                <h4>{{ $user->full_name ?? $user->name }}</h4>
                            @endif
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                @lang('frontend.logout')
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                        <!-- Nav tabs -->
                        @if (isset(Auth::user()->id) && $user->id == Auth::user()->id)
                                @include('frontend.profile.navbar')
                        @elseif (isset(Auth::user()->id) && $user->id !== Auth::user()->id || !isset(Auth::user()->id))
                            <div class="col-md-2 col-sm-3 col-xs-12">
                                @if ($user->type == 1)
                                    <div class="secur-links" style="margin-bottom: 40px;">
                                        <h3>@lang('frontend.stoore')</h3>
                                        <div class="secur-l1">
                                            <ul class="list-unstyled">
                                                <li><a href="{{ route('store', $user->id) }}">@lang('frontend.store_details')</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                    <div class="secur-links">
                                        <h3>@lang('frontend.profile')</h3>
                                        <div class="secur-l1">
                                            <ul class="list-unstyled">
                                                <li><a href="{{ route('login') }}">@lang('frontend.login1')</a></li>
                                                <li><a href="{{ route('register') }}">@lang('frontend.register')</a></li>
                                                <li><a href="{{ route('page', 10) }}">@lang('frontend.help')</a></li>
                                            </ul>
                                        </div>
                                    </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-9 col-md-offset-1 col-sm-9">
                    <div class="profile-tab-con">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="profile1">
                                <div class="profile-title"></div>
                                <div class="profile-box row">
                                    <h4>@lang('frontend.profile')</h4>
                                    <div class="col-md-4 col-sm-4">
                                        <h5>@lang('frontend.name')</h5>
                                        <h5>@if (isset(Auth::user()->id) && $user->id == Auth::user()->id)
                                                {{ $user->full_name ?? $user->name }}
                                            @elseif (isset(Auth::user()->id) && $user->id !== Auth::user()->id || !isset(Auth::user()->id))
                                                {{ $user->full_name ?? $user->name }}
                                            @endif</h5>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <h5>@lang('frontend.email')</h5>
                                        <h5>@if (isset(Auth::user()->id) && $user->id == Auth::user()->id)
                                                {{ $user->email }}
                                            @elseif (isset(Auth::user()->id) && $user->id !== Auth::user()->id || !isset(Auth::user()->id))
                                                {{ $user->email }}
                                            @endif</h5>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <h5>@lang('frontend.edit_profile')</h5>
                                        <a href="{{ route('profileEdit') }}">@lang('frontend.edit')</a>
                                    </div>
                                </div>
                                <div class="profile-box row">
                                    @if (isset(Auth::user()->id) && $user->id == Auth::user()->id)
                                        <h4>@lang('frontend.securityOptions')</h4>
                                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                            <div class="acc-box">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    @lang('frontend.email'): {{ $user->email }}
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <a href="{{ route('changePassword') }}">@lang('frontend.changePAss')</a>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif (isset(Auth::user()->id) && $user->id !== Auth::user()->id || !isset(Auth::user()->id))
                                        <h4>@lang('frontend.contact')</h4>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="acc-box">
                                                <a href="{{ route('newMessages', $user->id) }}" class="btn btn-default">@lang('frontend.message')</a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="profile-box row">
                                    <h4>@lang('frontend.comments')</h4>
                                    <div class="col-md-12 col-sm-12">
                                    @if(count($user->comments) > 0)

                                        <div class="col-md-12 col-sm-12">
                                            @foreach ($user->comments->slice(0, 2) as $comment)
                                                <p>"{{ mb_strimwidth($comment->comment, 0, 38, "...") }} " @lang('frontend.on') <a href="{{ route('single', $comment->product->id) }}">{{ mb_strimwidth($comment->product['name_'.$lang], 0, 20, "...") }}</a></p>
                                            @endforeach
                                        </div>
                                        <div class="clearfix"></div>
                                        <hr>
                                        <div class="col-md-12 text-center">
                                            <p><span><a href="{{ route('comments', $user->id) }}">@lang('frontend.show_all') ({{ count($user->comments) }})</a></span></p>
                                        </div>
                                    @else
                                        <p class="alert alert-warning">@lang('frontend.no_comments')</p>
                                    @endif
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="profile2">
                                <div class="profile-title">
                                    <h4>@lang('frontend.address')</h4>
                                </div>
                                <div class="profile-box row">
                                    @if (isset(Auth::user()->id) && $user->id == Auth::user()->id)
                                        <div class="acc-box">
                                            <h4>@lang('frontend.my_addresses')</h4>
                                            @foreach ($user->addresses->slice(0, 2) as $address)
                                                <p>{{ $address->country['name_'.$lang] }} - {{ $address->city }}</p>
                                            @endforeach
                                            <div class="col-xs-12">
                                                <p><span><a href="{{ route('addresses') }}">@lang('frontend.show_all') ({{ count($user->addresses) }})</a></span></p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="profile3">
                                <div class="col-md-12">
                                    <div style="border-radius: 0" class="panel panel-default">
                                        <div style="color: #fff;background-color: #19befe;border-radius: 0" class="panel-heading">
                                            <h3 class="panel-title">@lang('frontend.my_orders')</h3>
                                        </div>
                                        <div class="panel-body">
                                            @if (count($orders) > 0)
                                                <table class="table-responsive table text-center table-bordered cartTable">
                                                    <tr>
                                                        <th>@lang('frontend.order_name')</th>
                                                        <th>@lang('frontend.phone')</th>
                                                        <th>@lang('frontend.order_number')</th>
                                                        <th>@lang('frontend.total')</th>
                                                        <th>@lang('frontend.status')</th>
                                                        <th></th>
                                                    </tr>
                                                    @foreach ($orders as $order)
                                                        <tr>
                                                            <td>{{ $order->name }}</td>
                                                            <td>{{ $order->phone }}</td>
                                                            <td>{{ $order->code }}</td>
                                                            <td>{{ $order->price }} {{ $riyal['name_'.$lang] }}</td>
                                                            <td>
                                                                @if ($order->status == 1)
                                                                    <span class="label label-danger">@lang('frontend.confirmed')</span>
                                                                @elseif ($order->status == 2)
                                                                    <span class="label label-primary">@lang('frontend.prepared')</span>
                                                                @elseif ($order->status == 3)
                                                                    <span class="label label-warning">@lang('frontend.shipped')</span>
                                                                @elseif ($order->status == 4)
                                                                    <span class="label label-success">@lang('frontend.delivered')</span>
                                                                @else
                                                                    <span class="label label-info">@lang('frontend.new')</span>
                                                                @endif
                                                            </td>
                                                            <td><a href="{{ route('orderUser', $order->id) }}">@lang('frontend.details')</a></td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            @else
                                                <p class="alert alert-danger">@lang('frontend.no_orders')</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="profile4"><div class="profile-box row">
                                        <h4>@lang('frontend.wishlist')</h4>
                                        @foreach ($user->wishes->slice(0, 2) as $wish)
                                            <div class="cart-item row" style="margin: 0">
                                                <div class="col-md-3 col-sm-3">
                                                    <div class="cart-img text-center">
                                                        <img src="{{ asset('pictures/products/' . $wish->product->picture) }}" alt="img" />
                                                    </div>
                                                </div>
                                                <div class="col-md-9 col-md-9">
                                                    <div class="cart-con">
                                                        <h4>
                                                            <a style="background: #0c5370" href="{{ route('single', $wish->product->id) }}">{{ mb_strimwidth($wish->product['name_'.$lang], 0, 40, "...") }}</a>
                                                        </h4>
                                                        <ul class="list-inline">
                                                            @auth()
                                                                <li>
                                                                    <a style="background: transparent;" role="button" product="{{ $wish->product->id }}" data-token="{{ csrf_token() }}" class="favourite_add
                                                                    @foreach ($user->wishes as $favourite)
                                                                    @if (isset(Auth::user()->id) && $wish->user_id == Auth::user()->id)
                                                                            color55
                                                                    @endif
                                                                    @endforeach
                                                                            " data-tip="Add to Wishlist">
                                                                        <i class="fa fa-heart-o"></i>
                                                                    </a>
                                                                </li>
                                                            @else
                                                                <li>
                                                                    <a style="cursor: pointer;background: transparent;" type="button" data-toggle="modal" data-target="#myModal1" data-tip="Add to Wishlist">
                                                                        <i class="fa fa-heart-o"></i>
                                                                    </a>
                                                                </li>
                                                            @endauth
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        @endforeach
                                    <div class="clearfix"></div>
                                    <div class="col-md-12 text-center">
                                        <p><span><a href="{{ route('wishlist', $user->id) }}">@lang('frontend.show_all') ({{ count($user->wishes) }})</a></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
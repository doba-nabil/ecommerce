<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@section('pageTitle', $order->name)
@section('frontend-main')
    <style>
        label {
            margin-top: 5px;
        }
    </style>
    <section style="margin: 70px 0">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="profile-box">
                        <div class="panel-heading profile-box">
                            <h4 class="panel-title">@lang('frontend.order_by'){{ $order->name }}</h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="timeline-con" style="margin: 30px 0 50px 0">
                                    <ul class="timeline" id="timeline">
                                        <li class="li complete">
                                            <div class="timestamp">
                                                <span class="date">{{ $order->created_at->toDateString() }}</span>
                                            </div>
                                            <div class="status">
                                                <h4>@lang('frontend.order_stat1')</h4>
                                            </div>
                                        </li>
                                        <li class="li @if ($order->confirmed == 1) complete @endif">
                                            <div class="timestamp">
                                    <span class="date">
                                        @if ($order->confirmed == 1)
                                            {{ $order->confirmed_date }}
                                        @endif
                                    </span>
                                            </div>
                                            <div class="status">
                                                <h4>@lang('frontend.order_stat2')</h4>
                                            </div>
                                        </li>
                                        <li class="li @if ($order->satup == 1) complete @endif">
                                            <div class="timestamp">
                                    <span class="date">
                                        @if ($order->satup == 1)
                                            {{ $order->satup_date }}
                                        @endif
                                    </span>
                                            </div>
                                            <div class="status">
                                                <h4>@lang('frontend.order_stat3')</h4>
                                            </div>
                                        </li>
                                        <li class="li @if ($order->shipped == 1) complete @endif">
                                            <div class="timestamp">
                                    <span class="date">
                                        @if ($order->shipped == 1)
                                            {{ $order->shipped_date }}
                                        @endif
                                    </span>
                                            </div>
                                            <div class="status">
                                                <h4>@lang('frontend.order_stat4')</h4>
                                            </div>
                                        </li>
                                        <li class="li @if ($order->delivered == 1) complete @endif">
                                            <div class="timestamp">
                                    <span class="date">
                                        @if ($order->delivered == 1)
                                            {{ $order->delivered_date }}
                                        @endif
                                    </span>
                                            </div>
                                            <div class="status">
                                                <h4>@lang('frontend.order_stat5')</h4>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <div class="payment1">
                                        <h1>@lang('frontend.member')</h1>
                                        @if ($order->user_id > 0)
                                            <h2><a href="{{ route('profile', $order->user->id) }}">{{ $order->user->name }}</a></h2>
                                        @else
                                            <h2>@lang('frontend.unregistered')</h2>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="payment1">
                                        <h1>@lang('frontend.name')</h1>
                                        <h2>{{ $order->name }}</h2>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="payment1">
                                        <h1>@lang('frontend.phone')</h1>
                                        <h2>{{ $order->phone }}</h2>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="payment1">
                                        <h1>@lang('frontend.email')</h1>
                                        <h2>{{ $order->email }}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="payment1">
                                <h1>@lang('frontend.address')</h1>
                                @if ($order->address_id > 0)
                                    @foreach ($order->user->addresses as $address)
                                        @if ($address->id == $order->address_id)
                                            <ul class="list-unstyled addres-admin">
                                                <li>{{ $address->country['name_'.$lang] }}</li>
                                                <li>{{ $address->city }}</li>
                                                <li>{{ $address->district }} - {{ $address->street }} - {{ $address->details }}</li>
                                                <li>{{ $address->notes }}</li>
                                            </ul>
                                        @endif
                                    @endforeach
                                @else
                                    <ul class="list-unstyled addres-admin">
                                        <li>{{ $order->country['name_'.$lang] }}</li>
                                        <li>{{ $order->city }}</li>
                                        <li>{{ $order->district }} - {{ $order->street }} - {{ $order->details }}</li>
                                    </ul>
                                @endif
                            </div>
                            <div class="payment1">
                                <h1>@lang('frontend.products')</h1>
                                <table class="table-responsive table table-bordered text-center cartTable" style="margin-top: 20px;">
                                    <tr>
                                        <th>@lang('frontend.product')</th>
                                        <th>@lang('frontend.price')</th>
                                        <th>@lang('frontend.qty')</th>
                                        <th>@lang('frontend.size')</th>
                                        <th>@lang('frontend.color')</th>
                                        <th>@lang('frontend.total')</th>
                                    </tr>
                                    @foreach ($order->products as $item)
                                        @if ($item->product->store_id == $store_id)
                                            <tr>
                                                <td><a href="{{ route('single', $item->product->id) }}" style="color: #f47741">{{ $item->product['name_'.$lang] }}</a></td>
                                                <td>
                                                @if (isset($item->product->discount))
                                                        @if ($item->product->currency_id == 2)
                                                            {{ round($item->product->discount*$USD->equal, 0) }} {{ $riyal['name_'.$lang] }}
                                                        @else
                                                            {{ round($item->product->discount, 0) }} {{ $riyal['name_'.$lang] }}
                                                        @endif
                                                    @else
                                                        @if ($item->product->currency_id == 2)
                                                            {{ round($item->product->price*$USD->equal, 0) }} {{ $riyal['name_'.$lang] }}
                                                        @else
                                                            {{ round($item->product->price, 0) }} {{ $riyal['name_'.$lang] }}
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>{{ $item->qty }}</td>
                                                <td>
                                                    @if (isset($item->size_id))
                                                        {{ $item->size->value }}
                                                    @else
                                                        --
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (isset($item->color_id))
                                                        <a href="{{ asset('pictures/colors/' . $item->color->path) }}">
                                                            <img src="{{ asset('pictures/colors/' . $item->color->path) }}" style="width: 40px; height: 40px;">
                                                        </a>
                                                    @else
                                                        --
                                                    @endif
                                                </td>
                                                <td> {{ round($item->price, 0) }} {{ $currency['name_'.$lang] }}</td>
                                            </tr>
                                        @endif

                                    @endforeach
                                </table>
                            </div>
                            <div class="payment1">
                                <h1>@lang('frontend.orderstat')</h1>
                                <form action="{{ route('changeOrderStatus', $order->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="checkbox" style="margin-bottom: 15px;">
                                        <label>
                                            <input value="1" type="checkbox" name="confirmed" @if ($order->confirmed) checked @endif>@lang('frontend.order_stat2')
                                        </label>
                                    </div>

                                    <div class="checkbox" style="margin-bottom: 15px;">
                                        <label>
                                            <input value="1" type="checkbox" name="satup" @if ($order->satup) checked @endif>@lang('frontend.order_stat3')
                                        </label>
                                    </div>

                                    <div class="checkbox" style="margin-bottom: 15px;">
                                        <label>
                                            <input value="1" type="checkbox" name="shipped" @if ($order->shipped) checked @endif>@lang('frontend.order_stat4')
                                        </label>
                                    </div>

                                    <div class="checkbox" style="margin-bottom: 15px;">
                                        <label>
                                            <input value="1" type="checkbox" name="delivered" @if ($order->delivered) checked @endif>@lang('frontend.order_stat5')
                                        </label>
                                    </div>
                                    <input type="submit" value="@lang('frontend.save')" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
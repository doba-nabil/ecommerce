<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@section('pageTitle', 'متابعة الشحنة')
@section('frontend-main')
    <section class="banars">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banar1">
                        <a href="{{ $bottomBanner5->url }}"><img
                                    src="{{ asset('pictures/banners/' . $bottomBanner5->picture) }}" alt="img"
                                    style="height: 150px;"/></a>
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
                        <a href="{{ $bottomBanner6->url }}"><img
                                    src="{{ asset('pictures/banners/' . $bottomBanner6->picture) }}" alt="img"
                                    style="height: 250px;"/></a>
                        @if (isset($bottomBanner6->price))
                            <div class="banar-con2">
                                <h4>@lang('frontend.enjoy')</h4>
                                <a href="{{ $bottomBanner6->url }}">{{ $bottomBanner6->price }}$</a>
                            </div>
                        @endif
                        <p>{{ $bottomBanner6['title_'.$lang] }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="banar3">
                        <a href="{{ $bottomBanner7->url }}"><img src="{{ asset('pictures/banners/' . $bottomBanner7->picture) }}" alt="img" style="height: 250px;"/></a>
                        @if (isset($bottomBanner7->price))
                            <div class="banar-con2">
                                <h4>@lang('frontend.enjoy')</h4>
                                <a href="{{ $bottomBanner7->url }}">{{ $bottomBanner7->price }}$</a>
                            </div>
                        @endif
                        <p>{{ $bottomBanner7['title_'.$lang] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="order-steps">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="timeline-con">
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
                    <div class="timeline-info">
                        <h4>@lang('frontend.order_info')</h4>
                        <div class="order-follow-con col-md-10 col-md-offset-1">
                            <div class="box">
                                <span class="col-md-3"> @lang('frontend.order_code') : </span>
                                <span>{{ $order->code }}</span>
                            </div>
                            <div class="box">
                                <span class="col-md-3"> @lang('frontend.name') : </span>
                                <span>{{ $order->name }}</span>
                            </div>
                            <div class="box">
                                <span class="col-md-3"> @lang('frontend.phone') :</span>
                                <span>{{ $order->phone }}</span>
                            </div>
                            <div class="box">
                                <span class="col-md-3"> @lang('frontend.address') : </span>
                                @if ($order->address_id > 0)
                                    @foreach ($order->user->addresses as $address)
                                        @if ($address->id == $order->address_id)
                                            <span>{{ $address->country['name_'.$lang] }} - {{ $address->city }} - {{ $address->district }} - {{ $address->street }}</span>
                                        @endif
                                    @endforeach
                                @else
                                    <span>{{ $order->country['name_'.$lang] }} - {{ $order->city }} - {{ $order->district }} - {{ $order->street }}</span>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="timeline-pro">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="img"></th>
                                <th>@lang('frontend.product')</th>
                                <th>@lang('frontend.price')</th>
                                <th>@lang('frontend.qty')</th>
                                <th>@lang('frontend.size')</th>
                                <th>@lang('frontend.color')</th>
                                <th>@lang('frontend.total')</th>
                                <th class="bb"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($order->products as $item)
                                <tr>
                                    <td class="text-center img">
                                        <img src="{{ asset('pictures/products/' . $item->product->picture) }}" style="width: 40px; height: 40px;">
                                    </td>
                                    <td class="text-center"><a href="{{ route('single', $item->product->id) }}">{{ $item->product['name_'.$lang] }}</a></td>
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
                                    <td class="text-center">{{ $item->qty }}</td>
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
                                    <td class="text-center">{{ $item->price }} {{ $riyal['name_'.$lang] }}</td>
                                    <td class="text-center buyy">
                                        <span class="review"><a href="{{ route('single', $item->product->id) }}">اكتب مراجعة</a></span>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="bb" style="border:  1px solid #fff;"></td>
                                <td style="border:  1px solid #fff;"></td>
                                <td style="border:  1px solid #fff;"></td>
                                <td style="border: 1px solid #fff;"></td>
                                <td style="border: 1px solid #fff;" ></td>
                                <td style="border: 1px solid #fff;border-left: 1px solid #dddddd;"></td>
                                <td style="text-align:  center; padding: 20px 0;">@lang('frontend.shipping_company') : {{ $order->ship->price }} {{ $riyal['name_'.$lang] }}</td>
                            </tr>
                            <tr>
                                <td class="bb" style="border:  1px solid #fff;"></td>
                                <td style="border:  1px solid #fff;"></td>
                                <td style="border:  1px solid #fff;"></td>
                                <td style="border: 1px solid #fff;"></td>
                                <td style="border: 1px solid #fff;"></td>
                                <td style="border: 1px solid #fff; border-left: 1px solid #dddddd;"></td>
                                <td style="text-align:  center; padding: 20px 0;">@lang('frontend.total') : <?= preg_replace('#(\d),(\d)#','$1$2', $order->price) + preg_replace('#(\d),(\d)#','$1$2', $order->ship->price) ?> {{ $riyal['name_'.$lang] }}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
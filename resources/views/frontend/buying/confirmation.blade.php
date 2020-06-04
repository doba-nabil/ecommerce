<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@section('backend-head')
    <style>
        @media print{
            header , .top-header , nav , .top-footer , footer , .se-footer {
                display:none!important;
            }
            #printableArea {
                display:block;
            }
        }

    </style>
@endsection
@if($lang == 'ar')
    @section('pageTitle', 'تمت العملية بنجاح')
@else
    @section('pageTitle', 'Success Payment')
@endif
@section('frontend-main')
    <section id="printableArea" style="margin: 60px 0">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="profile-box">
                        <div class="panel-heading">
                            <h4 class="panel-title">@lang('frontend.your_bill')</h4>
                        </div>
                        <div class="panel-body" style="padding: 40px 15px; text-align: center;">
                            <p style="margin-bottom: 35px;">@lang('frontend.bill_success1') <span class="alert alert-success">{{ $order->code }}</span> @lang('frontend.bill_success2').</p>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="payment1">
                                        <h1>@lang('frontend.name')</h1>
                                        <h2>{{ $order->name }}</h2>
                                    </div>
                                </div>
                                @if (isset($order->phone))
                                    <div class="col-lg-3">
                                        <div class="payment1">
                                            <h1>@lang('frontend.phone')</h1>
                                            <h2>{{ $order->phone }}</h2>
                                        </div>
                                    </div>
                                @endif

                                <div class="col-lg-3">
                                    <div class="payment1">
                                        <h1>@lang('frontend.email')</h1>
                                        <h2>{{ $order->email }}</h2>
                                    </div>
                                </div>
                                @if ($order->paid == 1)
                                    <div class="col-lg-3">
                                        <div class="payment1">
                                            <h1>@lang('frontend.bank')</h1>
                                            <h2>{{ $order->payment->bank->name_ar }}</h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="payment1">
                                            <h1>@lang('frontend.owner')</h1>
                                            <h2>{{ $order->payment->owner_name }}</h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="payment1">
                                            <h1>@lang('frontend.ipan')</h1>
                                            <h2>{{ $order->payment->ipan }}</h2>
                                        </div>
                                    </div>
                                @endif

                            </div>
                             @if ($order->in_site == 1)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="payment1">
                                        <h1>@lang('frontend.address')</h1>
                                        @foreach ($order->user->addresses as $address)
                                            @if ($address->id == $order->address_id)
                                                <ul class="list-unstyled addres-admin">
                                                    <li>{{ $address->country->name_ar }}</li>
                                                    <li>{{ $address->city }}</li>
                                                    <li>{{ $address->district }} - {{ $address->street }} - {{ $address->details }}</li>
                                                    <li>{{ $address->notes }}</li>
                                                </ul>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="payment1">
                                        <table class="table-responsive table table-bordered cartTable">
                                            <tr>
                                                <th>@lang('frontend.product')</th>
                                                <th>@lang('frontend.price')</th>
                                                <th>@lang('frontend.qty')</th>
                                                <th>@lang('frontend.total')</th>
                                            </tr>
                                            @foreach ($order->products as $item)
                                                <tr>
                                                    <td>{{ $item->product['name_'.$lang] }}</td>

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
                                                    <td>{{ $item->price }} {{ $riyal['name_'.$lang] }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="payment1">
                                        <h1>@lang('frontend.shipping_company')</h1>
                                        <h2>{{ $order->ship['name_'.$lang] }} - {{ $order->ship->price }}</h2>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="payment1">
                                        <h1>@lang('frontend.total')</h1>
                                        <h2><?= preg_replace('#(\d),(\d)#','$1$2', $order->price) + preg_replace('#(\d),(\d)#','$1$2', $order->ship->price) ?> ريال</h2>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="payment1">
                                        <h1>@lang('frontend.order_date')</h1>
                                        <h2>{{ $order->created_at->toDateString() }}</h2>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="payment1">
                                        <h1>@lang('frontend.order_code')</h1>
                                        <h2>{{ $order->code }}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <br>
                                <div class="col-md-12">
                                    <a style="width: 100%;border-radius: 0" href="javascript:window.print()" class="pull-left btn btn-primary hide_print">@lang('frontend.print')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
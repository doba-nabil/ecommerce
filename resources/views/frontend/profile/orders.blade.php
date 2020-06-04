<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@section('pageTitle', 'طلباتي')
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
                        <div class="panel-heading">
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
        </div>
    </section>
@endsection
<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@if($lang == 'ar')
    @section('pageTitle', 'مبيعاتي')
@else
    @section('pageTitle', 'My sellings')
@endif
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
                            <h4 class="panel-title">@lang('frontend.my_sellings')</h4>
                        </div>
                        <div class="panel-body">
                            @if (count($orders) > 0)
                                <table class="table-responsive table table-bordered text-center">
                                    <tr>
                                        <th class="text-center">@lang('frontend.client')</th>
                                        <th class="text-center">@lang('frontend.date')</th>
                                        <th class="text-center">@lang('frontend.options')</th>
                                    </tr>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->name }}</td>
                                            <td>{{ $order->created_at->toDateString() }}</td>
                                            <td><a href="{{ route('order_details', $order->id) }}" class="btn btn-primary">@lang('frontend.details')</a></td>
                                        </tr>
                                    @endforeach
                                </table>
                            @else
                                <p class="alert alert-danger">@lang('frontend.no_sellings')</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
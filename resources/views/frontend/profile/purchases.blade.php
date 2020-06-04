<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@section('pageTitle', 'مشترياتي')
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">@lang('frontend.my_buyings')</h3>
                        </div>
                        <div class="panel-body">
                            @if (count($purchases) > 0)
                                <table class="table-responsive table text-center table-bordered cartTable">
                                    <tr>
                                        <th></th>
                                        <th>@lang('frontend.product')</th>
                                        <th>@lang('frontend.price')</th>
                                        <th>@lang('frontend.store')</th>
                                        <th></th>
                                    </tr>
                                    @foreach ($purchases as $purchase)
                                        <tr>
                                            <td><img src="{{ asset('pictures/products/' . $purchase->picture) }}" alt="{{ $purchase->name_ar }}" style="width: 80px; height: 60px;"></td>
                                            <td><a href="{{ route('single', $purchase->id) }}" style="color: #6589ff">{{ $purchase['name_'.$lang] }}</a></td>
                                            <td>
                                                @if (isset($purchase->discount))
                                                    @if ($purchase->currency_id == 2)
                                                        {{ round($purchase->discount*$USD->equal, 0) }} {{ $riyal['name_'.$lang] }}
                                                    @else
                                                        {{ round($purchase->discount, 0) }} {{ $riyal['name_'.$lang] }}
                                                    @endif
                                                @else
                                                    @if ($purchase->currency_id == 2)
                                                        {{ round($purchase->price*$USD->equal, 0) }} {{ $riyal['name_'.$lang] }}
                                                    @else
                                                        {{ round($purchase->price, 0) }} {{ $riyal['name_'.$lang] }}
                                                    @endif
                                                @endif
                                            </td>
                                            <td><a href="{{ route('store', $purchase->store->id) }}" style="color: #6589ff">{{ $purchase->store['name_'.$lang] }}</a></td>
                                            <td><a href="{{ route('single', $purchase->id) }}">@lang('frontend.write_comment')</a></td>
                                        </tr>
                                    @endforeach
                                </table>
                            @else
                                <p class="alert alert-danger">@lang('frontend.no_buyings')</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
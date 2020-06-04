<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@section('pageTitle', 'قائمة المقارنة')
@section('frontend-main')
    <section style="margin: 70px 0">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">@lang('frontend.compare_list')</h3>
                        </div>
                        <div class="panel-body">
                            @include('common.done')
                            @include('common.errors')
                            @if (count(Cart::instance('compare')->content()) > 0)
                                <div class="comparison">
                                    <table class="text-center table table-bordered table-responsive">
                                        <tbody style="border: 1px solid #ddd;">
                                        <!-- ----------------------------- -->
                                        <tr class="compare-row">
                                            <td>@lang('frontend.product')</td>
                                            @foreach (Cart::instance('compare')->content() as $name)
                                                <td><span class="tickblue"><a href="{{ route('single', $name->model->name_ar) }}">{{ $name->model['name_'.$lang] }}</a></span></td>
                                            @endforeach
                                        </tr>
                                        <!-- ----------------------------- -->
                                        <tr class="compare-row">
                                            <td style="line-height: 121px;">@lang('frontend.product_pic')</td>
                                            @foreach (Cart::instance('compare')->content() as $image)
                                                <td><img src="{{ asset('pictures/products/' . $image->model->picture) }}" alt="{{ $image->name }}" style="width: 150px; height: 120px; border-radius: 6px;"></td>
                                            @endforeach
                                        </tr>
                                        <!-- ----------------------------- -->
                                        <tr class="compare-row">
                                            <td>@lang('frontend.price')</td>
                                            @foreach (Cart::instance('compare')->content() as $price)
                                                <td><span class="tickblue">
                                                        @if (Session::get('currency') !== null)
                                                            @if (Session::get('currency')->id == $price->model->currency_id)
                                                                {{ $price->model->price }} {{ $currency['name_'.$lang] }}
                                                            @else
                                                                @if (Session::get('currency')->id == 1)
                                                                    {{ round( $price->model->price*$USD->equal) }} {{ $currency['name_'.$lang] }}
                                                                @else
                                                                    {{ round( $price->model->price/$USD->equal) }} {{ $currency['name_'.$lang] }}
                                                                @endif
                                                            @endif
                                                        @else
                                                            @if ($price->model->currency_id == 1)
                                                                {{ $price->model->price }} {{ $riyal['name_'.$lang] }}
                                                            @else
                                                                {{ round( $price->model->price*$USD->equal) }} {{ $riyal['name_'.$lang] }}
                                                            @endif
                                                        @endif

                                                    </span></td>
                                            @endforeach
                                        </tr>
                                        <!-- ----------------------------- -->
                                        <tr class="compare-row">
                                            <td>@lang('frontend.price_after')</td>
                                            @foreach (Cart::instance('compare')->content() as $discount)
                                                <td>
                                                    @if (isset($discount->model->discount))
                                                        <span class="tickblue">{{ $discount->model->discount }}</span>
                                                    @else
                                                        <span class="tickblue"><i class="fa fa-times" style="color: red"></i></span>
                                                    @endif
                                                </td>
                                            @endforeach
                                        </tr>
                                        <!-- ----------------------------- -->
                                        <tr class="compare-row">
                                            <td>@lang('frontend.store')</td>
                                            @foreach (Cart::instance('compare')->content() as $store)
                                                <td><span class="tickblue"><a href="{{ route('store', $store->model->store->id) }}">{{ $store->model->store['name_'.$lang] }}</a></span></td>
                                            @endforeach
                                        </tr>
                                        <!-- ----------------------------- -->
                                        <tr class="compare-row">
                                            <td>@lang('frontend.quantity1')</td>
                                            @foreach (Cart::instance('compare')->content() as $qty)
                                                <td><span class="tickblue">{{ $qty->model->qty }}</span></td>
                                            @endforeach
                                        </tr>
                                        <!-- ----------------------------- -->
                                        <tr class="compare-row">
                                            <td>@lang('frontend.warranty_years')</td>
                                            @foreach (Cart::instance('compare')->content() as $warranty)
                                                <td>
                                                    @if (isset($warranty->model->warranty))
                                                        <span class="tickblue">{{ $warranty->model->warranty }}</span>
                                                    @else
                                                        <span class="tickblue"><i class="fa fa-times"></i></span>
                                                    @endif
                                                </td>
                                            @endforeach
                                        </tr>
                                        <!-- ----------------------------- -->
                                        <tr class="compare-row">
                                            <td>@lang('frontend.brand')</td>
                                            @foreach (Cart::instance('compare')->content() as $brand)
                                                <td><span class="tickblue">{{ $brand->model->brand['name_'.$lang] }}</span></td>
                                            @endforeach
                                        </tr>
                                        <!-- ----------------------------- -->
                                        <tr class="compare-row">
                                            <td>@lang('frontend.made_in')</td>
                                            @foreach (Cart::instance('compare')->content() as $country)
                                                <td><span class="tickblue">{{ $country->model['country_'.$lang] }}</span></td>
                                            @endforeach
                                        </tr>
                                        <!-- ----------------------------- -->
                                        <tr class="compare-row">
                                            <td>@lang('frontend.qua')</td>
                                            @foreach (Cart::instance('compare')->content() as $material)
                                                <td><span class="tickblue">{{ $material->model['material_'.$lang] }}</span></td>
                                            @endforeach
                                        </tr>
                                        <!-- ----------------------------- -->
                                        <tr class="compare-row">
                                            <td>@lang('frontend.rate')</td>
                                            @foreach (Cart::instance('compare')->content() as $rate)
                                                <td>
                                                    <input id="input-id" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $rate->model->averageRating }}" data-size="xs" disabled="">
                                                </td>
                                            @endforeach
                                        </tr>
                                        <!-- ----------------------------- -->
                                        <tr class="compare-row">
                                            <td>@lang('frontend.options')</td>
                                            @foreach (Cart::instance('compare')->content() as $oneItem)
                                                <td class="ll">
                                                    <form action="{{ route('removeItemCompare', $oneItem->rowId) }}" method="post" style="display: inline-block">
                                                        {{ csrf_field() }}
                                                        <input type="submit" value="@lang('frontend.delete')" class="btn btn-warning">
                                                    </form>
                                                </td>
                                            @endforeach
                                        </tr>
                                        <!-- ----------------------------- -->
                                        </tbody>
                                    </table>
                                </div>
                                <form action="{{ route('distroyCompare') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-danger pull-left" value="@lang('frontend.empty_compare')">
                                </form>
                            @else
                                <p class="alert alert-danger">@lang('frontend.compare_list_empty')</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


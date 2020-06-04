<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@section('pageTitle', 'الدفع')
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
                        <li>
                            <a href="{{ route('cart') }}">@lang('frontend.cart')
                            </a>
                        </li>
                        <li>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="{{ route('checkout') }}">@lang('frontend.checkout')</a>
                        </li>
                        <li>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a style="color: #c41230">@lang('frontend.buying')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="payment-page profile-box">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pay-ways">
                        @include('common.done')
                        @include('common.errors')
                        <form action="{{ route('checkoutStore_pay') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <table class="table table-responsive table-bordered" style="margin-top: 30px;">
                                    <thead>
                                    <td>@lang('frontend.bank')</td>
                                    <td>@lang('frontend.account_no')</td>
                                    <td>@lang('frontend.owner')</td>
                                    <td>@lang('frontend.ipan')</td>
                                    </thead>
                                    <tbody>
                                    @foreach ($banks as $bank)
                                        <tr>
                                            <td>{{ $bank['name_'.$lang] }}</td>
                                            <td>{{ $bank->account }}</td>
                                            <td>{{ $bank['owner_'.$lang] }}</td>
                                            <td>{{ $bank->ipan }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group">
                                <label for="bank_id">@lang('frontend.bank')</label>
                                <select name="bank_id" id="bank_id"
                                        class="form-control select">
                                    @foreach ($banks as $bank)
                                        <option value="{{ $bank->id }}">{{ $bank['name_'.$lang] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="owner_name">@lang('frontend.owner')</label>
                                <input type="text" name="owner_name" id="owner_name"
                                       value="{{ old('owner_name') }}"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="ipan">@lang('frontend.ipan')</label>
                                <input type="text" name="ipan" id="ipan"
                                       value="{{ old('ipan') }}"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="picture">@lang('frontend.transfer_pic')</label>
                                <input type="file" name="picture" id="picture">
                            </div>
                            <button type="submit" class="btn btn-primary" style="margin-top: 30px;width: 100%;border-radius: 0">@lang('frontend.pay')</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

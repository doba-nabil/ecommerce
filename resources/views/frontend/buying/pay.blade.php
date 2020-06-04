<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@section('pageTitle', 'الدفع')
@section('frontend-main')
    <section class="cart-links-f">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-links text-left">
                        <ul class="list-inline">
                            <li>
                                <a href="{{ route('cart') }}">@lang('frontend.cart')<i class="fa fa-angle-left"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('checkout') }}">@lang('frontend.checkout')<i class="fa fa-angle-left"></i>
                                </a>
                            </li>
                            <li>
                                <a style="color: #c41230">@lang('frontend.buying')</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="payment-page">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="pay-add">
                        <h4>@lang('frontend.code'): {{ $order->code }}</h4>
                        <h4>{{ $order->address->city }} - {{ $order->address->district }} - {{ $order->address->street }}...</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-total text-left">
                        <h4>
                            @lang('frontend.total'):
                            <a href="#">{{ $order->price }}</a>
                            {{ $currentLanguage['name_'.$lang] }}
                        </h4>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="pay-ways">
                        <form>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <img src="{{ asset('frontend/imgs/p1.png') }}" alt="img"/>
                                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى</p>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                <img src="{{ asset('frontend/imgs/p2.png') }}" alt="img"/>
                                <div class="form-group">
                                    <input type="text" class="form-control" style="width: 25%; display: inline-block;" placeholder="رقم البطاقة">
                                    <input type="text" class="form-control" style="width: 15%; display: inline-block;" placeholder="سنة / شهر ">
                                    <input type="text" class="form-control" style="width: 5%; display: inline-block;" placeholder="رمز">
                                </div>
                            </div>
                            <div class="form-check disabled">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" disabled>
                                <img src="{{ asset('frontend/imgs/p3.png') }}" alt="img"/>
                            </div>
                            <button type="submit" class="">دفع</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('frontend-footer')
@endsection
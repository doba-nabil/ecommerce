@extends('frontend.layout.master')
<?php
    $lang = App::getLocale();
    $currency = Session::get('currency');
?>
@section('pageTitle', 'اتصل بنا')
@section('frontend-main')
    <style>
        label {
            font-weight: normal;
        }
    </style>
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
                        <li>@lang('frontend.contact')</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="con-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d927764.3586534002!2d47.383126081727326!3d24.724149907986494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f03890d489399%3A0xba974d1c98e79fd5!2z2KfZhNix2YrYp9i2INin2YTYs9i52YjYr9mK2Kk!5e0!3m2!1sar!2seg!4v1574256551386!5m2!1sar!2seg"
                                frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="con-info">
                        <h4>Info About Shop</h4>
                        <h5>
                            <span>@lang('frontend.phone')</span>
                            <span>{{ $option->phone }}</span>
                        </h5>
                        <h5>
                            <span>@lang('frontend.email')</span>
                        <span>{{ $option->email }}</span>
                        </h5>
                        <h5>
                            <span>@lang('frontend.address')</span>
                            <span>{{ $option['address_' . $lang] }}</span>
                        </h5>
                        <div class="social-links">
                            <ul class="list-inline">
                                <li>
                                    <h5>@lang('frontend.contact1') :</h5>
                                </li>
                                @if (isset($option->facebook))
                                    <li><a href="{{ $option->facebook }}"><i class="fa fa-facebook"></i></a></li>
                                @endif
                                @if (isset($option->twitter))
                                    <li><a href="{{ $option->twitter }}"><i class="fa fa-twitter"></i></a></li>
                                @endif
                                @if (isset($option->youtube))
                                    <li><a href="{{ $option->youtube }}"><i class="fa fa-youtube"></i></a></li>
                                @endif
                                @if (isset($option->instagram))
                                    <li><a href="{{ $option->instagram }}"><i class="fa fa-instagram"></i></a></li>
                                @endif
                                @if (isset($option->google))
                                    <li><a href="{{ $option->google }}"><i class="fa fa-google"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="con-form">
                        @include('common.done')
                        @include('common.errors')
                        <form method="POST" action="{{ route('contact') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="@lang('frontend.email')" name="email" value=" @if (isset(Auth::user()->email)) {{ Auth::user()->email }}  @endif ">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="4" name="description" placeholder="@lang('frontend.your_msg')"></textarea>
                            </div>
                            <div class="submit text-right">
                                <button type="submit" class="">@lang('frontend.send')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
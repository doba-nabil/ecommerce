<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@section('pageTitle', 'تغيير كلمة المرور')
@section('frontend-main')
    <section class="security">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="secur-con">
                        <h4><a>اعداد الامان</a></h4>
                        @include('common.errors')
                        @include('common.done')
                        <form action="{{ route('changePassword') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label class="col-md-2 col-sm-3" for="oldPass">كلمة المرور الاصلية :</label>
                                <input type="password" class="form-control col-md-5 col-sm-6" id="oldPass" name="oldPass" required>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-sm-3 col-md-3" for="password">كلمة المرور الجديدة :</label>
                                <input type="password" class="form-control col-md-5 col-sm-6 col-md-6" id="password" name="password" required>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-sm-3 col-md-3" for="password_confirmation">تأكيد كلمة المرور :</label>
                                <input type="password" class="form-control col-md-5 col-sm-6 col-md-6" id="password_confirmation" name="password_confirmation" required>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4 col-md-offset-2 col-sm-6 col-sm-offset-3 col-md-6">
                                    <button type="submit">تأكيد</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


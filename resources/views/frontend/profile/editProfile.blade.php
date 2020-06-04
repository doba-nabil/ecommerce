<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@if($lang == 'ar')
    @section('pageTitle', 'تعديل بياناتي الشخصية')
@else
    @section('pageTitle', 'Edit My Profile')
@endif
@section('frontend-main')
    <section class="security">
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="secur-con my-information profile-box">
                        <h4>@lang('frontend.edit_profile')</h4>
                        <div class="dss" style="padding: 0 10px;">
                            @include('common.done')
                            @include('common.errors')
                        </div>
                        <div class="my-info">
                            <div class="info-content">
                                <div class="col-md-12">
                                    <form action="{{ route('profileEditSave') }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group row">
                                            <div class="col-md-2 col-sm-3 col-xs-4">
                                                <label for="name">@lang('frontend.username')</label>
                                            </div>
                                            <div class="col-md-10 col-sm-8 col-xs-8">
                                                <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-2 col-sm-3 col-xs-4">
                                                <label for="email">@lang('frontend.email')</label>
                                            </div>
                                            <div class="col-md-10 col-sm-8 col-xs-8">
                                                <input type="email" name="email" id="email" value="{{ $user->email }}" disabled class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-2 col-sm-3 col-xs-4">
                                                <label for="country_id">@lang('frontend.country')</label>
                                            </div>
                                            <div class="col-md-10 col-sm-8 col-xs-8">
                                                <select name="country_id" id="country_id" class="form-control select">
                                                    <option value="0">-- @lang('frontend.Chose') --</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}"
                                                                @if ($country->id == $user->country_id)
                                                                selected
                                                                @endif
                                                        >{{ $country['name_'.$lang] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-2 col-sm-3 col-xs-4">
                                                <label for="city_id">@lang('frontend.city')</label>
                                            </div>
                                            <div class="col-md-10 col-sm-8 col-xs-8">
                                                <select name="city_id" id="city_id" class="form-control select">
                                                    <option value="0">-- @lang('frontend.Chose') --</option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}"
                                                                @if ($city->id == $user->city_id)
                                                                selected
                                                                @endif
                                                        >{{ $city['name_'.$lang] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-2 col-sm-3 col-xs-4">
                                                <label for="full_name">@lang('frontend.full_name')</label>
                                            </div>
                                            <div class="col-md-10 col-sm-8 col-xs-8">
                                                <input type="text" name="full_name" id="full_name" value="{{ $user->full_name }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-2 col-sm-3 col-xs-4">
                                                <label for="phone">@lang('frontend.phone')</label>
                                            </div>
                                            <div class="col-md-10 col-sm-8 col-xs-8">
                                                <input type="text" name="phone" id="phone" value="{{ $user->phone }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-sm-3 col-xs-4" for="exampleInputPassword1">@lang('frontend.sex')</label>
                                            <div class="col-md-10 col-xs-8 radioo">
                                                <label class="radio-inline">
                                                    <input type="radio" name="sex" value="سرية" @if ($user->sex == 'سرية' || $user->sex == null)
                                                        checked
                                                    @endif> @lang('frontend.secret')
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="sex" value="ذكر" @if ($user->sex == 'ذكر')
                                                        checked
                                                    @endif> @lang('frontend.male')
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="sex" value="انثى" @if ($user->sex == 'انثى')
                                                    checked
                                                    @endif> @lang('frontend.female')
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-2 col-sm-3 col-xs-4">
                                                <label for="picture">@lang('frontend.avatar')</label>
                                            </div>
                                            <div class="col-md-10 col-sm-8 col-xs-8">
                                                <input type="file" name="picture" id="picture">
                                            </div>
                                        </div>
                                        @if (isset($user->picture))
                                            <div class="form-group row">
                                                <div class="col-md-3 col-md-offset-3">
                                                    <img src="{{ asset('pictures/avatars/' . $user->picture) }}" style="width: 100%; height: 130px;">
                                                    <a href="{{ route('userDeleteImg', $user->id) }}" class="btn btn-danger btn-block" style="border-radius: 0">@lang('frontend.delete')</a>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="form-group row">
                                            <div class="col-md-12 col-sm-4 col-xs-4">
                                                <button style="border-radius: 0;width: 100%" class="btn btn-primary" type="submit">@lang('frontend.send')</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
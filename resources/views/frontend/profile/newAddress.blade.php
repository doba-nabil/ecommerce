<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@section('pageTitle', 'اضافة عنوان جديد')
@section('frontend-main')
    <section class="security">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="secur-con my-information">
                        <h4><a>@lang('frontend.add_address')</a></h4>
                        <div class="dss" style="padding: 0 10px;">
                            @include('common.done')
                            @include('common.errors')
                        </div>
                        <div class="my-info">
                            <div class="info-content">
                                <div class="col-md-10">
                                    <form action="{{ route('addressSave') }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="country_id">@lang('frontend.country')</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <select name="country_id" id="country_id" class="form-control select">
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}">{{ $country['name_'.$lang] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="city">@lang('frontend.city')</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" name="city" id="city" value="{{ old('city') }}" required placeholder="" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="district">@lang('frontend.district')</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" name="district" id="district" value="{{ old('district') }}" required placeholder="" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="street">@lang('frontend.street')</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" name="street" id="street" value="{{ old('street') }}" required placeholder="" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="details">@lang('frontend.house_details')</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" name="details" id="details" value="{{ old('details') }}" required class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="notes">@lang('frontend.notes')</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <textarea name="notes" id="notes" cols="30" rows="5" class="form-control">{{ old('notes') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-9 col-md-offset-3">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="default" value="1"> @lang('frontend.asDeaf')
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3 col-md-offset-3">
                                                    <input type="submit" class="form-control btn btn-primary" value="@lang('frontend.add')">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
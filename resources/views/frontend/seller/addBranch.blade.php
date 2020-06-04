<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@if($lang == 'ar')
    @section('pageTitle', 'اضافة فرع جديد')
@else
    @section('pageTitle', 'Add new Branch')
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
                <div class="col-md-8 col-md-offset-2">
                    <div class="profile-box ">
                        <div class="panel-heading profile-box">
                            <h4 class="panel-title">@lang('frontend.new_branch')</h4>
                        </div>
                        <div class="panel-body">
                            @include('common.done')
                            @include('common.errors')
                            <form action="{{ route('saveBranch') }}" method="post">
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
                                            <input type="text" name="city" id="city" value="{{ old('city') }}" required class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="details">@lang('frontend.details')</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="details" id="details" value="{{ old('details') }}" required class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input style="border-radius: 0" type="submit" class="form-control btn btn-primary" value="@lang('frontend.add')">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
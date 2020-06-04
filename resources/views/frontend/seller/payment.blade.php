<?php
$lang = App::getLocale();
$currency = Session::get('currency');
?>
@extends('frontend.layout.master')
@if($lang == 'ar')
    @section('pageTitle', 'تسجيل متجر جديد')
@else
    @section('pageTitle', 'Store Register Payment')
@endif

@section('frontend-main')
    <section style="margin: 60px 0">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="profile-box">
                        <div class="panel-heading profile-box">
                            <h4 class="panel-title">@lang('frontend.banks')</h4>
                        </div>
                        <div class="panel-body">
                            @include('common.done')
                            @include('common.errors')
                            <p style="margin-bottom: 25px;">@lang('frontend.payments1') {{ $selectedPackage->price }}@lang('frontend.payments2').</p>
                            <table class="table table-bordered table-responsive text-center banks">
                                <tr>
                                    <th>@lang('frontend.bank')</th>
                                    <th>@lang('frontend.owner')</th>
                                    <th>@lang('frontend.account_no')</th>
                                    <th>@lang('frontend.ipan')</th>
                                </tr>
                                @foreach ($banks as $bank)
                                    <tr>
                                        <td>{{ $bank['name_'.$lang] }}</td>
                                        <td>{{ $bank['owner_'.$lang] }}</td>
                                        <td>{{ $bank->account }}</td>
                                        <td>{{ $bank->ipan }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">@lang('frontend.payment_form')</h3>
                        </div>
                        <div class="panel-body">
                            <form method="post" action="{{ route('storeRegisterPaymentSave') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="name">@lang('frontend.username')</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" disabled class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="bank_id">@lang('frontend.bank')</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="bank_id" id="bank_id" class="form-control select">
                                                @foreach ($banks as $bank)
                                                    <option value="{{ $bank->id }}">{{ $bank->name_ar }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                       <div class="col-md-3">
                                           <label for="owner_name">@lang('frontend.owner')</label>
                                       </div>
                                       <div class="col-md-9">
                                           <input type="text" id="owner_name" name="owner_name" required value="{{ old('owner_name') }}" class="form-control">
                                       </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="phone">@lang('frontend.phone')</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" id="phone" name="phone" required value="{{ old('phone') }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="ipan">@lang('frontend.ipan')</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" id="ipan" name="ipan" required value="{{ old('ipan') }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="picture">@lang('frontend.transfer_pic')</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="file" id="picture" name="picture" required>
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
                                        <div class="col-md-3">
                                            <label for=""></label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="submit" value="@lang('frontend.send')" class="form-control btn btn-primary">
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
@extends('frontend.layout.master')
@section('pageTitle', 'اضافة رصيد')
@section('frontend-main')
    <style>
        label {
            margin-bottom: 10px;
        }
    </style>
    <section style="margin: 70px 0">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">@lang('frontend.credit1')</h3>
                        </div>
                        <div class="panel-body">
                            @include('common.done')
                            @include('common.errors')
                            <p style="color: #f4572c; font-size: 16px;">@lang('frontend.credit3')</p>
                            <table class="table table-bordered table-responsive text-center banks">
                                <tr>
                                    <th>@lang('frontend.bank')</th>
                                    <th>@lang('frontend.owner')</th>
                                    <th>@lang('frontend.account_no')</th>
                                    <th>@lang('frontend.ipan')</th>
                                </tr>
                                @foreach ($banks as $bank)
                                    <tr>
                                        <td>{{ $bank->name_ar }}</td>
                                        <td>{{ $bank->owner_ar }}</td>
                                        <td>{{ $bank->account }}</td>
                                        <td>{{ $bank->ipan }}</td>
                                    </tr>
                                @endforeach
                            </table>
                            <h5 style="color: #f4572c; font-size: 16px; margin-bottom: 25px;">@lang('frontend.transfer_form')</h5>
                            <form action="{{ route('addCreditSave') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="user">@lang('frontend.owner')</label>
                                            <input type="text" id="user" value="{{ Auth::user()->name }}" disabled class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="bank_id">@lang('frontend.bank')</label>
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
                                        <div class="col-md-12">
                                            <label for="owner_name">@lang('frontend.transfer_owner')</label>
                                            <input type="text" name="owner_name" id="owner_name" value="{{ old('owner_name') }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="phone">@lang('frontend.phone')</label>
                                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="ipan">@lang('frontend.ipan')</label>
                                            <input type="text" name="ipan" id="ipan" value="{{ old('ipan') }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="value">@lang('frontend.credit4')</label>
                                            <input type="number" name="value" id="value" value="{{ old('value') }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="notes">@lang('frontend.notes')</label>
                                            <textarea name="notes" id="notes" class="form-control" cols="30" rows="5">{{ old('notes') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="picture">@lang('frontend.transfer_pic')</label>
                                            <input type="file" name="picture" id="picture">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="submit" value="@lang('frontend.save')" class="btn btn-primary form-control">
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
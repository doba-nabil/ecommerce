@extends('frontend.layout.master')
@section('pageTitle', 'تعديل عنواني')
@section('frontend-main')
    <section class="security">
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="secur-con my-information profile-box">
                        <h4>@lang('frontend.edit')</h4>
                        <div class="dss" style="padding: 0 10px;">
                            @include('common.done')
                            @include('common.errors')
                        </div>
                        <div class="my-info">
                            <div class="info-content ">
                                <div class="col-md-10">
                                    <form action="{{ route('addressEditSave', $address->id) }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="country_id">@lang('frontend.country')</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <select name="country_id" id="country_id" class="form-control select">
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}"
                                                                    @if ($country->id == $address->country_id)
                                                                    selected
                                                                    @endif
                                                            >{{ $country->name_ar }}</option>
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
                                                    <input type="text" name="city" id="city" value="{{ $address->city }}" required class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="district">@lang('frontend.district')</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" name="district" id="district" value="{{ $address->district }}" required class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="street">@lang('frontend.street')</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" name="street" id="street" value="{{ $address->street }}" required class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="details">@lang('frontend.house_details')</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" name="details" id="details" value="{{ $address->details }}" required class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="notes">@lang('frontend.notes')</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <textarea name="notes" id="notes" cols="30" rows="5" placeholder="اكتب هنا ملاحظاتك ان وجدت" class="form-control">{{ $country->notes }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-9 col-md-offset-3">
                                                    <input style="width: 100%;" type="submit" class="form-control btn btn-primary" value="@lang('frontend.update')">
                                                </div>
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
@extends('frontend.layout.master')
@section('pageTitle', 'رسالة جديدة')
@section('frontend-main')
<section class="inbox">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="profile-box">
                    <div class="panel-heading profile-box">
                        <h3 class="panel-title">@lang('frontend.new_msg_to) {{ $to_id->name }}</h3>
                    </div>
                    <div class="panel-body">
                        @include('common.errors')
                        <form action="{{ route('storeMessages', $to_id->id) }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="title">@lang('frontend.title)</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" id="title" name="title" class="form-control" placeholder="عنوان الرسالة" value="{{ old('title') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="body">@lang('frontend.msd_body)</label>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea name="body" id="body" cols="30" rows="10" class="form-control" placeholder="نص الرسالة"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input style="width: 100%" type="submit" class="form-control btn btn-primary" value="@lang('frontend.send1)">
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
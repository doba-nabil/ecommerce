@extends('backend.layout.master')
@section('backend-main')
    <div class="backend">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">ارسال رسالة الى البريد {{ $contact->email }}</div>
                    <div class="panel-body">
                        @include('common.done')
                        @include('common.errors')
                        <p class="kk">{{ $contact->description }}</p>
                        <form action="{{ route('contactReplySave', $contact->id) }}" method="post">
                            {{ csrf_field() }}
                            @include('common.errors')
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="title">العنوان</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" placeholder="عنوان الرسالة">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="msg">الرسالة</label>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea name="msg" id="msg" class="form-control" rows="10" placeholder="مضمون الرسالة">{{ old('msg') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2">
                                        <input type="submit" value="ارسال" class="btn btn-primary form-control">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
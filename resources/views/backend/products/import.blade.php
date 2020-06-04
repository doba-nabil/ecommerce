@extends('backend.layout.master')
@section('backend-main')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">استيراد المنتجات من ملف Csv</div>
                <div class="panel-body">
                    @include('common.done')
                    @include('common.errors')
                    <form method="post" action="{{ route('importP') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="file">ملف الاستيراد</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="file" id="file" name="file" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-2">
                                    <input type="submit" class="form-control btn btn-success" value="استيراد">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

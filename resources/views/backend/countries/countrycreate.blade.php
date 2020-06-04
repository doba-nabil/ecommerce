@extends('backend.layout.master')
@section('backend-main')
    <div class="backend">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">اضافة دولة جديدة</h3>
                    </div>
                    <div class="panel-body">
                        @include('common.done')
                        @include('common.errors')
                        <form method="post" action="{{ route('countries.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="name_ar">الاسم بالعربية</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ old('name_ar') }}" required placeholder="اسم الدولة باللغة العربية">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="name_en">الاسم بالانجليزية</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name_en') }}" required placeholder="اسم الدولة باللغة الانجليزية">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="code">الكود</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}" required placeholder="كود الدولة">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="picture">العلم</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="file" id="picture" name="picture" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2">
                                        <input type="submit" class="form-control btn btn-success" value="اضافة">
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
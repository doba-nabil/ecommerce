@extends('backend.layout.master')
@section('backend-main')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">اضافة تصنيف جديد</div>
                <div class="panel-body">
                    @include('common.done')
                    @include('common.errors')
                    <form method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name_ar">الاسم بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ old('name_ar') }}" required placeholder="اسم التصنيف باللغة العربية">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name_en">الاسم بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name_en') }}" required placeholder="اسم التصنيف باللغة الانجليزية">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="order">الترتيب</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="order" name="order" value="{{ old('order') }}" required placeholder="ترتيب ظهور التصنيف">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="picture">صورة التصنيف</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="file" id="picture" name="picture" required>
                                </div>
                            </div>
                        </div>

                        {{--<div class="form-group">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-md-2">--}}
                                    {{--<label for="banner">بانر التصنيف</label>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-10">--}}
                                    {{--<input type="file" id="picture" name="banner">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

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
@endsection

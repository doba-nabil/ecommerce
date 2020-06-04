@extends('backend.layout.master')
@section('backend-main')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">اضافة صفحة جديدة</div>
                <div class="panel-body">
                    @include('common.done')
                    @include('common.errors')
                    <form method="post" action="{{ route('pages.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="title_ar">العنوان بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="title_ar" name="title_ar" value="{{ old('title_ar') }}" required placeholder="عنوان الصفحة باللغة العربية">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="title_en">العنوان بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="title_en" name="title_en" value="{{ old('title_en') }}" placeholder="عنوان الصفحة باللغة الانجليزية">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="description_ar">التفاصيل بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea name="description_ar" id="description_ar" cols="30" rows="5" class="form-control selector">{{ old('description_ar') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="description_en">التفاصيل بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea name="description_en" id="description_en" cols="30" rows="5" class="form-control selector">{{ old('description_en') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="menu">ظهور في القائمة السفلية</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="menu" id="menu" class="form-control select">
                                        <option value="0">نعم</option>
                                        <option value="1">لا</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <input value="1" type="checkbox" name="status"><label style="margin-right: 5px;">مفعل</label>
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
@endsection

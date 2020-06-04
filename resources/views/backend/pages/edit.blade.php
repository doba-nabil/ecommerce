@extends('backend.layout.master')
@section('backend-main')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">تعديل بيانات الصفحة</div>
                <div class="panel-body">
                    @include('common.done')
                    @include('common.errors')
                    <form method="post" action="{{ route('pages.update', $page->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="title_ar">العنوان بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="title_ar" name="title_ar" value="{{ $page->title_ar }}" required placeholder="عنوان الصفحة باللغة العربية">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="title_en">العنوان بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="title_en" name="title_en" value="{{ $page->title_en }}" placeholder="عنوان الصفحة باللغة الانجليزية">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="description_ar">التفاصيل بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea name="description_ar" id="description_ar" cols="30" rows="5" class="form-control selector">{{ $page->description_ar }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="description_en">التفاصيل بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea name="description_en" id="description_en" cols="30" rows="5" class="form-control selector">{{ $page->description_en }}</textarea>
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
                                        <option value="0" @if ($page->menu == 0) selected @endif>نعم</option>
                                        <option value="1" @if ($page->menu == 1) selected @endif>لا</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <input value="1" type="checkbox" name="status" @if ($page->status == 1) checked @endif><label style="margin-right: 5px;">مفعل</label>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-2">
                                    <input type="submit" class="form-control btn btn-success" value="تحديث">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

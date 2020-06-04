@extends('backend.layout.master')
@section('backend-main')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">تعديل بيانات التصنيف "{{ $category->name_ar }}"</div>
                <div class="panel-body">
                    @include('common.done')
                    @include('common.errors')
                    <form method="post" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name_ar">الاسم بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ $category->name_ar }}" required placeholder="اسم التصنيف باللغة العربية">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name_en">الاسم بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name_en" name="name_en" value="{{ $category->name_en }}" required placeholder="اسم التصنيف باللغة الانجليزي">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="order">الترتيب</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="order" name="order" value="{{ $category->order }}" required placeholder="ترتيب التصنيف">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
<div class="row">
<div class="col-md-2">
<label for="picture">صورة التصنيف</label>
</div>
<div class="col-md-10">
<input type="file" id="picture" name="picture">
</div>
</div>
</div>

<div class="form-group">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-2">
<div class="image-preview" style="margin-bottom: 50px;">
<img src="{{ asset('pictures/categories/' . $category->picture) }}" alt="{{ $category->name_ar }}">
</div>
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
                        {{--@if (isset($category->banner))--}}
                            {{--<div class="form-group">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-md-2"></div>--}}
                                    {{--<div class="col-md-3">--}}
                                        {{--<div class="image-preview" style="margin-bottom: 50px;">--}}
                                            {{--<img src="{{ asset('pictures/categories_banners/' . $category->banner) }}" alt="{{ $category->name_ar }}">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--@endif--}}
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

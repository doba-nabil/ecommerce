@extends('backend.layout.master')
@section('backend-main')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">اضافة تصنيف فرعي جديد</div>
                <div class="panel-body">
                    @include('common.done')
                    @include('common.errors')
                    <form method="post" action="{{ route('subsubcategories.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name_ar">الاسم بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ old('name_ar') }}" required placeholder="اسم التصنيف الفرعي باللغة العربية">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name_en">الاسم بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name_en') }}" required placeholder="اسم التصنيف الفرعي باللغة الانجليزية">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="subcategory_id">التصنيف الأب</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="subcategory_id" id="subcategory_id" class="form-control select">
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->name_ar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="order">الترتيب</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="order" name="order" value="{{ old('order') }}" required placeholder="ترتيب ظهور التصنيف الفرعي">
                                </div>
                            </div>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-md-2">--}}
                                    {{--<label for="picture">الصورة</label>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-10">--}}
                                    {{--<input type="file" id="picture" name="picture" required>--}}
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

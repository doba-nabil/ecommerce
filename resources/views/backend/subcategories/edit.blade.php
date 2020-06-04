@extends('backend.layout.master')
@section('backend-main')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">تعديل بيانات التصنيف الفرعي "{{ $subcategory->name_ar }}"</div>
                <div class="panel-body">
                    @include('common.done')
                    @include('common.errors')
                    <form method="post" action="{{ route('subcategories.update', $subcategory->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name_ar">الاسم بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ $subcategory->name_ar }}" required placeholder="اسم التصنيف باللغة العربية">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name_en">الاسم بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name_en" name="name_en" value="{{ $subcategory->name_en }}" required placeholder="اسم التصنيف باللغة الانجليزي">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="category_id">التصنيف الأب</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="category_id" id="category_id" class="form-control select">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if ($category->id == $subcategory->category_id)
                                                    selected
                                                @endif
                                            >{{ $category->name_ar }}</option>
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
                                    <input type="text" class="form-control" id="order" name="order" value="{{ $subcategory->order }}" required placeholder="ترتيب ظهور التصنيف الفرعي">
                                </div>
                            </div>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-md-2">--}}
                                    {{--<label for="picture">صورة التصنيف</label>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-10">--}}
                                    {{--<input type="file" id="picture" name="picture">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-md-2"></div>--}}
                                {{--<div class="col-md-10">--}}
                                    {{--<div class="image-preview" style="margin-bottom: 20px;">--}}
                                        {{--<img src="{{ asset('pictures/subcategories/' . $subcategory->picture) }}" alt="{{ $subcategory->name_ar }}">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

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

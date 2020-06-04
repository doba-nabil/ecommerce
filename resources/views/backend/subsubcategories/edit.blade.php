@extends('backend.layout.master')
@section('backend-main')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">تعديل بيانات التصنيف الفرعي "{{ $subsubcategory->name_ar }}"</div>
                <div class="panel-body">
                    @include('common.done')
                    @include('common.errors')
                    <form method="post" action="{{ route('subsubcategories.update', $subsubcategory->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name_ar">الاسم بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ $subsubcategory->name_ar }}" required placeholder="اسم التصنيف باللغة العربية">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name_en">الاسم بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name_en" name="name_en" value="{{ $subsubcategory->name_en }}" required placeholder="اسم التصنيف باللغة الانجليزي">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="category_id">التصنيف الأب</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="subcategory_id" id="subcategory_id" class="form-control select">
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}"
                                                @if ($subcategory->id == $subsubcategory->subcategory_id)
                                                    selected
                                                @endif
                                            >{{ $subcategory->name_ar }}</option>
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
                                    <input type="text" class="form-control" id="order" name="order" value="{{ $subsubcategory->order }}" required placeholder="ترتيب ظهور التصنيف الفرعي">
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
                                        {{--<img src="{{ asset('pictures/subsubcategories/' . $subsubcategory->picture) }}" alt="{{ $subsubcategory->name_ar }}">--}}
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

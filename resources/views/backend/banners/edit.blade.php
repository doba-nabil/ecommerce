@extends('backend.layout.master')
@section('backend-main')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">تعديل بيانات البانر</div>
                <div class="panel-body">
                    @include('common.done')
                    @include('common.errors')
                    <form method="post" action="{{ route('banners.update', $banner->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="title_ar">العنوان بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="title_ar" name="title_ar" value="{{ $banner->title_ar }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="title_en">العنوان بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="title_en" name="title_en" value="{{ $banner->title_en }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="text_ar">النص بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="text_ar" name="text_ar" value="{{ $banner->text_ar }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="text_en">النص بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="text_en" name="text_en" value="{{ $banner->text_en }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="link">الرابط</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="link" name="link" value="{{ $banner->link }}" required placeholder="الرابط الذي سيؤدي اليه البانر">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="picture">صورة البانر</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="file" id="picture" name="picture">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <div class="image-preview" style="margin-bottom: 50px;">
                                        <img src="{{ asset('pictures/banners/' . $banner->picture) }}" alt="{{ $banner->name_ar }}">
                                    </div>
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

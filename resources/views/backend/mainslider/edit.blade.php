@extends('backend.layout.master')
@section('backend-head')
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
@endsection
@section('backend-main')
    <div class="backend">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">تعديل السلايدر</div>
                    <div class="panel-body">
                        @include('common.done')
                        @include('common.errors')
                        <form method="post" action="{{ route('mainslider.update', $mainslider->id) }}"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="col-md-12">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="title_ar">النص باللغة العربية</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="title_ar" name="title_ar"
                                                   value="{{ $mainslider->title_ar }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="title_en">النص باللغة الانجليزية</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="title_en" name="title_en"
                                                   value="{{ $mainslider->title_en }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="link">الرابط</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="link" name="link"
                                                   value="{{ $mainslider->link }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="position">مكان السلايدر</label>
                                        </div>
                                        <div class="col-md-10">
                                            <select name="position" id="position"  class="form-control select">
                                                <option value="0" @if ($mainslider->position == 0) selected @endif>السلايدر في الـأعلى</option>
                                                <option value="1" @if ($mainslider->position == 1) selected @endif>السلايدر في الأسفل</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="image">الصوره التعريفيه</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="file" id="image" name="image">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-2">
                                            <img style="width: 100%; height: 100px; border-radius: 8px;"
                                                 src="{{ asset('pictures/mainslider/' .  $mainslider->image ) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-2">
                                            <input type="submit" class="btn btn-success form-control" value="تحديث">
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
@section('backend-footer')
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <script>
        $(".chosen-select").chosen({
            no_results_text: "Oops, nothing found!"
        })
    </script>
@endsection
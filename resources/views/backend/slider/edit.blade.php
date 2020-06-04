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
                        <form method="post" action="{{ route('slider.update', $slider->id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="col-md-12">

                                <label style="margin-left: 10px" for="image">الصوره التعريفيه</label><br>
                                <img style="width: 100px;height: 100px;border-radius: 50%" src="{{ asset('pictures/slider/' .  $slider->image ) }}">
                                <input style="margin-top: 10px" type="file" id="image" name="image" >


                                <div class="form-group">
                                    <label for="link">اضف رابط </label>
                                    <input type="text" class="form-control" id="link" name="link" value="{{ $slider->link }}">
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
                                                @if ($category->id == $slider->category_id)
                                                    selected
                                                @endif
                                            >{{ $category->name_ar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div cl


                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-primary form-control" value="تحديث">
                                        </div>
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
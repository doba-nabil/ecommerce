@extends('backend.layout.master')
@section('backend-head')
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
@endsection
@section('backend-main')
    <div class="backend">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">اضافة سلايدر</div>
                    <div class="panel-body">
                        @include('common.done')
                        @include('common.errors')
                        <form method="post" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-md-12">

                                <div class="form-group col-lg-4">
                                    <label for="image">الصوره التعريفيه</label>
                                    <input type="file" id="image" name="image" >
                                </div>


                                <div  class="form-group col-lg-8">
                                    <label for="link">اضف رابط </label>
                                    <input type="text" class="form-control" id="link" name="link" placeholder="رابط ">
                                </div>
                                
                                <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="category_id">التصنيف الأب</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="category_id" id="category_id" class="form-control select">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name_ar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                            </div>

                            <div class="col-lg-12">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-primary form-control" value="تحديث">
                                        </div>
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
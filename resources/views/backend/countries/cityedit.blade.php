@extends('backend.layout.master')
@section('backend-main')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">تعديل بيانات المدينة "{{ $city->name_ar }}"</h3>
                </div>
                <div class="panel-body">
                    @include('common.errors')
                    @include('common.done')
                    <form method="post" action="{{ route('cities.update', $city->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name_ar">الاسم</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ $city->name_ar }}" placeholder="اسم المدينة باللغة العربية">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name_en">Name</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name_en" name="name_en" value="{{ $city->name_en }}" placeholder="اسم المدينة باللغة الانجليزية">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="country_id">الدولة</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="country_id" id="country_id" class="select form-control">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                @if ($country->id == $city->country_id)
                                                    selected
                                                @endif
                                            >{{ $country->name_ar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-2">
                                    <input type="submit" class="form-control btn btn-primary" value="تحديث">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

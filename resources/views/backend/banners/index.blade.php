@extends('backend.layout.master')
@section('backend-main')
    <div class="backend">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">البنرات أعلى الموقع</div>
                    <div class="panel-body">
                        @include('common.done')
                        @include('common.errors')
                        <div class="table-responsive">
                            <table id="example" class="table table-hover display table-striped table-bordered table-hover pb-30" >
                                <thead>
                                <tr>
                                    <th style="width: 5%">ID</th>
                                    <th>الصورة</th>
                                    <th>الاسم</th>
                                    <th>name</th>
                                    <th>خيارات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($banners as $banner)
                                    <tr class="odd gradeX">
                                        <td>{{ $banner->id }}</td>
                                        <td>
                                            <div class="image-preview-small">
                                                <img src="{{ asset('pictures/banners/' . $banner->picture) }}" alt="{{ $banner->name_ar }}" style="width: 250px;height: 100px;border-radius: 10px" >
                                            </div>
                                        </td>
                                        <td>{{ $banner->title_ar }}</td>
                                        <td>{{ $banner->title_en }}</td>
                                        <td>
                                            <ul class="list-inline list-unstyled text-center">
                                                <li>
                                                    <a href="{{ route('banners.edit', $banner->id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="تعديل" style="padding: 8px 12px;"><i class="zmdi zmdi-edit"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
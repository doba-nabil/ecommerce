@extends('backend.layout.master')
@section('backend-main')
    <div class="backend">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">جميع الماركات</div>
                    <form action="{{ route('brands.show', 1) }}" method="get">
                        <div class="panel-body">
                            @include('common.done')
                            @include('common.errors')
                            <div class="table-responsive">
                                <table id="example" class="table table-hover display table-striped table-bordered table-hover pb-30" >
                                    <thead>
                                    <tr>
                                        <th style="width: 3%"></th>
                                        <th>الاسم</th>
                                        <th>name</th>
                                        <th>القسم</th>
                                        <th style="width: 20%">خيارات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($brands as $brand)
                                        <tr class="odd gradeX">
                                            <td><input value="{{ $brand->id }}" type="checkbox" name="select[]"></td>
                                            <td>{{ $brand->name_ar }}</td>
                                            <td>{{ $brand->name_en }}</td>
                                            <td><a href="{{ route('categories.edit', $brand->category->id) }}">{{ $brand->category->name_ar }}</a></td>
                                            <td>
                                                <ul class="list-inline list-unstyled text-center">
                                                    <li>
                                                        <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="تعديل" style="padding: 8px 12px;"><i class="zmdi zmdi-edit"></i></a>
                                                    </li>
                                                    <li>
                                                        <form method="post" action="{{ route('brands.destroy', $brand->id) }}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button class="btn btn-danger btn-sm confirm" data-toggle="tooltip" data-placement="top" title="حذف" style="padding: 8px 12px;"><i class="zmdi zmdi-delete"></i></button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <select name="option" id="option" style="width: 15%; font-size: 12px;">
                                <option value="2">حذف المحدد</option>
                            </select>
                            <input type="submit" class="btn btn-default btn-sm" value="تطبيق" style="margin-top: 5px;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
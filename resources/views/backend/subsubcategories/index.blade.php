@extends('backend.layout.master')
@section('backend-main')
    <div class="backend">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">جميع التصنيفات الفرعية</div>
                    <form action="{{ route('subsubcategories.show', 1) }}" method="get">
                        <div class="panel-body">
                            @include('common.done')
                            @include('common.errors')
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th style="width: 3%"></th>
                                        <th>الاسم</th>
                                        <th>name</th>
                                        <th>التصنيف الأب</th>
                                        <th>التصنيف الفرعي الأب</th>
                                        <th style="width: 20%">خيارات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($subsubcategories as $subsubcategory)
                                        <tr class="odd gradeX">
                                            <td><input value="{{ $subsubcategory->id }}" type="checkbox" name="select[]"></td>
                                            <td>{{ $subsubcategory->name_ar }}</td>
                                            <td>{{ $subsubcategory->name_en }}</td>
                                            <td><a href="{{ route('categories.edit', $subsubcategory->subcategory->category->id) }}">{{ $subsubcategory->subcategory->category->name_ar }}</a></td>
                                            <td><a href="{{ route('subcategories.edit', $subsubcategory->subcategory->id) }}">{{ $subsubcategory->subcategory->name_ar }}</a></td>
                                            <td>
                                                <ul class="list-inline list-unstyled text-center">
                                                    <li>
                                                        <a href="{{ route('subsubcategories.edit', $subsubcategory->id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="تعديل" style="padding: 8px 12px;"><i class="zmdi zmdi-edit"></i></a>
                                                    </li>
                                                    <li>
                                                        <form method="post" action="{{ route('subsubcategories.destroy', $subsubcategory->id) }}">
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
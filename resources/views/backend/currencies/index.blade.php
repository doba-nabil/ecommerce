@extends('backend.layout.master')
@section('backend-main')
    <div class="backend">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">جميع العملات</div>
                    <div class="panel-body">
                        @include('common.done')
                        @include('common.errors')
                        <div class="table-responsive">
                            <table id="example" class="table table-hover display table-striped table-bordered table-hover pb-30" >
                                <thead>
                                <tr>
                                    <th style="width: 5%">ID</th>
                                    <th>الاسم</th>
                                    <th>name</th>
                                    <th>الدولة</th>
                                    <th>مفعل</th>
                                    <th>خيارات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($currencies as $currency)
                                    <tr class="odd gradeX">
                                        <td>{{ $currency->id }}</td>
                                        <td>{{ $currency->name_ar }}</td>
                                        <td>{{ $currency->name_en }}</td>
                                        <td><a href="{{ route('countries.edit', $currency->country->id) }}">{{ $currency->country->name_ar }}</a></td>
                                        <td>
                                            @if ($currency->status == 1)
                                                <i class="fa fa-check" aria-hidden="true" style="color: #0c803e;"></i>
                                            @else
                                                <i class="fa fa-remove" style="color: red;"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <ul class="list-inline list-unstyled text-center">
                                                <li>
                                                    <a href="{{ route('currencies.edit', $currency->id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="تعديل" style="padding: 8px 12px;"><i class="zmdi zmdi-edit"></i></a>
                                                </li>
                                                <li>
                                                    <form method="post" action="{{ route('currencies.destroy', $currency->id) }}">
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
                </div>
            </div>
        </div>
    </div>
@endsection
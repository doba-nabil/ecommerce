@extends('backend.layout.master')
@section('backend-main')
    <div class="backend">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">الطلبات الجديدة</div>
                    <div class="panel-body">
                        @include('common.done')
                        @include('common.errors')
                        <div class="table-responsive">
                            <table id="example" class="table table-hover display table-striped table-bordered table-hover pb-30" >
                                <thead>
                                <tr>
                                    <th style="width: 5%">ID</th>
                                    <th>الاسم</th>
                                    <th>رقم الهاتف</th>
                                    <th>البريد الالكتروني</th>
                                    <th>الاجمالي</th>
                                    <th>خيارات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($orders as $order)
                                    <tr class="odd gradeX">
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->price }} ريال</td>
                                        <td>
                                            <ul class="list-inline list-unstyled text-center">
                                                <li>
                                                    <a href="{{ route('checkouts.show', $order->id) }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="عرض" style="padding: 8px 12px;"><i class="zmdi zmdi-eye"></i></a>
                                                </li>
                                                <li>
                                                    <form method="post" action="{{ route('checkouts.destroy', $order->id) }}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button class="btn btn-danger btn-sm confirm" data-toggle="tooltip" data-placement="top" title="حذف" style="padding: 8px 12px;"><i class="zmdi zmdi-delete"></i></button>                                                    </form>
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
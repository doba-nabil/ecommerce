@extends('backend.layout.master')
@section('backend-main')
    <div class="backend">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">متاجر بانتظار التفعيل</div>
                    <div class="panel-body">
                        @include('common.done')
                        @include('common.errors')
                        <div class="table-responsive">
                            <table id="example" class="table table-hover display table-striped table-bordered table-hover pb-30" >
                                <thead>
                                <tr>
                                    <th style="width: 5%">ID</th>
                                    <th>اسم المتجر</th>
                                    <th>صاحب المتجر</th>
                                    <th>رقم الهاتف</th>
                                    <th style="width: 30%">خيارات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($stores as $store)
                                    <tr class="odd gradeX">
                                        <td>{{ $store->id }}</td>
                                        <td>{{ $store->name_ar }}</td>
                                        <td><a href="{{ route('users.edit', $store->id) }}">{{ $store->user->name }}</a></td>
                                        <td>{{ $store->phone }}</td>
                                        <td>
                                            <ul class="list-inline list-unstyled text-center">
                                                @if (isset($store->user->store_payment->id))
                                                    <li>
                                                        <a href="{{ route('store_payments.show', $store->user->store_payment->id) }}" class="btn btn-sm btn-success"data-toggle="tooltip" data-placement="top" title="نموذج الايداع" style="padding: 8px 12px;"><i class="zmdi zmdi-file"></i></a>
                                                    </li>
                                                @endif
                                                <li>
                                                    <a href="{{ route('stores.edit', $store->id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="تعديل" style="padding: 8px 12px;"><i class="zmdi zmdi-edit"></i></a>
                                                </li>
                                                <li>
                                                    <form method="post" action="{{ route('stores.destroy', $store->id) }}">
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
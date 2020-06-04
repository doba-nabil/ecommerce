@extends('backend.layout.master')
@section('backend-main')
    <div class="backend">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">نماذج تحويل المتاجر</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-hover display table-striped table-bordered table-hover pb-30" >
                                <thead>
                                <tr>
                                    <th style="width: 5%">ID</th>
                                    <th>اسم المتجر</th>
                                    <th>صاحب المتجر</th>
                                    <th>البنك</th>
                                    <th>صاحب الحساب</th>
                                    <th>خيارات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($payments as $payment)
                                    <tr class="odd gradeX">
                                        <td>{{ $payment->id }}</td>
                                        <td><a href="{{ route('stores.edit', $payment->user->store->id) }}">{{ $payment->user->store->name_ar }}</a></td>
                                        <td><a href="{{ route('users.edit', $payment->user->id) }}">{{ $payment->user->name }}</a></td>
                                        <td>{{ $payment->bank->name_ar }}</td>
                                        <td>{{ $payment->owner_name }}</td>
                                        <td>
                                            <ul class="list-inline list-unstyled text-center">
                                                <li>
                                                    <a href="{{ route('store_payments.show', $payment->id) }}" class="btn btn-sm btn-primary"data-toggle="tooltip" data-placement="top" title="عرض" style="padding: 8px 12px;"><i class="zmdi zmdi-eye"></i></a>
                                                </li>
                                                <li>
                                                    <form method="post" action="{{ route('store_payments.destroy', $payment->id) }}">
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
@extends('backend.layout.master')
@section('backend-main')
    <div class="backend">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">جميع المتاجر</div>
                    <form action="{{ route('stores.show', 1) }}" method="get">
                        <div class="panel-body">
                            @include('common.done')
                            @include('common.errors')
                            <div class="table-responsive">
                                <table id="example" class="table table-hover display table-striped table-bordered table-hover pb-30" >
                                    <thead>
                                    <tr>
                                        <th style="width: 3%"></th>
                                        <th>اسم المتجر</th>
                                        <th>صاحب المتجر</th>
                                        <th>رقم الهاتف</th>
                                        <th>مفعل</th>
                                        <th>خيارات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($stores as $store)
                                        <tr class="odd gradeX">
                                            <td><input value="{{ $store->store->id }}" type="checkbox" name="select[]"></td>
                                            <td>{{ $store->store->name_ar }}</td>
                                            <td><a href="{{ route('users.edit', $store->id) }}">{{ $store->name }}</a></td>
                                            <td>{{ $store->store->phone }}</td>
                                            <td>
                                                @if ($store->store->status == 1)
                                                    <i class="fa fa-check" aria-hidden="true" style="color: #0c803e;"></i>
                                                @else
                                                    <i class="fa fa-remove" style="color: red;"></i>
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="list-inline list-unstyled text-center">
                                                    @if (isset($store->store_payment->id))
                                                        <li>
                                                            <a href="{{ route('store_payments.show', $store->store_payment->id) }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="نموذج الايداع" style="padding: 8px 12px;"><i class="zmdi zmdi-file"></i></a>
                                                        </li>
                                                    @endif
                                                    <li>
                                                        <a href="{{ route('stores.edit', $store->store->id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="تعديل" style="padding: 8px 12px;"><i class="zmdi zmdi-edit"></i></a>
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
                        <div class="panel-footer">
                            <select name="option" id="option" style="width: 15%; font-size: 12px;">
                                <option value="0">تفعيل المحدد</option>
                                <option value="1">تعطيل المحدد</option>
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
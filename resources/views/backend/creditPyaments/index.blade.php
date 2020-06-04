@extends('backend.layout.master')
@section('backend-main')
    <div class="backend">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">جميع النماذج</div>
                    <div class="panel-body">
                        @include('common.done')
                        @include('common.errors')
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th style="width: 5%">ID</th>
                                    <th>العضو</th>
                                    <th>صاحب التحويل</th>
                                    <th>الرصيد الحالي للعضو</th>
                                    <th>المبلغ المراد اضافته</th>
                                    <th>خيارات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($credits_payments as $credits_payment)
                                    <tr class="odd gradeX">
                                        <td>{{ $credits_payment->id }}</td>
                                        <td><a href="{{ route('users.edit', $credits_payment->user->id) }}">{{ $credits_payment->user->name }}</a></td>
                                        <td>{{ $credits_payment->owner_name }}</td>
                                        <td>{{ $credits_payment->user->credit }} ريال سعودي</td>
                                        <td>{{ $credits_payment->value }} ريال سعودي</td>
                                        <td>
                                            <ul class="list-inline list-unstyled text-center">
                                                <li>
                                                    <a href="{{ route('credit.show', $credits_payment->id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="عرض" style="padding: 8px 12px;"><i class="zmdi zmdi-eye"></i></a>
                                                </li>
                                                @if ($credits_payment->new == 0)
                                                    <li>
                                                        <form method="post" action="{{ route('credit.update', $credits_payment->id) }}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('put') }}
                                                            <button class="btn btn-success btn-sm confirm" data-toggle="tooltip" data-placement="top" title="اضافة الرصيد" style="padding: 8px 12px;"><i class="zmdi zmdi-plus"></i></button>
                                                        </form>
                                                    </li>
                                                @endif
                                                <li>
                                                    <form method="post" action="{{ route('credit.destroy', $credits_payment->id) }}">
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
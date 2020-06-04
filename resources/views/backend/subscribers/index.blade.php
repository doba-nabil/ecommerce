@extends('backend.layout.master')
@section('backend-main')
    <div class="backend">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">المشتركين في القائمة البريدية</div>
                    <div class="panel-body">
                        @include('common.done')
                        @include('common.errors')
                        <div class="table-responsive">
                            <table id="example" class="table table-hover display table-striped table-bordered table-hover pb-30" >                                <thead>
                                <tr>
                                    <th style="width: 5%">ID</th>
                                    <th>البريد الالكتروني</th>
                                    <th>خيارات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($subscribers as $subscriber)
                                    <tr class="odd gradeX">
                                        <td>{{ $subscriber->id }}</td>
                                        <td>{{ $subscriber->email }}</td>
                                        <td>
                                            <ul class="list-inline list-unstyled text-center">
                                                <li>
                                                    <form method="post" action="{{ route('deleteSub', $subscriber->id) }}">
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
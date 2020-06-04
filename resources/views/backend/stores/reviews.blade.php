@extends('backend.layout.master')
@section('backend-main')
    <div class="backend">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">جميع المراجعات</div>
                    <div class="panel-body">
                        @include('common.done')
                        @include('common.errors')
                        <div class="table-responsive">
                            <table id="example" class="table table-hover display table-striped table-bordered table-hover pb-30" >
                                <thead>
                                <tr>
                                    <th style="width: 5%">ID</th>
                                    <th>اسم المتجر</th>
                                    <th>صاحب المراجعة</th>
                                    <th>البريد الالكتروني</th>
                                    <th>مفعل</th>
                                    <th>خيارات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($reviews as $review)
                                    <tr class="odd gradeX">
                                        <td>{{ $review->id }}</td>
                                        <td><a href="{{ route('stores.edit', $review->store->id) }}">{{ $review->store->name_ar }}</a></td>
                                        <td>{{ $review->name }}</td>
                                        <td>{{ $review->email }}</td>
                                        <td>
                                            @if ($review->status == 1)
                                                <i class="fa fa-check" aria-hidden="true" style="color: #0c803e;"></i>
                                            @else
                                                <i class="fa fa-remove" style="color: red;"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <ul class="list-inline list-unstyled text-center">
                                                <li>
                                                    <a href="{{ route('reviews.show', $review->id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="عرض" style="padding: 8px 12px;"><i class="zmdi zmdi-eye"></i></a>
                                                </li>
                                                <li>
                                                    <form method="post" action="{{ route('reviews.destroy', $review->id) }}">
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
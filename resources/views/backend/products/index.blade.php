@extends('backend.layout.master')
@section('backend-main')
    <div class="backend">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>جميع المنتجات</span>
                    </div>
                    <form action="{{ route('products.show', 1) }}" method="get">
                        <div class="panel-body">
                            @include('common.done')
                            @include('common.errors')
                            <div class="table-responsive">
                                <table id="example" class="table table-hover display table-striped table-bordered table-hover pb-30" >
                                    <thead>
                                    <tr>
                                        <th style="width: 3%"></th>
                                        <th>الاسم</th>
                                        <th>المتجر</th>
                                        <th>السعر</th>
                                        <th>مفعل</th>
                                        <th>خيارات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($products as $product)
                                        <tr class="odd gradeX">
                                            <td><input value="{{ $product->id }}" type="checkbox" name="select[]"></td>
                                            <td>{{ mb_strimwidth($product->name_ar , 0, 50, "...") }}</td>
                                            <td><a href="{{ route('stores.edit', $product->store->id) }}">{{ $product->store->name_ar }}</a></td>
                                            <td>{{ $product->price }} {{ $product->currency->name_ar }}</td>
                                            <td>
                                                @if ($product->status == 1)
                                                    <i class="fa fa-check" aria-hidden="true" style="color: #0c803e;"></i>
                                                @else
                                                    <i class="fa fa-remove" style="color: red;"></i>
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="list-inline list-unstyled text-center">
                                                    <li>
                                                        <a href="{{ route('productComments', $product->id) }}" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="التعليقات" style="padding: 8px 12px;"><i class="zmdi zmdi-comment-text-alt"></i></a>
                                                    </li>
                                                    @if ($product->status == 1)
                                                        <li>
                                                            <a href="{{ route('productDisapprove', $product->id) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="تعطيل" style="padding: 8px 12px;"><i class="zmdi zmdi-close"></i></a>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a href="{{ route('productApprove', $product->id) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="تفعيل" style="padding: 8px 12px;"><i class="zmdi zmdi-check"></i></a>
                                                        </li>
                                                    @endif
                                                    <li>
                                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="تعديل" style="padding: 8px 12px;"><i class="zmdi zmdi-edit"></i></a>
                                                    </li>
                                                    <li>
                                                        <form method="post" action="{{ route('products.destroy', $product->id) }}">
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
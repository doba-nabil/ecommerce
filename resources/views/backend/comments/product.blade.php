@extends('backend.layout.master')
@section('backend-main')
    <div class="backend">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">تعليقات المنتج "{{ $product->name_ar }}"</div>
                    <div class="panel-body">
                        @include('common.done')
                        @include('common.errors')
                        <div class="table-responsive">
                            <table id="example" class="table table-hover display table-striped table-bordered table-hover pb-30" >                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>الكاتب</th>
                                    <th>عنوان الاعلان</th>
                                    <th>خيارات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($comments as $comment)
                                    <tr class="odd gradeX">
                                        <td>{{ $comment->id }}</td>
                                        <td><a href="{{ route('users.edit', $comment->user->id) }}">{{ $comment->user->name }}</a></td>
                                        <td><a href="{{ route('products.edit', $comment->product->id) }}">{{ mb_strimwidth($comment->product->name_ar , 0, 70, "...") }}</a></td>
                                        <td>
                                            <ul class="list-inline list-unstyled text-center">
                                                <li>
                                                    <a data-toggle="modal" data-target="#comment-{{ $comment->id }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="عرض التعليق" style="padding: 8px 12px;"><i class="zmdi zmdi-eye"></i></a>
                                                </li>
                                                <!-- Modal -->
                                                <div class="modal fade" id="comment-{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                {{ $comment->comment }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <li>
                                                    <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="تعديل" style="padding: 8px 12px;"><i class="zmdi zmdi-edit"></i></a>
                                                </li>
                                                @if ($comment->status == 1)
                                                    <li>
                                                        <a href="{{ route('disapproveComment', $comment->id) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="تعطيل" style="padding: 8px 12px;"><i class="zmdi zmdi-close"></i></a>
                                                    </li>
                                                @else
                                                    <li>
                                                        <a href="{{ route('approveComment', $comment->id) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="تفعيل" style="padding: 8px 12px;"><i class="zmdi zmdi-check"></i></a>
                                                    </li>
                                                @endif
                                                <li>
                                                    <form method="post" action="{{ route('comments.destroy', $comment->id) }}">
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
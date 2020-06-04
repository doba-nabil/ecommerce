@extends('backend.layout.master')
@section('backend-main')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">تعديل التعليق "{{ $comment->comment }}"</h3>
                </div>
                <div class="panel-body">
                    @include('common.errors')
                    @include('common.done')
                    <form method="post" action="{{ route('comments.update', $comment->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>الكاتب</label>
                                </div>
                                <div class="col-md-10">
                                    <a href="">{{ $comment->user->name }}</a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>المنتج</label>
                                </div>
                                <div class="col-md-10">
                                    <a href="{{ route('products.edit', $comment->product->id) }}">{{ $comment->product->name_ar }}</a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="comment">التعليق</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea name="comment" class="form-control" id="comment" cols="30" rows="5">{{ $comment->comment }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 40px;">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <input value="1" type="checkbox" name="status" @if ($comment->status == 1) checked @endif><label style="margin-right: 5px;">مفعل</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-2">
                                    <input type="submit" class="form-control btn btn-success" value="تحديث">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('backend.layout.master')
@section('backend-head')
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
@endsection
@section('backend-main')
    <div class="backend">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">تعديل بيانات المشرف</div>
                    <div class="panel-body">
                        @include('common.done')
                        @include('common.errors')
                        <form method="post" action="{{ route('moderators.update', $moderator->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="col-md-9">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="name">اسم المستخدم</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $moderator->name }}" placeholder="اسم المستخدم الخاص المشرف">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="email">البريد الالكتروني</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="email" name="email" value="{{ $moderator->email }}" placeholder="البريد الالكتروني الخاص المشرف">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="password">كلمة المرور</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control" id="password" name="password" autocomplete="off" placeholder="يترك فارغا في حالة عدم تغيير كلمة المرور">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="permissions">الصلاحيات</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select data-placeholder="اختر من الصلاحيات الآتية" multiple class="chosen-select form-control" id="permissions" name="permissions[]">
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->name_en }}"
                                                            @foreach ($moderator->permissions as $permission)
                                                            @if ($permission->permissions == $role->name_en)
                                                            selected
                                                            @endif
                                                            @endforeach
                                                    >{{ $role->name_ar }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input value="1" type="checkbox" name="status" @if ($moderator->status == 1) checked @endif><label style="margin-right: 5px;">مفعل</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input value="1" type="checkbox" name="admin" @if ($moderator->admin == 1) checked @endif><label style="margin-right: 5px;">مدير</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-success form-control" value="تحديث">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('backend-footer')
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <script>
        $(".chosen-select").chosen({
            no_results_text: "Oops, nothing found!"
        })
    </script>
@endsection
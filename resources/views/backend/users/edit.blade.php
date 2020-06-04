@extends('backend.layout.master')
@section('backend-main')
    <section class="backend">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">تعديل بيانات العضو "{{ $user->name }}"</h3>
                    </div>
                    <div class="panel-body">
                        @include('common.done')
                        @include('common.errors')
                        <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="name">اسم المستخدم</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required placeholder="اسم المستخدم الخاص بالعضو">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="email">البريد الالكتروني</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required placeholder="البريد الالكتروني المستعمل في تسجيل الدخول">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="password">كلمة المرور</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="يترك فارغا في حالة عدم تغيير كلمة المرور">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="full_name">الاسم بالكامل</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="full_name" id="full_name" class="form-control" value="{{ $user->full_name }}" placeholder="اسم العضو الحقيقي">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="country_id">الدولة</label>
                                    </div>
                                    <div class="col-md-10">
                                        <select name="country_id" id="country_id" class="form-control select">
                                            <option value="0">-- اختر دولة العضو --</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}"
                                                    @if ($country->id == $user->country_id)
                                                        selected
                                                    @endif
                                                >{{ $country->name_ar }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="city_id">المدينة</label>
                                    </div>
                                    <div class="col-md-10">
                                        <select name="city_id" id="city_id" class="form-control select">
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}"
                                                    @if ($city->id == $user->city_id)
                                                        selected
                                                    @endif
                                                >{{ $city->name_ar }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="phone">رقم الهاتف</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}" placeholder="رقم الهاتف الخاص بالعضو للتواصل معه">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="sex">الجنس</label>
                                    </div>
                                    <div class="col-md-10">
                                        <select name="sex" id="sex" class="form-control select">
                                            <option value="ذكر" @if ($user->sex == 'ذكر') selected @endif>ذكر</option>
                                            <option value="انثى" @if ($user->sex == 'انثى') selected @endif>انثى</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="picture">الصورة الشخصية</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="file" name="picture" id="picture">
                                    </div>
                                </div>
                            </div>
                            @if (isset($user->picture))
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-2">
                                            <div class="image-preview">
                                                <img src="{{ asset('pictures/avatars/' . $user->picture) }}" alt="{{ $user->name }}">
                                                <a href="{{ route('deleteUserImg', $user->id) }}" class="btn btn-danger btn-block">ازالة</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group" @if (isset($user->picture)) style="margin-top: 60px;" @endif >
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-10">
                                        <input value="1" type="checkbox" name="status" @if ($user->status == 1) checked @endif><label style="margin-right: 5px;">مفعل</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2">
                                        <input type="submit" value="تحديث" class="form-control btn btn-success">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
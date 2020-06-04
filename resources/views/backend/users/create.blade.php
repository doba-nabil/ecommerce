@extends('backend.layout.master')
@section('backend-main')
    <section class="backend">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">اضافة عضو جديد</h3>
                    </div>
                    <div class="panel-body">
                        @include('common.done')
                        @include('common.errors')
                        <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="type">نوع العضوية</label>
                                    </div>
                                    <div class="col-md-10">
                                        <select name="type" id="type" class="form-control select">
                                            <option value="0">عضو</option>
                                            <option value="1">متجر</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="name">اسم المستخدم</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required placeholder="اسم المستخدم الخاص بالعضو">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="email">البريد الالكتروني</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required placeholder="البريد الالكتروني المستعمل في تسجيل الدخول">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="password">كلمة المرور</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}" required placeholder="يجب أن تكون قوية ويصعب تخمينها">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="full_name">الاسم بالكامل</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="full_name" id="full_name" class="form-control" value="{{ old('full_name') }}" required placeholder="اسم العضو الحقيقي">
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
                                                <option value="{{ $country->id }}">{{ $country->name_ar }}</option>
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
                                            <option value="">-- اختر الدولة أولا --</option>
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
                                        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required placeholder="رقم الهاتف الخاص بالعضو للتواصل معه">
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
                                            <option value="ذكر">ذكر</option>
                                            <option value="انثى">انثى</option>
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
                                        <input type="file" name="picture" id="picture" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-10">
                                        <input value="1" type="checkbox" name="status"><label style="margin-right: 5px;">مفعل</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2">
                                        <input type="submit" value="اضافة" class="form-control btn btn-success">
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
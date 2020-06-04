@extends('backend.layout.master')
@section('backend-main')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">تعديل بيانات الحساب البنكي "{{ $bank->name_ar }}"</div>
                <div class="panel-body">
                    @include('common.done')
                    @include('common.errors')
                    <form method="post" action="{{ route('banks.update', $bank->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name_ar">البنك بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ $bank->name_ar }}" required placeholder="اسم البنك باللغة العربية">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name_en">البنك بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name_en" name="name_en" value="{{ $bank->name_en }}" required placeholder="اسم البنك باللغة الانجليزية">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="owner_ar">صاحب الحساب بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="owner_ar" name="owner_ar" value="{{ $bank->owner_ar }}" placeholder="اسم صاحب الحساب اللغة العربية" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="owner_en">صاحب الحساب بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="owner_en" name="owner_en" value="{{ $bank->owner_en }}" placeholder="اسم صاحب الحساب اللغة الانجليزية" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="ipan">الايبان</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="ipan" name="ipan" value="{{ $bank->ipan }}" placeholder="رقم الايبان" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="account">رقم الحساب</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="account" name="account" value="{{ $bank->account }}" placeholder="رقم الحساب" class="form-control" required>
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

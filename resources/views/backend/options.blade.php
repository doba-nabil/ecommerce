@extends('backend.layout.master')
@section('backend-main')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">تعديل بيانات الموقع</div>
                <div class="panel-body">
                    @include('common.done')
                    @include('common.errors')
                    <form method="post" action="{{ route('optionsSave') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name_ar">اسم الموقع بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="name_ar" name="name_ar" class="form-control" placeholder="اسم الموقع باللغة العربية" value="{{ $option->name_ar }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name_en">اسم الموقع بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="name_en" name="name_en" class="form-control" placeholder="اسم الموقع باللغة الانجليزية" value="{{ $option->name_en }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="description_ar">الوصف بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea name="description_ar" id="description_ar" cols="30" rows="5" class="form-control" placeholder="وصف شامل للموقع باللغة العربية">{{ $option->description_ar }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="description_en">الوصف بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea name="description_en" id="description_en" cols="30" rows="5" class="form-control" placeholder="وصف شامل للموقع باللغة الانجليزية">{{ $option->description_en }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="tags_ar">تاجات الموقع بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="tags_ar" name="tags_ar" class="form-control" placeholder="التاجات التعريفية الخاصة بالموقع باللغة العربية" value="{{ $option->tags_ar }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="tags_en">تاجات الموقع بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="tags_en" name="tags_en" class="form-control" placeholder="التاجات التعريفية الخاصة بالموقع باللغة الانجليزية" value="{{ $option->tags_en }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="email">البريد الالكتروني</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="البريد الالكتروني الخاص بالموقع" value="{{ $option->email }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="phone">رقم الهاتف</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="phone" name="phone" class="form-control" placeholder="رقم الهاتف الخاص بالموقع" value="{{ $option->phone }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="address_ar">العنوان بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="address_ar" name="address_ar" class="form-control" placeholder="العنوان الخاص بالموقع باللغة العربية في حالة وجوده" value="{{ $option->address_ar }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="address_en">العنوان بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="address_en" name="address_en" class="form-control" placeholder="العنوان الخاص بالموقع باللغة الانجليزية في حالة وجوده" value="{{ $option->address_en }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="facebook">رابط الفيسبوك</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="facebook" name="facebook" class="form-control" placeholder="عنوان رابط صفحة الفيسبوك الخاص بالموقع" value="{{ $option->facebook }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="twitter">رابط تويتر</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="twitter" name="twitter" class="form-control" placeholder="عنوان رابط صفحة تويتر الخاص بالموقع" value="{{ $option->twitter }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="google">رابط جوجل بلس</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="google" name="google" class="form-control" placeholder="عنوان رابط صفحة جوجل بلس الخاص بالموقع" value="{{ $option->google }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="youtube">رابط اليوتيوب</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="youtube" name="youtube" class="form-control" placeholder="عنوان رابط صفحة اليوتيوب الخاص بالموقع" value="{{ $option->youtube }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="instagram">رابط الانستجرام</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="instagram" name="instagram" class="form-control" placeholder="عنوان رابط صفحة الانستجرام الخاص بالموقع" value="{{ $option->instagram }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="rights_ar"> حقوق الموقع بالعربية</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea name="rights_ar" id="rights_ar" cols="30" rows="3" class="form-control" placeholder=" حقوق الموقع اسفل الفوتر باللغة العربية">{{ $option->rights_ar }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="rights_en"> حقوق الموقع بالانجليزية</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea name="rights_en" id="rights_en" cols="30" rows="3" class="form-control" placeholder=" حقوق الموقع اسفل الفوتر باللغة الانجليزية">{{ $option->rights_en }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-2">
                                    <input type="submit" class="btn btn-success form-control" value="حفظ">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

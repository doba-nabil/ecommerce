@extends('backend.layout.master')
@section('backend-main')
    <div class="panel panel-default">
        <div class="panel-heading">تفاصل النموذج الخاص بـ{{ $credit_payment->user->name }}</div>
        <div class="panel-body text-center">
            <div class="row">
                <div class="col-lg-6">
                    <div class="payment">
                        <h1>اسم المستخدم</h1>
                        <h2><a href="{{ route('users.edit', $credit_payment->user->id) }}">{{ $credit_payment->user->name }}</a></h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="payment">
                        <h1>اسم صاحب التحويل</h1>
                        <h2>{{ $credit_payment->owner_name }}</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="payment">
                        <h1>رقم الهاتف</h1>
                        <h2>{{ $credit_payment->phone }}</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="payment">
                        <h1>البنك</h1>
                        <h2>{{ $credit_payment->bank->name_ar }}</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="payment">
                        <h1>الايبان</h1>
                        <h2>{{ $credit_payment->ipan }}</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="payment">
                        <h1>المبلغ المراد اضافته بالريال السعودي</h1>
                        <h2>{{ $credit_payment->value }}</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="payment">
                        <h1>ملاحظات</h1>
                        @if (empty($credit_payment->notes))
                            <p>لا توجد ملاحظات!</p>
                        @else
                            <p>{{ $credit_payment->notes }}</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="payment">
                        <h1>صورة التحويل</h1>
                        <img src="{{ asset('pictures/credit_payments/' . $credit_payment->picture) }}" alt="{{ $credit_payment->owner_name }}" style="width: 100% ;height: 300px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
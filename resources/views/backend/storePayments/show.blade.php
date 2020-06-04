@extends('backend.layout.master')
@section('backend-main')
    <div class="panel panel-default">
        <div class="panel-heading">تفاصل النموذج الخاص بـ{{ $payment->owner_name }}</div>
        <div class="panel-body">

            <div class="row">
                <div class="col-lg-6">
                    <div class="payment">
                        <h1>اسم المستخدم</h1>
                        <h2><a href="{{ route('users.edit', $payment->user->id) }}">{{ $payment->user->name }}</a></h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="payment">
                        <h1>اسم المتجر</h1>
                        <h2><a href="{{ route('stores.edit', $payment->user->store->id) }}">{{ $payment->user->store->name_ar }}</a></h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="payment">
                        <h1>البنك</h1>
                        <h2>{{ $payment->bank->name_ar }}</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="payment">
                        <h1>اسم صاحب التحويل</h1>
                        <h2>{{ $payment->owner_name }}</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="payment">
                        <h1>رقم الهاتف</h1>
                        <h2>{{ $payment->phone }}</h2>
                    </div>
                    <div class="payment">
                        <h1>ملاحظات</h1>
                        @if (empty($payment->notes))
                            <p>لا توجد ملاحظات!</p>
                        @else
                            <p>{{ $payment->notes }}</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="payment">
                        <h1>صورة التحويل</h1>
                        <img src="{{ asset('pictures/store_payments/' . $payment->picture) }}" alt="{{ $payment->owner_name }}" style="width: 100% ;height: 300px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
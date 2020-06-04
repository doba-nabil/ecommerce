@extends('backend.layout.master')
@section('backend-main')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #ffffff">تفاصيل صاحب الطلب</h3>
                </div>
                <div class="panel-body text-center">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="payment">
                                <h1>العضو</h1>
                                @if ($order->user_id > 0)
                                    <h2><a href="{{ route('users.edit', $order->user->id) }}">{{ $order->user->name }}</a></h2>
                                @else
                                    <h2>غير مسجل</h2>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="payment">
                                <h1>الاسم</h1>
                                <h2>{{ $order->name }}</h2>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="payment">
                                <h1>رقم الهاتف</h1>
                                <h2>{{ $order->phone }}</h2>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="payment">
                                <h1>البريد الالكتروني</h1>
                                <h2>{{ $order->email }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($order->paid == 1)
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="color: #ffffff">تفاصيل التحويل</h3>
                    </div>
                    <div class="panel-body text-center">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="payment">
                                    <h1>البنك المحول اليه</h1>
                                    <h2>{{ $order->payment->bank->name_ar ?? '' }}</h2>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="payment">
                                    <h1>صاحب الحساب</h1>
                                    <h2>{{ $order->payment->owner_name ?? '' }}</h2>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="payment">
                                    <h1>الايبان</h1>
                                    <h2>{{ $order->payment->ipan ?? '' }}</h2>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="payment">
                                    <h1>صورة التحويل</h1>
                                    <h2><a href="{{ asset('pictures/order_payments/' . $order->payment->picture)}}">فتح الصورة</a></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
 @if ( $order->in_site == 1)
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #ffffff">تفاصيل العنوان</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            <ul class="list-unstyled addres-admin">
                                <li>{{ $order->country->name_ar }}</li>
                                <li>{{ $order->city }}</li>
                                <li>{{ $order->district }} - {{ $order->street }} - {{ $order->details }}</li>
                            </ul>
                        </div>
                        <div class="col-md-7">
                            @if (isset($order->lat))
                                <div id="map-canvas"></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #ffffff">تفاصيل المنتجات</h3>
                </div>
                <div class="panel-body">
                    <table class="table-responsive table table-bordered cartTable">
                        <tr>
                            <th>ID</th>
                            <th>المنتج</th>
                            <th>السعر</th>
                            <th>التاجر</th>
                            <th>الكمية</th>
                            <th>المقاس</th>
                            <th>اللون</th>
                            <th>كود المورد</th>
                            <th>الاجمالي</th>
                        </tr>
                        @foreach ($order->products as $item)
                            <tr>
                                <td>{{ $item->product->id }}</td>
                                <td><a href="{{ route('single', $item->product->id) }}" style="color: #6589ff">{{ mb_strimwidth($item->product->name_ar , 0, 50, "...") }}</a></td>
                                <td>
                                    @if (isset($item->product->discount))
                                        {{ $item->product->discount }} ريال
                                    @else
                                        {{ $item->product->price }} ريال
                                    @endif
                                </td>
                                <td><a href="{{ route('stores.edit', $item->product->store->id) }}" style="color: #6589ff">{{ $item->product->store->name_ar }}</a></td>
                                <td>{{ $item->qty }}</td>
                                <td>
                                    @if (isset($item->size_id))
                                        {{ $item->size->value }}
                                    @else
                                        --
                                    @endif
                                </td>
                                <td>
                                    @if (isset($item->color_id))
                                        <a href="{{ asset('pictures/colors/' . $item->color->path) }}">
                                            <img src="{{ asset('pictures/colors/' . $item->color->path) }}" style="width: 40px; height: 40px;">
                                        </a>
                                    @else
                                        --
                                    @endif
                                </td>
                                <td>{{ $item->product->code }}</td>
                                <td>{{ $item->price }} ريال</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #ffffff">تفاصيل الطلب</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="payment text-center">
                                <h1>شركة الشحن</h1>
                                <h2>{{ $order->ship->name_ar }} - {{ $order->ship->price }}</h2>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="payment text-center">
                                <h1>اجمالي قيمة الطلب</h1>
                                <h2><?= preg_replace('#(\d),(\d)#','$1$2', $order->price) + preg_replace('#(\d),(\d)#','$1$2', $order->ship->price) ?> ريال</h2>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="payment text-center">
                                <h1>تاريخ الطلب</h1>
                                <h2>{{ $order->created_at->toDateString() }}</h2>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="payment text-center">
                                <h1>رقم الشحنة</h1>
                                <h2>{{ $order->code }}</h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="payment">
                                <h1>حالة الطلب</h1>
                                <form action="{{ route('checkouts.update', $order->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="checkbox" style="margin-bottom: 20px;">
                                        <label>
                                            <input value="1" type="checkbox" name="confirmed" @if ($order->confirmed) checked @endif><label style="margin-right: 8px;">تم تأكيد الطلب</label>
                                        </label>
                                    </div>

                                    <div class="checkbox" style="margin-bottom: 20px;">
                                        <label>
                                            <input value="1" type="checkbox" name="satup" @if ($order->satup) checked @endif><label style="margin-right: 8px;">تم تجهيز الطلب</label>
                                        </label>
                                    </div>

                                    <div class="checkbox" style="margin-bottom: 20px;">
                                        <label>
                                            <input value="1" type="checkbox" name="shipped" @if ($order->shipped) checked @endif><label style="margin-right: 8px;">تم شحن الطلب</label>
                                        </label>
                                    </div>

                                    <div class="checkbox" style="margin-bottom: 20px;">
                                        <label>
                                            <input value="1" type="checkbox" name="delivered" @if ($order->delivered) checked @endif><label style="margin-right: 8px;">تم الاستلام</label>
                                        </label>
                                    </div>
                                    <input type="submit" value="حفظ" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--<div class="col-lg-6">--}}
            {{--<div class="payment">--}}
                {{--<h1>صورة التحويل</h1>--}}
                {{--<img src="{{ asset('pictures/store_payments/' . $order->picture) }}" alt="{{ $order->owner_name }}" style="width: 100% ;height: 300px;">--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
@endsection
@section('backend-footer')
    <script>
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
            center: {
                lat: {{ $order->lat }},
                lng: {{ $order->lng }}
            },
            zoom: 15
        });
        var marker = new google.maps.Marker({
            map: map,
            position: {
                lat: {{ $order->lat }},
                lng: {{ $order->lng }}
            },
        });
    </script>
@endsection
<!DOCTYPE html>
<html lang="ar">
<head>
    @include('frontend.layout.head')
    <title>Doba Shop - @yield('pageTitle')</title>
</head>
<body>
@include('frontend.layout.header')
<input type="hidden" value="{{URL::to('/')}}" id="base_url">

@section('frontend-main')

@show

@guest()
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center" style="font-size: 17px;">
                    <i class="fa fa-exclamation-triangle sin" aria-hidden="true"></i>
                    <span>برجاء تسجيل الدخول اولا <a href="{{ route('login') }}" style="color: rgba(4,11,188,0.7)">من هنا</a></span>
                </div>
            </div>
        </div>
    </div>
@endguest
@include('frontend.layout.footer')
</body>
</html>
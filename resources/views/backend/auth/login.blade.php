<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="7loll.net">
    <meta name="author" content="Aslm Ahmd">
    <title>الدخول الى لوحة التحكم</title>
    <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/bootstrap-rtl.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/font-awesome/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/css/mine.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<section class="login">
    <div class="container" style="height: 100%">
        <div class="row" style="height: 100%">
            <div class="col-md-4" style="height: 100%">
                <div class="login-section">
                    <h1>مرحبا بك</h1>
                    <h2>برجاء ادخال بياناتك للدخول الى لوحة التحكم</h2>
                    @include('common.errors')
                    <form method="POST" action="{{ route('backendLogin') }}">
                        {{ csrf_field() }}
                        <input id="email" name="email" type="email" placeholder="البريد الالكتروني">
                        <input id="password" name="password" type="password" placeholder="كلمة المرور">
                        <input type="submit" value="دخول" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('backend/js/jquery-1.11.0.js') }}'"></script>
<script src="{{ asset('backend/js/bootstrap.min.js') }}'"></script>

</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subscribe</title>
</head>
<body style="text-align: right">
<h4>{{ $title }}</h4>
{{ $code }}
<p>برجاء الضغط <a href="{{ route('orderFromMail', $code) }}"> هنا </a>لمتابعة الطلب الخاص بك.</p>
</body>
</html>
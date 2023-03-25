<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/css/reset.css')  }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css')  }}">
    <link rel="stylesheet" href="{{ asset('/css/manager.css')  }}">
    <link rel="stylesheet" href="{{ asset('/css/responsive.css')  }}">
    <script src="https://kit.fontawesome.com/1bf48cf055.js" crossorigin="anonymous"></script>
</head>
<body>
    @yield('content')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="{{asset('/js/main.js')}}"></script>
    <script src="{{asset('/js/_ajaxlike.js')}}"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF 令牌 -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>登录 | Yeek</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+SC&display=swap">
    <link rel="stylesheet" href="{{asset('/static/bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('/static/jquery.min.js')}}"></script>
    <script src="{{asset('/static/bootstrap/js/bootstrap.min.js')}}"></script>

    <style>
        body {
            font-family: 'Noto Sans SC', sans-serif;
        }
    </style>
</head>

<body class="vh-100 d-md-flex flex-md-column">

    <div id="app" class="flex-md-grow-1">
        @component('common.navbar')

        @endcomponent
        <main class="mt-5">
            @yield('content')
        </main>
    </div>

    @component('common.footer')
        
    @endcomponent
</body>

</html>
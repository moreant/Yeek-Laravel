<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+SC:400,500,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('/static/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/static/bootstrap/css/cover.css')}}">
    <script src="{{asset('/static/jquery.min.js')}}"></script>
    <script src="{{asset('/static/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Styles -->
    <style>
        body {
            font-family: 'Noto Sans SC';
        }

    </style>
</head>

<body>
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column text-center">
        <header class="masthead mb-auto">
            <div>
                <h3 class="masthead-brand">一客 | 莫居尘</h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link active" href="#">首页</a>
                    {{-- <a class="nav-link" href="https://moreant.github.io">博客</a>
                    <a class="nav-link" href="http://drive.yeek.top">网盘</a> --}}
                </nav>
            </div>
        </header>
        <main class="">
            <h1>冬眠中</h1>
            <p>期待更好的春天</p>
        </main>
        <footer class="mastfoot mt-auto">
            <small>

                design by
                <a href="https://getbootstrap.com/docs/4.4/examples/cover/">mdo</a>
                @if (strpos('yeek',url('')))
                <span class="mx-2">|</span>
                <a href="http://beian.miit.gov.cn/">粤ICP备19003211号</a>
                <span class="mx-2">|</span>
                <a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44011102002523">
                    粤公网安备44011102002523号
                </a>
                @endif

            </small>


        </footer>
    </div>
</body>

</html>

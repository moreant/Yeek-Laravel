<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','作业管理') | Yeek</title>
    <link rel="stylesheet" href="{{asset('/static/bootstrap/css/bootstrap.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+SC:400,500,700&display=swap" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/5.10.2/css/all.css" rel="stylesheet">
    @section('link')

    @show
    @section('style')
    <style>
        body {
            font-family: 'Noto Sans SC';
        }

        .banner {
            /* 这个是我偷 next 的，Link=>http://theme-next.iissnan.com/ */
            background: url('{{ asset('img/work-banner.jpg') }}') 0 80%;
            background-size: cover;
        }

    </style>
    @show
</head>

<body class="vh-100 d-md-flex flex-md-column">

    @component('common.navbar')

    @endcomponent

    @section('header')
    <header class="jumbotron banner text-light text-center">
        <div class="container-fluid w-75">
            <h2>作业管理<br><small class="text-capitalize lead font-weight-bold">v0.2</small></h2>
        </div>
    </header>
    @show

    <main class="container-fluid w-75 flex-md-grow-1 mt-3 mb-5">

        @section('modal')

        @show

        <div class="row">
            <!-- 侧边栏 -->
            <div class="col-lg-2 mb-3">
                <div class="list-group shadow">
                    <a href="{{ url('work/') }}"
                        class="list-group-item {{ Request::getPathInfo() == '/work' ? 'active' : '' }} ">
                        <i class="fa-fw fas fa-bookmark"></i>
                        进行中</a>
                    <a href="{{ url('work/all') }}"
                        class="list-group-item {{ Request::getPathInfo() == '/work/all' ? 'active' : '' }} ">
                        <i class="fa-fw fa fa-list"></i>
                        全部</a>
                    <a href="{{ url('work/console') }}" onclick="quanxian()"
                        class="list-group-item  {{ Request::getPathInfo() == '/work/console' ? 'active' : '' }} ">
                        <i class="fa-fw fas fa-tools"></i>
                        控制台</a>
                </div>
            </div>
            <!-- end 侧边栏 -->

            <!-- 主显示区 -->
            <div class="col-lg-10">

                <!-- 提示框 -->
                @if(Session::has('title'))
                @component('common.message',[
                'type' => Session::get('type'),
                'title' => Session::get('title'),
                'msg' => Session::get('msg')
                ])
                @endcomponent
                @endif
                <!-- end 提示框 -->

                <!-- 正文 -->
                @section('content')

                @show
                <!-- end 正文 -->

            </div>
            <!-- end 主显示区 -->
        </div>
    </main>

    <!-- 页脚 -->
    @component('common.footer')

    @endcomponent
    <!-- end 页脚 -->

    <script src="https://cdn.bootcss.com/font-awesome/5.10.2/js/all.js"></script>
    <script src="{{asset('/static/jquery.min.js')}}"></script>
    <script src="{{asset('/static/bootstrap/js/bootstrap.min.js')}}"></script>
    <script>
        $('[href="/work"]').addClass("active")

    </script>
    @section('javasctipt')

    @show

</body>

</html>

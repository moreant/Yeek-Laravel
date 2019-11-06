<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','作业管理') | Yeek</title>
    <link rel="stylesheet" href="{{asset('/static/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+SC&display=swap">
    <link href="https://cdn.bootcss.com/font-awesome/5.10.2/css/all.css" rel="stylesheet">
    @section('link')

    @show
    @section('style')
    <style>
        :root {
            height: 100%;
        }

        body {
            font-family: 'Noto Sans SC', sans-serif;

        }

        .banner {
            /* 这个是我偷 next 的，Link=>http://theme-next.iissnan.com/ */
            background: url('{{ asset('img/banner-2.jpg') }}') 0 80%;
            background-size: cover;

        }


    </style>
    @show
</head>

<body class="h-100 d-md-flex flex-md-column">

    @component('common.navbar')

    @endcomponent

    @section('header')
    <header class="jumbotron banner text-light text-center">
        <div class="container-fluid w-75">
            <h2>作业管理<br><small class="text-capitalize lead font-weight-bold">beta</small></h2>
        </div>
    </header>
    @show

    <main class="container-fluid w-75 flex-md-grow-1">

        @section('modal')

        @show

        <div class="row">
            <!-- 侧边栏 -->
            <div class="col-md-2 mb-3">
                <div class="list-group">
                    <a href="{{ url('work/') }}"
                        class="list-group-item {{ Request::getPathInfo() == '/work' ? 'active' : '' }} "><i
                            class="fa fa-list"></i> 全部</a>
                    <a href="{{ url('work/console') }}"
                        class="list-group-item  {{ Request::getPathInfo() == '/work/console' ? 'active' : '' }} "><i
                            class="fa fa-plus-square"></i> 控制台</a>
                    <a href="{{ url('work/test') }}"
                        class="list-group-item  {{ Request::getPathInfo() == '/work/test' ? 'active' : '' }} "><i
                            class="	fa fa-bug"></i> Test</a>
                </div>
            </div>
            <!-- end 侧边栏 -->

            <!-- 主显示区 -->
            <div class="col-md-10">

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
    @section('footer')
    <footer class="jumbotron" style="margin:0;">
        <div class="container">
            <span><a href="http://www.yeek.top">Yeek.top</a>@2019</span>
        </div>
    </footer>
    @show
    <!-- end 页脚 -->

    <script src="https://cdn.bootcss.com/font-awesome/5.10.2/js/all.js"></script>
    <script src="{{asset('/static/jquery.min.js')}}"></script>
    <script src="{{asset('/static/bootstrap/js/bootstrap.min.js')}}"></script>
    @section('javasctipt')

    @show

</body>

</html>
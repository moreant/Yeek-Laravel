<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','FTP列表') | Yeek</title>
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
            <h2>Yeek - FTP列表<br><small class="text-capitalize lead font-weight-bold">Alpha</small></h2>
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
                    <a href="{{ url('ftp/') }}"
                        class="list-group-item {{ Request::getPathInfo() == '/ftp' ? 'active' : '' }} "><i
                            class="fa fa-list"></i> 全部</a>
                    <a href="{{ url('ftp/console') }}"
                        class="list-group-item  {{ Request::getPathInfo() == '/work/console' ? 'active' : '' }} "><i
                            class="fa fa-plus-square"></i> 控制台</a>
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
                <table class="table">
                    <thead>
                        <tr>
                            <th>教室</th>
                            <th>课程</th>
                            <th>FTP地址</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>406</td>
                            <td>移动商务网站开发</td>
                            <td>ftp://10.1.41.116</td>
                        </tr>
                        <tr>
                            <td>405</td>
                            <td>平面设计</td>
                            <td>ftp://172.19.145.65</td>
                        </tr>
                        <tr>
                            <td>304</td>
                            <td>PHP和MySQL</td>
                            <td>ftp://192.168.0.200</td>
                        </tr>
                    </tbody>
                </table>
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
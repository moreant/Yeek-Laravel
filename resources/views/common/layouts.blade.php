<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','作业管理') | Yeek</title>
    {{-- <script src="https://kit.fontawesome.com/7ff774316b.js" crossorigin="anonymous"></script> --}}
    <link href="https://cdn.bootcss.com/font-awesome/5.10.2/css/all.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/font-awesome/5.10.2/js/all.js"></script>
    <link rel="stylesheet" href="/static/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+SC&display=swap">
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
    </style>
    @show
</head>

<body class="h-100 d-md-flex flex-md-column">
    @section('header')
    <header class="jumbotron">
        <div class="container-fluid w-75">
            <h2>Yeek - 作业管理<br><small class="text-capitalize lead font-weight-bold">alpha</small></h2>
        </div>
    </header>
    @show

    <main class="container-fluid w-75 flex-md-grow-1">
        <div class="row">
            <div class="col-md-2 mb-3">
                <div class="list-group">
                    <a href="{{ url('work/') }}"
                        class="list-group-item {{ Request::getPathInfo() == '/work' ? 'active' : '' }} "><i
                            class="fa fa-list"></i> 全部</a>
                    <a href="{{ url('work/create') }}"
                        class="list-group-item  {{ Request::getPathInfo() == '/work/create' ? 'active' : '' }} "><i
                            class="fa fa-plus-square"></i> 加入</a>
                    <a href="{{ url('work/upload') }}"
                        class="list-group-item  {{ Request::getPathInfo() == '/work/upload' ? 'active' : '' }} "><i
                            class="	fa fa-upload"></i> 上传</a>
                    <a href="{{ url('work/test') }}"
                        class="list-group-item  {{ Request::getPathInfo() == '/work/test' ? 'active' : '' }} "><i
                            class="	fa fa-bug"></i> Test</a>
                </div>
            </div>
            <div class="col-md-10">
                @yield('alert')
                @section('content')
                <div class="card">
                    <div class="card-header h4">全部作业</div>
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table class="table table-hover  text-center" style="min-width: 1000px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>作业</th>
                                        <th>开始</th>
                                        <th>截止</th>
                                        <th>备注</th>
                                        <th>选项</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><i class="fab fa-swift fa-lg fa-fw" style="color:#f0a1a8;"></i>课堂笔记11</td>
                                        <td>10-20</td>
                                        <td>10-29</td>
                                        <td>记得上交</td>
                                        <td>上交</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><i class="fab fa-js fa-lg fa-fw" style="color:#e4bf11"></i>课堂笔记11</td>
                                        <td>10-20</td>
                                        <td>10-29</td>
                                        <td>记得上交22222222222222222222</td>
                                        <td>上交</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><i class="fab fa-php fa-lg fa-fw"
                                                style="background-color:#8076a3;color:white"></i>课堂笔记11</td>
                                        <td>10-20</td>
                                        <td>10-29</td>
                                        <td>记得上交</td>
                                        <td>上交</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="flex d-flex flex-row-reverse mt-3">
                    <ul class="pagination mr-0">
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                    </ul>
                </div>
                @show
            </div>
        </div>
    </main>


    @section('footer')
    <footer class="jumbotron" style="margin:0;">
        <div class="container">
            <span>Yeek@2019</span>
        </div>
    </footer>
    @show

    <script src="/static/jquery.min.js"></script>
    <script src="/static/bootstrap/js/bootstrap.min.js"></script>
    @section('javasctipt')

    @show
</body>

</html>
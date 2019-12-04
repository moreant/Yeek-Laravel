<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+SC&display=swap">

    <link rel="stylesheet" href="{{asset('/static/bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('/static/jquery.min.js')}}"></script>
    <script src="{{asset('/static/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Styles -->
    <style>
        body {
            font-family: 'Noto Sans SC', sans-serif;
        }

        .banner-img {
            height: 35vh;
            background: url('{{ asset('img/banner-0.jpg') }}') 0 80%;
            background-size: cover;
        }

        #home-nav a {
            color: #343a40;
        }

        #home-nav div a:hover {
            color: inherit;
            text-decoration: none
        }

        #home-nav div a:hover {
            background: #e3e3e3;
        }

        .media-img {
            max-width: 240px;
        }
    </style>
</head>

<body class="vh-100 d-md-flex flex-md-column">
    @component('common.navbar')

    @endcomponent
    <main class="flex-md-grow-1">
        <!-- 轮播图 -->
        <div id="banner" class="carousel slide" data-ride="carousel">
            <!-- 指示符 -->
            <ul class="carousel-indicators">
                <li data-target="#banner" data-slide-to="0" class="active"></li>
                <li data-target="#banner" data-slide-to="1"></li>
                <li data-target="#banner" data-slide-to="2"></li>
                <li data-target="#banner" data-slide-to="3"></li>
            </ul>

            <!-- 轮播图片 -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="banner-img" index='0'></div>
                    <div class="carousel-caption">
                        <p class="display-4 font-weight-bold">Laravel</p>
                        <h5>更优雅的PHP框架</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="banner-img" index='1'></div>
                    <div class="carousel-caption">
                        <p class="display-4 font-weight-bold">Nginx</p>
                        <h5>更快的WEB服务器</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="banner-img" index='2'></div>
                    <div class="carousel-caption">
                        <p class="display-4 font-weight-bold">七牛云CDN</p>
                        <h5>更近的缓存服务器</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="banner-img" index='3'></div>
                    <div class="carousel-caption">
                        <p class="display-4 font-weight-bold">Docker</p>
                        <h5>更少的性能开销</h5>
                    </div>
                </div>
            </div>

            <!-- 左右切换按钮 -->
            <a class="carousel-control-prev" href="#banner" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#banner" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

        </div>

        <!-- 首页导航栏 -->
        <div id="home-nav" class="text-center bg-light ">
            <div class="container row mx-auto">
                <a class="col-md p-4" href="/work">
                    <h4 class="font-weight-bold">作业管理</h4>
                </a>
                <a class="col-md p-4" href="/ftp">
                    <h4 class="font-weight-bold">FTP列表</h4>
                </a>
                <a class="col-md p-4" href="/ftp">
                    <h4 class="font-weight-bold">个人中心</h4>
                </a>
            </div>
        </div>

        <!-- 媒体栏 -->
        <div id="media-box" class="">
            <br>
            <h1 class="text-center">本站架构</h1>
            <div class="container p-5">
                <hr>
                <div class="d-flex flex-lg-row flex-column p-5 justify-content-around align-items-center">
                    <div><img src="img/aliyun.png" class="media-img"></div>
                    <div>
                        <h2 class="mb-3 mt-3">云服务器</h2>
                        <h4>使用阿里云 ECS 云服务器</h4>
                        <h4>7*24 小时运行，高性能云盘</h4>
                    </div>
                </div>
            </div>
            <div class="bg-light">
                <div class="container p-5">
                    <div class="d-flex flex-lg-row flex-column-reverse p-5 justify-content-around align-items-center ">
                        <div>
                            <h2 class="mb-3 mt-3">融合 CDN</h2>
                            <h4>七牛云融合 CDN 加速</h4>
                            <h4>近获取所需内容，更快、更稳定</h4>
                        </div>
                        <div><img src="img/qiniu.png" class="media-img" alt=""></div>
                    </div>
                </div>
            </div>
            <div class="container p-5">
                <div class="d-flex flex-lg-row flex-column p-5 justify-content-around align-items-center ">
                    <div><img src="img/docker.png" class="media-img" alt=""></div>
                    <div>
                        <h2 class="mb-3 mt-3">Docker</h2>
                        <h4>使用 Docker 部署 LNMP 环境</h4>
                        <h4>标准化快速部署，资源开销低</h4>
                    </div>

                </div>
            </div>
            <div class="bg-light">
                <div class="container p-5">
                    <div class="d-flex flex-lg-row flex-column-reverse p-5 justify-content-around align-items-center">
                        <div>
                            <h2 class="mb-3 mt-3">Nginx</h2>
                            <h4>选择高性能的 HTTP WEB 服务器</h4>
                            <h4>配合云解析 DNS，显著降低应答延迟</h4>
                        </div>
                        <div><img src="img/nginx.png" class="media-img" alt=""></div>

                    </div>
                </div>
            </div>
            <div class="container p-5">
                <div class="d-flex flex-lg-row flex-column p-5 justify-content-around align-items-center ">
                    <div><img src="img/laravel.png" class="media-img" alt="" style=""></div>
                    <div>
                        <h2 class="mb-3 mt-3">Laravel</h2>
                        <h4>优雅的 PHP Web 开发框架</h4>
                        <h4>采用 MVC 设计，是最受关注的 PHP 框架</h4>
                    </div>

                </div>
            </div>
        </div>


    </main>
    @component('common.footer')

    @endcomponent
    <script>
        $.each($(".banner-img"),function(i,o){
            $(o).css({'background':"url('{{ asset('img') }}/banner-"+i+".jpg') 0 80% ",'background-size':'cover'})
        })
    </script>
</body>

</html>
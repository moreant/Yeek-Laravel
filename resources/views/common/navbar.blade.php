<style>
    .jumbotron {
        border-radius: 0;
    }
</style>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">
        <a href="/" class="navbar-brand">Yeek</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="/work" class="nav-link">作业管理</a></li>
                <li class="nav-item"><a class="nav-link" href="/ftp" class="nav-link">FTP列表</a></li>
                @guest
                <li class="nav-item"><a class="nav-link" href="/login" class="nav-link">登录</a></li>
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link" href="/home" class="nav-link">{{ Auth::user()->name }}</a>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
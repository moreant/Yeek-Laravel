@extends('layouts.work')

@section('title')
{{ $title }}
@endsection

@section('content')

<div class="card">
    <div class="card-header h4">{{ $title }}</div>
    <div class="card-body">
        <p>我是想着弄个网盘可以临时存储（未完成的）作业，或者管理自己交过的作业</p>
        <p>但是发现工作量有点大：</p>
        <ol>
            <li>存储对象：虽然现在使用的服务器在广州，但是流量只有1Mpbs。而且性能不咋地，处理下载还是比较吃力的，所以就打算使用<a
                    href="https://www.qiniu.com/products/kodo">七牛云的对象存储</a>来放文件，有cdn加速、不限速，最重要的是不用钱。所以我得学一下 laravel
                的存储配置</li>
            <li>用户授权：避免恶意上传，这就需要再去学一个<a
                    href="https://learnku.com/articles/5662/two-great-laravel-rights-management-packages-recommended">laravel授权管理的包</a>了
            </li>
        </ol>
        说这么多，是想问有没有童鞋有这个需求。最近事多，这个玩意暂时处于<span class="text-danger">无限期延期</span>
        <legend>如果你有存储作业或课件的需求</legend>
        想学 laravel 的可以跟我一起学一学
        不想学只想用的，<a href="https://github.com/mojuchen/Yeek-Laravel">去GitHub给我个星星呗</a>
    </div>
</div>

@endsection
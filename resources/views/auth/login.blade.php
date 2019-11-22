@extends('layouts.app')

@section('content')
<div class="container">
    <p class="display-4 text-center mb-5">管理员登录</p>
    <div class="row justify-content-center">
        <div class="col-md-4 text-center">
            <div class="media">
                <img class="img-fluid align-self-center mx-auto" src={{asset('img/Yeek.png')}}>
            </div>
            <hr>
            <ul class="list-unstyled">
                <li><span class="text-danger">Laravel</span> - 更优雅的PHP框架</li>
                <li><span class="text-info">Nginx</span> - 更快的响应速度</li>
                <li><span class="text-success">七牛云CDN</span> - 更近的服务器</li>
            </ul>
          </div>
        <div class="offset-1 col-md-1 border-left"></div>
        <div class="col-md-4">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group ">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                        name="email" value="{{ old('email') }}" required autofocus placeholder="你的邮箱">
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <input id="password" type="password"
                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required
                        placeholder="密码">
                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input class="custom-control-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="remember">
                            记住我
                        </label>
                    </div>
                    <div class="custom-control-inline float-right"><a href="" class="">忘记密码</a></div>
                </div>

                <div class="d-md-flex justify-content-between">
                    <button type="submit" class="btn btn-block btn-primary">
                        登录
                    </button>
                    <div class="m-2"></div>
                    <a onclick="javascript:alert('暂未开放')" class="btn btn-block btn-outline-secondary">注册</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
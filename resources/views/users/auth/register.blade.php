@extends('users.layouts.auth')
@section('user-auth-page-container')
    <div class="login-content">
        @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('user/register') }}" method="POST" class="margin-bottom-0">
            {{ csrf_field() }}
            <div class="form-group m-b-20">
                <input type="text" name="email" class="form-control input-lg" placeholder="邮箱地址" value="{{ old('email') }}"/>
            </div>
            <div class="form-group m-b-20">
                <input type="text" name="name" class="form-control input-lg" placeholder="姓名" value="{{ old('name') }}"/>
            </div>
            <div class="form-group m-b-20">
                <input type="password" name="password" class="form-control input-lg" placeholder="密码" />
            </div>
            <div class="form-group m-b-20">
                <input type="password" name="password_confirmation" class="form-control input-lg" placeholder="确认密码" />
            </div>
            <div class="login-buttons">
                <button type="submit" class="btn btn-success btn-block btn-lg">注 册</button>
            </div>
            <div class="m-t-20">
                已有账号? 请 <a href="{{ url('user/login') }}">登录</a>
            </div>
        </form>
    </div>
@endsection

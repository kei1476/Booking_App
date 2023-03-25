@extends('layouts.default')
@section('content')
<div class="title-area register-nav-area">
    <div class="openbtn6"><span></span><span></span><span></span></div>
    <h1 class="header-title">Rese</h1>
    <div class="main-menu">
        <nav class="main-nav">
            <ul class="main-nav-lists">
                <li class="main-nav-list"><a href="/shops">店舗一覧</a></li>
                <li class="main-nav-list-notlogin"><a href="/register">新規登録</a></li>
                <li class="main-nav-list"><a href="/login">ログイン</a></li>
            </ul>
        </nav>
    </div>
</div>
<div class="register-area">
    <form action="{{ route('admin.register') }}" method="POST" class="register-form">
        @csrf
        <p class="register-title">会員登録</p>
        <div class="validate-error-message-area">
            @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                <p class="validate-error-message">※{{$error}}</p>
                @endforeach
            @endif
        </div>
        <dl class="register-dl">
            <dt class="register-dt"><i class="fa-solid fa-user"></i></dt>
            <dd class="register-dd"><input type="text" name="shop_manager_name" placeholder="Username" value="{{old('shop_manager_name')}}"></dd>
        </dl>
        <dl class="register-dl">
            <dt class="register-dt"><i class="fa-solid fa-envelope"></i></dt>
            <dd class="register-dd"><input type="email" name="email" placeholder="Email" value="{{old('email')}}"></dd>
        </dl>
        <dl class="register-dl">
            <dt class="register-dt"><i class="fa-solid fa-lock"></i></dt>
            <dd class="register-dd"><input type="passsword" name="password" placeholder="Password" value="{{old('password')}}"></dd>
        </dl>
        <dl>
            <td>
                <input type="text" name="shop_id" value="{{old('shop_id')}}">
            </td>
        </dl>
        <div class="register-btn-area">
            <button class="registration-btn">登録</button>
        </div>
    </form>
</div>
@endsection

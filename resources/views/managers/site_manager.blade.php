@extends('layouts.managers_default')
@section('content')
<div class="title-area register-nav-area">
    <div class="openbtn6"><span></span><span></span><span></span></div>
    <h1 class="header-title">Rese</h1>
    <div class="main-menu">
        <nav class="main-nav">
            <ul class="main-nav-lists">
                <li class="main-nav-list"><a href="create/shop">店舗作成</a></li>
                <form action="/site_manager/logout" method="POST" class="logout-form">
                    @csrf
                    <button class="logout-btn">ログアウト</button>
                </form>
                <li class="main-nav-list"><a href="/site/manager">店舗代表者作成</a></li>
            </ul>
        </nav>
    </div>
</div>
<h2 class="site-manager-title">サイト管理者画面</h2>
@if(session('status'))
<p class="success-update-book">{{session('status')}}</p>
@endif
<div class="register-area">
    <form action="/site/manager" method="POST" class="register-form">
        @csrf
        <p class="register-title">店舗運営者作成</p>
        <div class="validate-error-message-area">
            @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <p class="validate-error-message">※{{$error}}</p>
            @endforeach
            @endif
        </div>
        <dl class="register-dl">
            <dt class="register-dt"><i class="fa-solid fa-user"></i></dt>
            <dd class="register-dd"><input type="text" name="shop_manager_name" placeholder="ShopName"
                    value="{{old('shop_manager_name')}}"></dd>
        </dl>
        <dl class="register-dl">
            <dt class="register-dt"><i class="fa-solid fa-envelope"></i></dt>
            <dd class="register-dd"><input type="email" name="email" placeholder="Email" value="{{old('email')}}"></dd>
        </dl>
        <dl class="register-dl">
            <dt class="register-dt"><i class="fa-solid fa-lock"></i></dt>
            <dd class="register-dd"><input type="" name="password" placeholder="Password"
                    value="{{old('password')}}"></dd>
        </dl>
        <dl class="register-dl">
            <dt class="register-dt"><i class="fa-sharp fa-solid fa-shop"></i></dt>
            <dd class="register-dd">
                <input type="text" name="shop_id" value="{{old('shop_id')}}" placeholder="Shop-id">
            </dd>
        </dl>
        <div class="register-btn-area">
            <button class="registration-btn">登録</button>
        </div>
    </form>
</div>
@endsection

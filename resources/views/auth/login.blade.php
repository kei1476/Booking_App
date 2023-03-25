@extends('layouts.default')
@section('content')
<x-user-header-menu/>
<div class="register-area">
    <form action="{{ route('login') }}" method="POST" class="register-form">
       @csrf
    <p class="register-title">ログイン</p>
    <div class="validate-error-message-area">
        @if(count($errors) > 0)
        @foreach($errors->all() as $error)
        <p class="validate-error-message">※{{$error}}</p>
        @endforeach
        @endif
    </div>
    <dl class="register-dl">
        <dt class="register-dt"><i class="fa-solid fa-envelope"></i></dt>
        <dd class="register-dd"><input type="email" name="email" placeholder="Email" value="{{old('email')}}"></dd>
    </dl>
    <dl class="register-dl">
        <dt class="register-dt"><i class="fa-solid fa-lock"></i></dt>
        <dd class="register-dd"><input type="passsword" name="password" placeholder="Password" value="{{old('password')}}">
        </dd>
    </dl>
    <div class="register-btn-area">
        <a href="register" class="register-link">会員登録はこちら</a>
        <button class="registration-btn">ログイン</button>
    </div>
    </form>
</div>
@endsection

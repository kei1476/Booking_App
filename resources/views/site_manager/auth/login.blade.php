@extends('layouts.managers_default')
@section('content')
<h2 class="site-manager-login-title">サイト管理者ログイン画面</h2>
<div class="register-area">
    <form action="{{ route('site_manager.login') }}" method="POST" class="register-form">
        <x-login-form />
    </form>
</div>
@endsection

@extends('layouts.managers_default')
@section('content')
<h2 class="admin-login-title">店舗代表者ログイン</h2>
<div class="register-area">
    <form action="{{ route('admin.login') }}" method="POST" class="register-form">
        <x-login-form />
    </form>
</div>
@endsection

@extends('layouts.default')
@section('content')
<div class="register-area">
    <form action="{{ route('site_manager.register') }}" method="POST" class="register-form">
    <x-register-form title="サイト管理者" name="site_manager_name" placeholder="SiteManagerName"/>
    </form>
</div>
@endsection

@extends('layouts.default')
@section('content')
<x-user-header-menu/>
<div class="register-area">
    <form action="{{ route('register') }}" method="POST" class="register-form">
        <x-register-form title="会員" name="name" placeholder="UserName"/>
    </form>
</div>
@endsection

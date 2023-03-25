@extends('layouts.default')
@section('content')
<header class="header">
    <div class="header-area">
        <div class="title-area">
            <div class="openbtn6"><span></span><span></span><span></span></div>
            <h1 class="header-title">Rese</h1>
            <div class="main-menu">
                <nav class="main-nav">
                    <ul class="main-nav-lists">
                        <li class="main-nav-list"><a href="#">Home</a></li>
                        <li class="main-nav-list"><a href="#">Logout</a></li>
                        <li class="main-nav-list"><a href="#">Mypage</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<div class="thanks-content">
    <div class="thanks-texts">
        <p class="thanks-text">会員登録ありがとうございます</p>
        <a href="#" class="back-btn">ログインする</a>
    </div>
</div>
@endsection

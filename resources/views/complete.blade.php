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
                        <li class="main-nav-list"><a href="#">店舗一覧</a></li>
                        <form action="/logout" method="POST" class="logout-form">
                            @csrf
                            <button class="logout-btn">ログアウト</button>
                        </form>
                        <li class="main-nav-list"><a href="#">マイページ</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<div class="thanks-content">
    <div class="thanks-texts">
        <p class="thanks-text">ご予約ありがとうございます</p>
        <a href="/mypage" class="back-btn">戻る</a>
    </div>
</div>
@endsection

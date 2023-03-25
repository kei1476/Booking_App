@extends('layouts.managers_default')
@section('content')
<header class="header">
    <div class="header-area">
        <div class="title-area">
            <div class="openbtn6"><span></span><span></span><span></span></div>
            <h1 class="header-title">Rese</h1>
            <div class="main-menu">
                <nav class="main-nav">
                    <ul class="main-nav-lists">
                        <li class="main-nav-list"><a href="/shop/books">予約一覧</a></li>
                        <form action="/admin/logout" method="POST" class="logout-form">
                            @csrf
                            <button class="logout-btn">ログアウト</button>
                        </form>
                        {{-- <li class="main-nav-list"><a href="/shop/Info/edit/{{$shop_id->shop_id}}">店舗情報更新</a></li> --}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<h2 class="sendmail-title">メール送信画面</h2>
<div class="send-mail-area">
    <form action="/shop/sendmail" method="POST">
        @csrf
        <dl>
            <dt>予約者名</dt>
                <dd>{{$user->name}}</dd>
            <dt>メールアドレス</dt>
                <dd>{{$user->email}}</dd>
            <dt>タイトル</dt>
            <dd><input type="text" name="subject"></dd>
            <dt>メール内容</dt>
            <dd>
                <textarea name="contents" id="content" cols="30" rows="10"></textarea>
            </dd>
        </dl>
        <input type="hidden" name="user_name" value="{{$user->name}}">
        <input type="hidden" name="email" value="{{$user->email}}">
        <div class="send-btn-area">
            <button class="send-btn">送信する</button>
        </div>
    </form>
</div>
@endsection

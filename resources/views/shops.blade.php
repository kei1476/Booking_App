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
                        @if (Auth::check())
                            <li class="main-nav-list"><a href="/shops">店舗一覧</a></li>
                            <form action="/logout" method="POST" class="logout-form">
                                @csrf
                                <button class="logout-btn">ログアウト</button>
                            </form>
                            <li class="main-nav-list"><a href="/mypage">マイページ</a></li>
                        @else
                            <li class="main-nav-list"><a href="/shops">店舗一覧</a></li>
                            <li class="main-nav-list-notlogin"><a href="/register">新規登録</a></li>
                            <li class="main-nav-list"><a href="/login">ログイン</a></li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
        <form action="/shops" method="GET" class="header-search-form">
            <select name="area" class="area">
                <option value="allarea">Allarea</option>
                @foreach($areas as $area)
                    <option value="{{$area->id}}">{{$area->area}}</option>
                @endforeach
            </select>
            <select name="genre" class="genre">
                <option value="allgenre">Allgenre</option>
                @foreach($genres as $genre)
                    <option value="{{$genre->id}}">{{$genre->genre}}</option>
                @endforeach
            </select>
            <div class="search-area">
                <label for="search" class="search-label"><i class="fa-solid fa-magnifying-glass"></i></label>
                <input type="text" name="search" class="search" id="search" placeholder="Search...">
            </div>
            <button class="search-btn">検索</button>
        </form>
    </div>
</header>
<div class="toggle-search-area">
    <button class="toggle-search"><i class="fa-solid fa-chevron-down"></i>条件で絞り込む</button>
</div>
<div class="responsive-search-area">
    <ul>
        <form action="/shops" method="GET">
            <li class="responsive-search-list">
                <select name="area" class="area">
                    <option value="allarea">Allarea</option>
                    @foreach($areas as $area)
                        <option value="{{$area->id}}">{{$area->area}}</option>
                    @endforeach
                </select>
            </li>
            <li class="responsive-search-list">
                <select name="genre" class="genre">
                    <option value="allgenre">Allgenre</option>
                    @foreach($genres as $genre)
                        <option value="{{$genre->id}}">{{$genre->genre}}</option>
                    @endforeach
                </select>
            </li>
            <li class="responsive-search-list">
                <div class="search-area">
                    <input type="text" name="search" class="search" id="responsive-search" placeholder="Search...">
                </div>
            </li>
            <button class="search-btn">検索</button>
        </form>
    </ul>
</div>
<main class="main">
    @foreach($shops as $shop)
    <div class="shop">
        <div class="shop-image-area">
            <img src="data:image/png;base64,<?php echo $shop->path;?>" class="shop-image">
            {{-- ストレージに保存する場合 ↓（本番環境では画像表示できなかったのでコメントアウトしています。） --}}
            {{-- <img src="{{ asset('storage/img/'.$shop->path) }}" class="shop-image"> --}}
        </div>
        <div class="shop-contents">
            <div class="shop-texts">
                <h2 class="shop-name">{{$shop->name}}</h2>
                <p class="shop-tags">#{{$shop->area}} #{{$shop->genre}}</p>
            </div>
            <div class="btn-area">
                <a href="/detail/{{$shop->id}}" class="detail-btn">詳しく見る</a>
                @auth
                @if(!$likes->isEmpty() && $likes->contains('shop_id',$shop->id))
                <a href="/likes/{{$shop->id}}" class="likebtn liked" data-shop-id="{{$shop->id}}"><i class="fa-solid fa-heart"></i></a>
                @else
                <a href="/likes/{{$shop->id}}" data-shop-id="{{$shop->id}}" class="likebtn"><i class="fa-solid fa-heart"></i></a>
                @endif
                @endauth
                @guest
                <a href="/likes/{shop_id?}/" data-shop-id="{{$shop->id}}" class="likebtn"><i class="fa-solid fa-heart"></i></a>
                @endguest
            </div>
        </div>
    </div>
    @endforeach
</main>
<button class="page-top-btn"><i class="fa-solid fa-arrow-up"></i></button>
@component('components.footer')
@endcomponent
@endsection

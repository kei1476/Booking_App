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
<h2>店舗作成画面</h2>
<div class="shop-create-area">
    <form action="/site/create/shop" method="POST" enctype="multipart/form-data" class="register-form">
        @csrf
        <p class="register-title create-shop-tab">店舗作成</p>
        <div class="validate-error-message-area">
            @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                    <p class="validate-error-message">※{{$error}}</p>
                @endforeach
            @endif
        </div>
        <dl class="register-dl create-shop">
            <dt>店名</dt>
                <dd>
                    <input type="text" name="shop_name" placeholder="ShopName" value="{{old('shop_name')}}">
                </dd>

            <dt>ジャンル</dt>
            <dd>
                <select name="genre_id" id="">
                    <option hidden value="">ジャンルを選択してください</option>
                    @foreach($genres as $genre)
                    <option value="{{$genre->id}}"
                        @if("{{$genre->id}}" == old('genre_id')) selected @endif>"
                        {{$genre->genre}}
                    </option>
                    @endforeach
                </select>
            </dd>

            <dt>エリア</dt>
            <dd>
                <select name="area_id" id="">
                    <option hidden value="">エリアを選択してください</option>
                    @foreach($areas as $area)
                    <option value="{{$area->id}}" >{{$area->area}}</option>
                    @endforeach
                </select>
            </dd>

            <dt>店舗画像</dt>
            <dd>
                <input type="file" name="image">
            </dd>

            <dt>店舗概要</dt>
            <dd>
                <textarea name="about" cols="30" rows="10" placeholder="300字以内で入力してください。">{{old('about')}}</textarea>
            </dd>

        </dl>
        <div class="register-btn-area">
            <button class="registration-btn">登録</button>
        </div>
    </form>
</div>
@endsection

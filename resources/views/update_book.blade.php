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
</header>
<h3 class="update-status-title">予約内容変更</h3>
<div class="update-booking-area">
    <form action="/update/book" method="POST" class="update-booking-form">
       @csrf
        @error('book_date')
            <p class="book-error-message"><i class="fa-solid fa-triangle-exclamation"></i>{{$message}}</p>
        @enderror
        <input type="date" class="book-date" name="book_date" value="{{old('book_date')}}">

        @error('book_time')
            <p class="book-error-message"><i class="fa-solid fa-triangle-exclamation"></i>{{$message}}</p>
        @enderror
        <select class="book-time" name="book_time" id="book-time">
            <option hidden value="">時間を選択してください</option>
            @foreach($times as $time)
                <option value="{{$time}}" @if($time ==old('book_time')) selected @endif>{{$time}}</option>
            @endforeach
        </select>

        @error('people')
            <p class="book-error-message"><i class="fa-solid fa-triangle-exclamation"></i>{{$message}}</p>
        @enderror
        <select class="people" name="people">
            <option hidden value="">人数を選択してください</option>
            @for($i = 1; $i < 11; $i++)
                <option value="{{$i}}" @if($i == old('people')) selected @endif>{{$i}}人</option>
            @endfor
        </select>
        <table class="update-booking-content">
            <tr>
                <th>Shop</th>
                <td>{{$book->name}}</td>
            </tr>
            <tr>
                <th>Date</th>
                <td class="show-bookdate">{{$book->book_date}}</td>
            </tr>
            <tr>
                <th>Time</th>
                <td class="show-booktime">{{$book->book_time}}</td>
            </tr>
            <tr>
                <th>Number</th>
                <td class="show-people">{{$book->people}}人</td>
            </tr>
        </table>
        <div class="update-btn-area">
            <button class="update-btn">変更する</button>
        </div>
        <input type="hidden" name="id" value="{{$book->id}}">
    </form>
</div>
@endsection

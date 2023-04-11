@extends('layouts.default')
@section('content')
<x-user-header-menu/>
<h1 class="user-name">{{Auth::user()->name}}さん</h1>
@if(session('status'))
    <p class="success-update-book">{{session('status')}}</p>
@endif
<h3 class="booking-status-title">予約状況</h3>
<div class="show-booking-area">
    @foreach($books as $book)
        <table class="booking-status">
            <tr class="status-row">
                <th class="clock-icon">
                    <i class="fa-regular fa-clock"></i>
                </th>
                <td>
                    <p class="status-title">予約</p>
                    <a href="delete/{{$book->id}}" class="book-delete-btn"><i class="fa-regular fa-circle-xmark"></i></a>
                </td>
            </tr>
                <tr>
                    <th class="status-th">Shop</th>
                    <td class="status-td">{{$book->name}}</td>
                </tr>
                <tr>
                    <th class="status-th">Date</th>
                    <td class="status-td">{{$book->book_date}}</td>
                </tr>
                <tr>
                    <th class="status-th">Time</th>
                    <td class="status-td">{{$book->book_time}}</td>
                </tr>
                <tr>
                    <th class="status-th">Number</th>
                    <td class="status-td">{{$book->people}}人</td>
                </tr>
                <tr>
                    <th class="status-th">Course</th>
                    <td class="status-td">
                        @foreach($courses as $course)
                            @if($book->id == $course->id)
                                {{$course->course_name}}
                            @endif
                        @endforeach
                    </td>
                </tr>
                <tr class="update-book-btn-area">
                    <th class="update-book-btn">
                        <a href="/update/book/{{$book->id}}">予約内容変更</a>
                        @foreach($courses as $course)
                            @if($book->id == $course->id && $course->payment == 0 && $course->price !== 0)
                                <a href="/pay?name={{$book->name}}&course_name={{$course->course_name}}&price={{$course->price}}&book_id={{$book->id}}"
                                    class="pay-link">支払う</a>
                            @elseif($book->id == $course->id && $course->payment == 1)
                                <span class="complete-pay">支払い済み</span>
                            @endif
                        @endforeach
                    </th>
                </tr>
        </table>
    @endforeach
</div>
<h3 class="liked-shops-title">お気に入り店舗</h3>
<div class="show-liked-shops">
    @foreach($likes as $like)
        <div class="liked-shop">
            <div class="shop-image-area">
                <img src="data:image/png;base64,<?php echo $like->path;?>" class="shop-image">
            </div>
            <div class="shop-contents">
                <div class="shop-texts">
                    <h2 class="shop-name">{{$like->name}}</h2>
                    <p class="shop-tags">#{{$like->area}} #{{$like->genre}}</p>
                </div>
                <div class="btn-area">
                    <a href="/detail/{{$like->id}}" class="detail-btn">詳しく見る</a>
                    <a href="/likes/{{$like->id}}" class="deleteLike-btn" data-shop-id="{{$like->id}}"><i class="fa-solid fa-heart liked"></i></a>
                </div>
            </div>
        </div>
    @endforeach
</div>
<button class="page-top-btn"><i class="fa-solid fa-arrow-up"></i></button>
@component('components.footer')
@endcomponent
@endsection

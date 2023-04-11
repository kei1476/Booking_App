@extends('layouts.default')
@section('content')
<x-user-header-menu/>
<div class="shop-detail-wrapper">
    <div class="shop-detail">
        <div class="shop-title-area">
            <a href="/shops" class="detail-back-btn"><i class="fa-solid fa-chevron-left"></i></a>
            <h1 class="detail-shop-name">{{$shop->name}}</h1>
        </div>
        <div class="shop-detail-content">
            <div class="detail-image-area">
                <img src="data:image/png;base64,<?php echo $shop->path;?>" class="detail-image">
                {{-- ストレージに保存する場合 ↓（本番環境では画像表示できなかったのでコメントアウトしています。） --}}
                {{-- <img src="{{ asset('storage/img/'.$shop->path) }}" class="shop-image"> --}}
            </div>
            <div class="detail-content-area">
                <p class="detail-tags">#{{$shop->area}} #{{$shop->genre}}</p>
                <p class="detail-texts">{{$shop->about}}</p>
            </div>
        </div>
    </div>
    <form action="/book" class="booking-area" method="POST">
        @csrf
        <h1 class="booking-title">予約</h1>
        @error('book_date')
            <p class="book-error-message"><i class="fa-solid fa-triangle-exclamation"></i>{{$message}}</p>
        @enderror
        <input type="date" class="book-date" name="book_date" value="{{old('book_date')}}">

        @error('book_time')
            <p class="book-error-message"><i class="fa-solid fa-triangle-exclamation"></i>{{$message}}</p>
        @enderror
        <select  class="book-time" name="book_time" id="book-time" >
            <option hidden value="">時間を選択してください</option>
            @foreach($times as $time)
                <option value="{{$time}}" @if($time == old('book_time')) selected @endif>{{$time}}</option>
            @endforeach
        </select>

        @error('people')
            <p class="book-error-message"><i class="fa-solid fa-triangle-exclamation"></i>{{$message}}</p>
        @enderror
        <select  class="people" name="people">
            <option hidden value="">人数を選択してください</option>
            @for($i = 1; $i < 11; $i++)
               <option value="{{$i}}" @if($i == old('people')) selected @endif>{{$i}}人</option>
            @endfor
        </select>
        @if($courses->isNotEmpty())
            @error('course_id')
                <p class="book-error-message"><i class="fa-solid fa-triangle-exclamation"></i>{{$message}}</p>
            @enderror
            <select class="course" name="course_id">
                <option hidden value="">コースを選択してください</option>
                @foreach($courses as $course)
                <option value="{{$course->id}}" @if($course->id == old('course_id')) selected @endif>{{$course->course_name}}・{{$course->price}}円</option>
                @endforeach
            </select>
        @endif

        <table class="booking-content">
            <tr>
                <th>Shop</th>
                <td>{{$shop->name}}</td>
            </tr>
            <tr>
                <th>Date</th>
                <td class="show-bookdate">{{old('book_date')}}</td>
            </tr>
            <tr>
                <th>Time</th>
                <td class="show-booktime">{{old('book_time')}}</td>
            </tr>
            <tr>
                <th>Number</th>
                <td class="show-people">{{old('people')}}</td>
            </tr>
            @if($courses->isNotEmpty())
            <tr>
                <th>course</th>
                <td class="show-course"></td>
            </tr>
            @endif
        </table>
        <div class="booking-btn-area">
            <button class="booking-btn">予約する</button>
        </div>
        <input type="hidden" name="user_id" value="{{Auth::id()}}">
        <input type="hidden" name="shop_id" value="{{$shop->id}}">
    </form>
</div>
<div class="evaluations-area">
    <h2 class="evaluations-title">口コミ</h2>
    @if(!$evaluations->isEmpty())
        <p class="avg-score">平均 ★{{$avgs}}</p>
    @endif
    @if (Auth::check())
        <div class="send-evaluations-area">
            <form action="/evaluation" method="post" class="evaluation-form">
                @csrf
                <div class="score-area">
                    @error('score')
                    <p class="evaluation-error-message">{{$message}}</p>
                    @enderror
                    <p class="score-label">点数</p>
                    <div class="stars">
                        <span>
                            <input id="review01" type="radio" name="score" value="5"><label for="review01">★</label>
                            <input id="review02" type="radio" name="score" value="4"><label for="review02">★</label>
                            <input id="review03" type="radio" name="score" value="3"><label for="review03">★</label>
                            <input id="review04" type="radio" name="score" value="2"><label for="review04">★</label>
                            <input id="review05" type="radio" name="score" value="1"><label for="review05">★</label>
                        </span>
                    </div>
                </div>
                <div class="comment-area">
                    @error('comment')
                    <p class="evaluation-error-message">{{$message}}</p>
                    @enderror
                    <label for="comment" class="comment-label">口コミ</label>
                    <textarea name="comment" id="comment" placeholder="※30字以上300字以内で入力してください"></textarea>
                </div>
                <div class="evaluation-btn-area">
                    <button class="evaluation-btn">投稿する</button>
                </div>
                <input type="hidden" name="shop_id" value="{{$shop->id}}">
            </form>
        </div>
    @else
        <div class="evaluations-login-btn-area">
            <a href="/login" class="evaluations-login-btn">ログインして口コミを投稿する</a><i class="fa-solid fa-chevron-right"></i>
        </div>
    @endif
    @if(!$evaluations->isEmpty())
        <div class="show-evaluations">
            @foreach($evaluations as $evaluation)
            <div class="evaluations">
                <div class="evaluation-name">
                    <p>{{$evaluation->name}}さん</p>
                </div>
                <div class="evaluation-score">
                    <p>{{$evaluation->score}}点</p>
                </div>
                <div class="evaluation-comment">
                    <p>{{$evaluation->comment}}</p>
                </div>
            </div>
            @endforeach
        </div>
        {{ $evaluations->links() }}
    @else
        <div class="no-evaluations">
            <p class="no-evaluations-text">口コミはまだありません。</p>
        </div>
    @endif
</div>
<button class="page-top-btn"><i class="fa-solid fa-arrow-up"></i></button>
@component('components.footer')
@endcomponent
@endsection

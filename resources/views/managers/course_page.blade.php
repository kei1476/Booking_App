@extends('layouts.managers_default')
@section('content')
<x-header-menu :shopId="$shop_id" />
<h2 class="courses-main-title">コース一覧</h2>
@if(session('status'))
    <p class="success-update-book">{{session('status')}}</p>
@endif
<div class="update-courses">
    <h3 class="courses-title">内容変更</h3>
        @error('update_course_name')
            <p class="course-error-massage">※{{$message}}</p>
        @enderror
        @error('update_price')
            <p class="course-error-massage">※{{$message}}</p>
        @enderror
        @foreach($courses as $course)
            @if($course->price !== 0)
                <form class="create-form" action="/shop/course/update" method="post">
                    @csrf
                    <div class="course-name-area">
                        <input type="text" name="update_course_name" value="{{$course->course_name}}">
                    </div>
                    <div class="price-area">
                        <input type="text" name="update_price" value="{{$course->price}}"><span class="yen">円</span>
                    </div>
                        <div class="course-btn-area">
                            <button class="update-course-btn">更新</button>
                            <input type="hidden" name="course_id" value="{{$course->id}}">
                            <a class="delete-course-btn" href="/shop/course/delete/{{$course->id}}">削除</a>
                        </div>
                </form>
            @endif
        @endforeach
    </div>
    @if(session('success-create'))
        <p class="success-update-book">{{session('success-create')}}</p>
    @endif
    <div class="create-courses">
        <h3 class="courses-title">コース作成</h3>
        @error('course_name')
            <p class="course-error-massage">※{{$message}}</p>
        @enderror
        @error('price')
            <p class="course-error-massage">※{{$message}}</p>
        @enderror
        <form action="/shop/course/create" method="POST">
            @csrf
            <div>
                <label for="course_name">コース名</label>
                <input type="text" name="course_name" id="course_name">
            </div>
            <div>
                <label for="price">価格</label>
                <input type="text" name="price" id="price">
            </div>
            <div class="create-course-btn-area">
                <button class="create-course-btn">作成</button>
            </div>
            <input type="hidden" name="shop_id" value="{{$shop_id}}">
        </form>
    </div>
@endsection


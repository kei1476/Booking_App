@extends('layouts.managers_default')
@section('content')
<x-header-menu :shopId="$shop->id" />
<h2 class="update-info-title">店舗情報更新</h1>
@if(session('status'))
<p class="success-update-book">{{session('status')}}</p>
@endif
<div class="update-shop-info">
    <form action="/shop/Info/edit" method="POST">
        @csrf
        <dl>
            @error('name')
            <p class="book-error-message"><i class="fa-solid fa-triangle-exclamation"></i>{{$message}}</p>
            @enderror
            <dt>店名</dt>
            <dd><input type="text" name="name" value="{{$shop->name}}"></dd>
            @error('genre')
            <p class="book-error-message"><i class="fa-solid fa-triangle-exclamation"></i>{{$message}}</p>
            @enderror
            <dt>ジャンル</dt>
            <dd>
                <select name="genre">
                    @foreach($genres as $genre)
                      <option value="{{$genre->id}}"
                         @if("{{$genre->id}}" == "{{$shop->genre_id}}") selected @endif>{{$genre->genre}}</option>
                    @endforeach
                </select>
            </dd>
            @error('area')
            <p class="book-error-message"><i class="fa-solid fa-triangle-exclamation"></i>{{$message}}</p>
            @enderror
            <dt>エリア</dt>
            <dd>
                <select name="area">
                    @foreach($areas as $area)
                    <option value="{{$area->id}}" @if("{{$area->id}}" == "{{$shop->area_id}}") selected @endif>
                    {{$area->area}}
                    </option>
                    @endforeach
                </select>
            </dd>
            @error('about')
            <p class="book-error-message"><i class="fa-solid fa-triangle-exclamation"></i>{{$message}}</p>
            @enderror
            <dt>店舗説明</dt>
            <dd><textarea name="about" id="" cols="30" rows="10">{{$shop->about}}</textarea></dd>
        </dl>
        <div class="update-button-area">
            <button class="update-btn">更新する</button>
        </div>
        <input type="hidden" name="shop_id" value="{{$shop->id}}">
    </form>
</div>
@endsection

@extends('layouts.managers_default')
@section('content')
<x-header-menu :shopId="$shop_id->shop_id" />
<h1 class="shop-books-title">店舗管理画面</h1>
<h3 class="booking-status-title">店舗予約一覧</h3>
{{ $books->links() }}
<div class="show-booking-area">
    @if($books->isEmpty())
        <p class="no-book-message">予約はありません</p>
    @endif
    @foreach($books as $book)
    <table class="booking-status">
        <tr class="status-row">
            <th class="clock-icon">
                <i class="fa-regular fa-clock"></i>
            </th>
            <td>
                <p class="status-title">予約</p>
                <a href="delete/{{$book->shop_id}}" class="book-delete-btn"><i class="fa-regular fa-circle-xmark"></i></a>
            </td>
        </tr>
        <tr>
            <th class="status-th">Name</th>
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
            <th class="status-th">Email</th>
            <td class="status-td">{{$book->email}}</td>
        </tr>
        <tr class="update-book-btn-area">
            <th class="update-book-btn">
                <a href="/shop/sendmail/{{$book->id}}">メール送信</a>
            </th>
        </tr>
    </table>
    @endforeach
</div>
@endsection

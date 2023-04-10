<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Shop;
use App\Models\Book;
use App\Models\Like;
use App\Models\Genre;
use App\Models\Area;
use App\Models\Course;

class MypageController extends Controller
{
    // マイページ表示
    public function showMypage()
    {
        $user_id = Auth::id();

        // お気に入り店舗取得
        $query = Shop::query();
        $query->select('shops.id','shops.name','shops.genre_id','shops.area_id','genres.genre','areas.area','shops.about','shops.path');
        $query->join('genres','shops.genre_id','=','genres.id');
        $query->join('areas','shops.area_id','=','areas.id');
        $query->join('likes','shops.id','=','likes.shop_id');
        $query->where('user_id',$user_id);
        $likes = $query->get();

        // 予約内容取得
        $query = Shop::query();
        $query->select('shops.id','shops.name','shops.genre_id','shops.area_id','genres.genre','areas.area','books.id','books.book_date','books.book_time','books.people','books.updated_at');
        $query->join('genres','shops.genre_id','=','genres.id');
        $query->join('areas','shops.area_id','=','areas.id');
        $query->join('books','shops.id','=','books.shop_id');
        $query->where('user_id',$user_id);
        $query->orderBy('book_date','desc');
        $books = $query->paginate(3);

        // 予約したコース情報を取得
        $courses = Book::select('books.id','books.course_id','books.payment','books.payment','courses.course_name','courses.price')
                    ->join('courses','books.course_id','=','courses.id')
                    ->where('user_id',$user_id)
                    ->where('course_id','>',0)
                    ->get();

        return view('mypage',compact('likes','books','courses'));
    }

    // 予約取り消し
    public function deleteBook($id)
    {
        Book::where('id',$id)->delete();
        return redirect()->back();
    }

    // 予約変更ページ表示
    public function updateBookPage($id)
    {
        $query = Shop::query();
        $query->select('shops.id','shops.name','shops.genre_id','shops.area_id','genres.genre','areas.area','books.id','books.book_date','books.book_time','books.people');
        $query->join('genres','shops.genre_id','=','genres.id');
        $query->join('areas','shops.area_id','=','areas.id');
        $query->join('books','shops.id','=','books.shop_id');
        $query->where('books.id',$id);
        $book = $query->first();

        $times = config('book_time.times');

        return view('update_book',compact('book','times'));
    }

    // 予約変更
    public function sendUpdateBook(BookRequest $request)
    {
        dd($request->book_date);
        $book_id = $request->id;
        Book::where('id',$book_id)->update([
            'book_date' => $request->book_date,
            'book_time' => $request->book_time,
            'people' => $request->people,
        ]);
        $request->session()->flash('status', '予約変更しました');
        return redirect('/mypage');
    }
}

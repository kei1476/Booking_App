<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ShopInfoRequest;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\User;
use App\Models\Shop;
use App\Models\Book;
use App\Models\Like;
use App\Models\Genre;
use App\Models\Area;
use App\Models\ShopManager;
use App\Models\Course;


class ShopManagerController extends Controller
{
    public function showBooks()
    {
        $manager_id = Auth::guard('admin')->id();

        $shop_id = ShopManager::select('shop_id')
        ->where('id',$manager_id)
        ->first();

        // 予約したユーザーの情報と予約情報
        $books = Book::select('books.user_id','books.shop_id','books.book_date','books.book_time','books.people','books.created_at','users.id','users.name','users.email')
        ->join('users','books.user_id','=','users.id')
        ->where('books.shop_id',$shop_id->shop_id)
        ->orderBy('books.created_at','desc')
        ->paginate(2);

        return view('managers.shop_books',compact('books','shop_id'));
    }

    public function showEditPage($id)
    {
        $areas = Area::all();
        $genres = Genre::all();

         $shop = Shop::select('shops.id','shops.name','shops.genre_id','shops.area_id','genres.genre','areas.area','shops.about','shops.path')
        ->join('genres','shops.genre_id','=','genres.id')
        ->join('areas','shops.area_id','=','areas.id')
        ->find($id);

        return view('managers.update_shop_info',compact('shop','areas','genres'));
    }

    public function updateShopInfo(ShopInfoRequest $request)
    {
        $shop_info = $request->all();

        Shop::where('id',$shop_info['shop_id'])
            ->update([
                'name' => $shop_info['name'],
                'genre_id' => $shop_info['genre'],
                'area_id' => $shop_info['area'],
                'about' => $shop_info['about'],
            ]);

        Course::create([
            'shop_id' => $shop_info['shop_id'],
            'course_name' => $shop_info['course_name'],
            'price' => $shop_info['price']
        ]);

        $request->session()->flash('status', '店舗情報更新しました');

        return back();
    }

    public function sendMailPage($id)
    {
        $user = User::find($id);
        return view('managers.sendmail',compact('user'));
    }

    public function sendMail(Request $request)
    {
        $inputs = $request->all();
        Mail::to($inputs['email'])->send(new ContactMail($inputs));
        return back();
    }

    public function coursePage($id)
    {
        $courses = Course::where('shop_id',$id)->orderBy('price','desc')->get();
        $shop_id = $id;
        return view('managers.course_page',compact('courses','shop_id'));
    }


    public function deleteCourse($id)
    {
        Course::destroy($id);
        return back();
    }

    public function updateCourse(Request $request)
    {
        $course_id = $request->course_id;

        $request->validate([
            'update_course_name' => ['required', 'string', 'max:255'],
            'update_price' => ['required','numeric','max:100000'],
        ]);

        Course::where('id',$course_id)->update([
            'course_name' => $request->update_course_name,
            'price' => $request->update_price
        ]);

        $request->session()->flash('status', 'コース内容を変更しました');

        return back();
    }

    public function createCourse(CourseRequest $request)
    {
        Course::create($request->all());

        $request->session()->flash('success-create', 'コースを追加しました');

        return back();
    }
}

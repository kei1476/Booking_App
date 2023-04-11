<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Http\Requests\EvaluationRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use App\Models\Shop;
use App\Models\Book;
use App\Models\Like;
use App\Models\Genre;
use App\Models\Area;
use App\Models\Evaluation;
use App\Models\Course;



class ShopController extends Controller
{
    // 店舗一覧ページ
    public function index(Request $request)
    {
        $areas = Area::all();
        $genres = Genre::all();
        $area =  $request->input('area');
        $genre = $request->input('genre');
        $search = $request->input('search');
        $user = Auth::id();

        // 店舗情報取得
        $query = Shop::query();
        $query->select('shops.id','shops.name','shops.genre_id','shops.area_id','genres.genre','areas.area','shops.about','shops.path');
        $query->join('genres','shops.genre_id','=','genres.id');
        $query->join('areas','shops.area_id','=','areas.id');

        // 検索条件
        if(!empty($area) && $area !== 'allarea'){
            $query->where('shops.area_id',$area);
        }

        if(!empty($genre && $genre !== 'allgenre')){
            $query->where('shops.genre_id',$genre);
        }

        if(!empty($search)){
            $query->where('shops.name','like','%'.$search.'%');
        }

        $shops = $query->get();

        // お気に入り店舗取得
        if(!empty($user)){
            $likes = Like::where('user_id',$user)->get();
            return view('shops',compact('shops','areas','genres','likes'));
        }

        return view('shops',compact('shops','areas','genres'));
    }

    // 店舗詳細ページ
    public function detail($id)
    {
        // 店舗詳細取得
        $shop = Shop::select('shops.id','shops.name','shops.genre_id','shops.area_id','genres.genre','areas.area','shops.about','shops.path')
        ->join('genres','shops.genre_id','=','genres.id')
        ->join('areas','shops.area_id','=','areas.id')
        ->find($id);

        // コースを取得
        $courses = Course::where('shop_id',$id)->get();

        // 口コミ一覧取得
        $evaluations = Evaluation::select('users.name','evaluations.shop_id','evaluations.comment','evaluations.score','evaluations.created_at')
        ->join('users','evaluations.user_id','=','users.id')
        ->where('shop_id',$id)
        ->orderBy('created_at','desc')
        ->paginate(5);

        // 評価の平均点を取得
        $avgs = Evaluation::selectRaw('score')
        ->where('shop_id',$id)
        ->avg('score');

        $avgs = round($avgs,1);

        $times = config('book_time.times');

        return view('shop_detail',compact('shop','evaluations','avgs','times','courses'));
    }

    // いいねを登録，取り消し
    public function sendLike(Request $request)
    {
        $id = $request->shop_id;
        $user_id = Auth::id();
        $confirm = Like::where('shop_id',$id)
                   ->where('user_id',$user_id)
                   ->get();

        // likeテーブルに登録されているかどうかで分岐
        if($confirm->isEmpty()){
            Like::create([
                'shop_id' => $id,
                'user_id' => $user_id
            ]);
        }else{
            Like::where('shop_id',$id)->delete();
        }

         return redirect()->back();
    }

    // 予約を登録
    public function sendBook(BookRequest $request)
    {
        dd($request->all());
            Book::create($request->all());
            return view('complete');
    }

    // 口コミ投稿
    public function sendEvaluation(EvaluationRequest $request)
    {
        $user_id = Auth::id();
        $shop_id = $request->shop_id;
        $comment = $request->comment;
        $score = $request->score;

        Evaluation::create([
            'user_id' => $user_id,
            'shop_id' => $shop_id,
            'comment' => $comment,
            'score' => $score,
        ]);

        return back();
    }
}

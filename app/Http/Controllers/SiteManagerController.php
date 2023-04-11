<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShopCreateRequest;
use Illuminate\Http\Request;
use App\Models\SiteManager;
use App\Models\ShopManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Shop;
use App\Models\Genre;
use App\Models\Area;
use App\Models\Course;

class SiteManagerController extends Controller
{
    // サイト管理者トップページ表示
    public function siteManagerPage()
    {
        return view('managers.site_manager');
    }

    // 店舗運営者作成
    public function createShopManager(Request $request)
    {
        $request->validate([
            'shop_manager_name' => ['required', 'string', 'max:255'],
            'shop_id' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required',rules\password::defaults()],
        ]);

        ShopManager::create([
            'shop_manager_name' => $request->shop_manager_name,
            'email' => $request->email,
            'shop_id' => $request->shop_id,
            'password' => Hash::make($request->password),
        ]);

        return back();
    }

    // 店舗作成ページ表示
    public function createShopPage()
    {
        $areas = Area::all();
        $genres = Genre::all();

        return view('managers.create_shop',compact('areas','genres'));
    }

    // 店舗作成処理
    public function createShop(ShopCreateRequest $request)
    {
        // $file_name = $request->file('image')->getClientOriginalName();
        // $request->file('image')->storeAs('public/img', $file_name);

        $image = file_get_contents($_FILES['image']['tmp_name']);
        $binary_image = base64_encode($image);

        Shop::create([
            'name' => $request->shop_name,
            'genre_id' => $request->genre_id,
            'area_id' => $request->area_id,
            'about' => $request->about,
            'path' => $binary_image 
        ]);

        return back();
    }
}

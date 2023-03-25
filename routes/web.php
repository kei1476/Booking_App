<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ShopManagerController;
use App\Http\Controllers\SiteManagerController;
use App\Http\Controllers\PaymentsController;

Route::get('/shops',[ShopController::class,'index']);
Route::get('/detail/{id}',[ShopController::class,'detail']);
Route::get('/evaluation/{id}',[ShopController::class,'showEvaluation']);

// ユーザー向けページ
Route::group(['middleware' => 'auth'], function () {
    Route::post('/book',[ShopController::class,'sendBook']);
    Route::get('/likes/{id}/',[ShopController::class,'sendLike']);
    Route::post('/evaluation',[ShopController::class,'sendEvaluation']);
    Route::get('/mypage',[MypageController::class,'showMypage']);
    Route::get('/delete/{id}',[MypageController::class,'deleteBook']);
    Route::get('/update/book/{id}',[MypageController::class,'updateBookPage']);
    Route::post('/update/book',[MypageController::class,'sendUpdateBook']);
});

// 支払いページ
Route::get('/pay', [PaymentsController::class,'paymentPage']);
Route::get('/pay', [PaymentsController::class,'paymentPage']);
Route::post('/pay', [PaymentsController::class,'pay']);

// 管理ページ
require __DIR__.'/managers.php';

// ユーザー認証
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// サイト管理者認証
Route::prefix('site_manager')->name('site_manager.')->group(function(){
require __DIR__.'/site_manager.php';
});

// 店舗代表者認証
Route::prefix('admin')->name('admin.')->group(function(){
    require __DIR__.'/admin.php';
});



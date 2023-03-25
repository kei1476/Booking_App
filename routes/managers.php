<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ShopManagerController;
use App\Http\Controllers\SiteManagerController;

// 店舗代表者ページ
Route::group(['prefix' => 'shop','middleware' => 'auth:admin'], function () {
Route::get('/books',[ShopManagerController::class,'showBooks']);
Route::get('/Info/edit/{id}',[ShopManagerController::class,'showEditPage']);
Route::post('/Info/edit',[ShopManagerController::class,'updateShopInfo']);
Route::get('/sendmail/{id}',[ShopManagerController::class,'sendMailPage']);
Route::post('/sendmail',[ShopManagerController::class,'sendMail']);
Route::get('/course/add/{id}',[ShopManagerController::class,'coursePage']);
Route::get('/course/delete/{id}',[ShopManagerController::class,'deleteCourse']);
Route::post('/course/update',[ShopManagerController::class,'updateCourse']);
Route::post('/course/create',[ShopManagerController::class,'createCourse']);
});

// サイト管理者ページ
Route::group(['prefix' => 'site','middleware' => 'auth:site_manager'], function () {
Route::get('/manager',[SiteManagerController::class,'siteManagerPage']);
Route::post('/manager',[SiteManagerController::class,'createShopManager']);
Route::get('/create/shop',[SiteManagerController::class,'createShopPage']);
Route::post('/create/shop',[SiteManagerController::class,'createShop']);
});

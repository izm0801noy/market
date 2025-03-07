<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| which contains the "web" middleware group. Now create something great!
|
*/

// ログイン、登録ルート
Route::get('/', [AuthController::class, 'index'])->name('home');
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// 認証後のルート
Route::middleware('auth')->group(function () {
    // マイリストページ
    Route::get('/mylist', [ItemController::class, 'mylist'])->name('mylist');
    
    // 商品詳細ページ
    Route::get('/item/{item_id}', [ItemController::class, 'show'])->name('item.show');
    
    // ログアウト
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // 商品一覧（認証後）
    Route::get('/', [ItemController::class, 'index'])->name('home');

    Route::get('/products', [ItemController::class, 'index'])->name('products.index');
    Route::get('/products/{id}', [ItemController::class, 'show'])->name('products.show');
});

    Route::post('/comments/{item}', [ItemController::class, 'storeComment'])->name('comments.store');

    Route::middleware(['auth'])->group(function () {
    Route::get('/mypage', [UserController::class, 'show'])->name('mypage');
});

// 認証が必要なページ
Route::middleware(['auth'])->group(function () {
    Route::get('/mypage', [UserController::class, 'show'])->name('mypage'); // マイページ
    Route::get('/mypage/edit', [UserController::class, 'edit'])->name('profile.edit'); // プロフィール編集ページ
    Route::put('/mypage/update', [UserController::class, 'update'])->name('profile.update'); // プロフィール更新
});

// 出品画面を表示するルート（GET）
Route::get('/sell', [ItemController::class, 'create'])->name('products.create');

// 商品を登録するルート（POST）
Route::post('/sell', [ItemController::class, 'store'])->name('products.store');

// 出品画面の表示（GET）
Route::get('/sell', [ItemController::class, 'create'])->name('products.create');

// 出品データの保存（POST）
Route::post('/sell', [ItemController::class, 'store'])->name('products.store');
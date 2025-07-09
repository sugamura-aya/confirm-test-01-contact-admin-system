<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*➀お問い合わせフォーム入力ページ表示*/
Route::get('/',[ContactController::class,'index']);

/*➁お問い合わせフォーム確認ページ(入力値のバリデーション＆確認画面表示)*/
Route::post('/confirm',[ContactController::class,'confirm']);

/*➂Thanksページ(お問い合わせデータ保存＆Thanksページ表示)*/
Route::post('/thanks',[ContactController::class,'store']);

/*➃管理画面*/
Route::get('/admin',[AdminController::class,'index'])->name('admin.index');

Route::get('/admin/{id}', [AdminController::class, 'show'])->name('admin.show');

/*CSVエクスポート設定*/
Route::get('/admin/export', [AdminController::class, 'export'])->name('admin.export');

/*モーダルウィンドウ内　削除設定*/
Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

/*➄ユーザー登録ページ、➅ログインページ*/
/* 認証済みユーザーのみアクセスできるグループ*/
Route::middleware('auth')->group(function () {
    /* ➃管理画面（トップページ） */
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});






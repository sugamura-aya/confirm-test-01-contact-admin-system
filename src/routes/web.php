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
Route::get('/admin',[AdminController::class,'index']);

/*CSVエクスポート設定*/
Route::get('/admin/export', [AdminController::class, 'export']);

/*モーダルウィンドウ内　削除設定*/
Route::delete('/admin/{id}', [AdminController::class, 'destroy']);


Route::get('/test-view', function () {
    // 仮に categories データを用意（無ければエラーになるので）
    $categories = collect([
        (object)['id' => 1, 'content' => 'お問い合わせ種類1'],
        (object)['id' => 2, 'content' => 'お問い合わせ種類2'],
    ]);

    return view('contact.index', compact('categories'));
});



<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index(Request $request){

        /*お問合せ種類をセレクトボックスにて選択のため、categoriesテーブルのデータをすべて取得*/
        $categories=Category::all();

         // セッションに保存された入力値があれば、それを old に設定
        if ($request->session()->has('contact_data')) {
            $contactData = $request->session()->get('contact_data');
            session()->flashInput($contactData);  
        }
        
        /*indexビューで'categories'を$categoriesで使えるよう返す*/
        return view('contact.index',compact('categories'));
    }

    public function confirm(ContactRequest $request){

        /*dd('ここまで来た！');  ここで止まるか見る*/

        /* 電話番号を結合（例：09012345678）*/
        $tel = $request->tel1 . $request->tel2 . $request->tel3;

        /* セッション保存用に、結合した電話番号を追加した配列を用意*/
        $contactData = $request->all();
        $contactData['tel'] = $tel;
        
        /* 入力値をセッションに保存（sessionの保存式）*/
        /*セッションの中に $contactData（ユーザーが入力したデータの配列）を'contact_data' という名前で保存*/
        $request->session()->put('contact_data', $contactData);

          // カテゴリ名を取得して渡す！
        $category = Category::find($contactData['category_id']);
        $categoryName = $category ? $category->content : '';

        
        /* 確認画面にデータを渡して表示（confirm.blade.php に渡すために、
        この配列を contact という名前でビューに送る）*/
        return view('contact.confirm', ['contact' => $contactData,'categoryName' => $categoryName]);
    }


    public function store(Request $request){

        /* セッションからデータを取り出す*/
        /*confirmメソッドにて、セッションの中に 'contact_data' という名前で保存していた変数を利用し、$contactDataという変数に置き換えて取得*/
        $contactData = $request->session()->get('contact_data');
    
        Contact::create($contactData);/*←一時的にコメントアウト！（画面遷移確認のため、DBに保存されないように）*/
    
        /* セッション削除（完了後)*/
        $request->session()->forget('contact_data');
    
        return view('contact.thanks');
    }
}

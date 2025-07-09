<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    // ① 一覧・検索表示
    public function index(Request $request)
    {
        $query = Contact::query();

        // 検索条件ごとにローカルスコープ適用
        $query->nameSearch($request->name)
              ->emailSearch($request->email)
              ->genderSearch($request->gender)
              ->categorySearch($request->category_id)
              ->dateSearch($request->date);

        $contacts = $query->paginate(7); // ページネーション：7件ずつ
        $categories = Category::all();   // セレクトボックス用

        return view('admin.index', compact('contacts', 'categories'));
    }

    // ② CSV出力（絞り込み条件付き）
    public function export(Request $request)
    {
        $query = Contact::query();

        // indexと同じように検索条件を適用
        $query->nameSearch($request->name)
              ->emailSearch($request->email)
              ->genderSearch($request->gender)
              ->categorySearch($request->category_id)
              ->dateSearch($request->from_date, $request->to_date);

        $contacts = $query->get();

        // CSV生成
        $csv = '';
        $csv .= "ID,名前,性別,メールアドレス,電話番号,住所,お問い合わせ内容,登録日\n";

        foreach ($contacts as $contact) {
            $csv .= "{$contact->id},{$contact->full_name()},{$contact->gender},{$contact->email},{$contact->tel},{$contact->address},\"{$contact->detail}\",{$contact->created_at}\n";
        }

        return Response::make($csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="contacts.csv"',
        ]);
    }

    // ③ 削除（モーダルから実行）
    public function destroy($id)
    {
        /*dd('削除されるよ！ID: '.$id); ←削除機能確認のため使用*/

        Contact::destroy($id);
        return redirect('/admin');
    }

    /*④詳細ページ*/
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.show', compact('contact'));
    }
    
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;


    /*contactsテーブルの下記カラムを操作可能にする設定*/ 
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail',
        /*リレーションを設定するため、外部キーのcategory_idにも許可リストをつける*/
        'category_id'
    ];

    /*Categoryモデル：Contactモデル＝親：子*/
    /*リレーションを繋げる（リレーション先をかく）（子モデル側）*/
    public function category(){

        /*「$this(Contactモデル)はCategoryモデルに属する」*/
        return $this->belongsTo(Category::class);
    }

    /*氏名の結合*/
    public function full_name()
    {
        return $this->last_name . ' ' . $this->first_name;
    }


    /*詳細ページでハイフン付きで結合した電話番号を表示*/
    /*viewファイルには<p>電話番号：{{ $contact->formatted_tel() }}</p>のように記述*/
    public function formatted_tel()
    {
        return substr($this->tel, 0, 3) . '-' . substr($this->tel, 3, 4) . '-' . substr($this->tel, 7);
    }


    /*以下ローカルスコープ*/
    public function scopeNameSearch($query, $name)
    {
        if (!empty($name)) {
            $query->where(function ($q) use ($name) {
                $q->where('first_name', 'like', "%$name%")
                  ->orWhere('last_name', 'like', "%$name%")
                  ->orWhereRaw("CONCAT(last_name, first_name) LIKE ?", ["%{$name}%"])
                  ->orWhere('email', 'like', "%{$name}%"); //←名前のローカルスコープにemailのローカルスコープを追加。
            });
        }
    }

    /*public function scopeEmailSearch($query, $email)
    {
        if (!empty($email)) {
            $query->where('email', 'like', "%$email%");
        }
    }  名前のローカルスコープに組み込んだため、メールのローカルスコープは不要に。*/

    public function scopeGenderSearch($query, $gender)
    {
        if (!empty($gender)) {
            $query->where('gender', $gender);
        }
    }

    public function scopeCategorySearch($query, $category_id)
    {
        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
        }
    }

    public function scopeDateSearch($query, $date)
    {
        if (!empty($date)) {
            $query->whereDate('created_at', $date);
        }
    }
}

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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    /*categoriesテーブルの以下のカラムを操作可能に設定*/
    protected $fillable=[
        'content'
    ];



    /*Categoryモデル：Contactモデル＝親：子*/
    /*リレーションを繋げる（親モデル側）*/
    public function contact(){

        /*「$this(Categoryモデル)はContactモデルを複数有する」*/
        return $this->hasMany(Contact::class);
    }
}

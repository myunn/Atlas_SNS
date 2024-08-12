<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // fillableを使用することで、特定のカラムのみcreateやupdateを可能にする。
    protected $fillable = [
        'post','user_id'
    ];
}

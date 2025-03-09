<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // fillableを使用することで、特定のカラムのみcreateやupdateを可能にする。
    protected $fillable = [
        'post','user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    // 検索ページの検索ワードの表示
    public function search(Request $request){
        $search_word = $request->input('search_word');
    }

    // フォローしているユーザーを取得
    public function followings(){
        return $this->belongsToMany(User::class,'follows','follower_id','followed_id');
    }

    // ツイート取得
    public function posts(){
        return $this->hasMany(Post::class);
    }
}

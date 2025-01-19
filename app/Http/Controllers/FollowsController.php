<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Follow;
use resources\views\Auth;

class FollowsController extends Controller
{
    //記載)フォロー・フォロワー数の表示（following_idにある自分のid＝フォロー数）
    public function following(){
        $followings = Follow::where('following_id',Auth::id())->get();
        return view('auth.login',compact('followings'));
    }

    public function followed(){
        $followeds = Follow::where('followed_id',Auth::id())->get();
        return view('auth.login',compact('followerds'));
    }

    // 記載)フォロー・フォロワーリストに戻る
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }
}

// あってるかわからん(https://laratech.jp/posts/laravel-follow/)
// 記述)フォロー・フォロワー情報の引用
// {
//     public function ($user_Id)
//     {
//         Auth::user()->follows()->attach($user_Id);
//         return;
//     }
// }

// フォロー・フォロワー数の表示
public function postCounts(){
    $posts = Post::get();
    return view('follows',compact('posts'));
}

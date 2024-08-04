<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Follow;

class FollowsController extends Controller
{
    //記載：フォロー・フォロワー数の表示（following_idにある自分のid＝フォロー数）
    public function following(){
        $followings = Follow::where('following_id',Auth::id())->get();
        return view('auth.login',compact('followings'));
    }

    public function followed(){
        $followeds = Follow::where('followed_id',Auth::id())->get();
        return view('auth.login',compact('followerds'));
    }

    // 記載：フォロー・フォロワーリストに戻る
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }
}

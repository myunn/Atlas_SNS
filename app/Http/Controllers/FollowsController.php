<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
    // フォロワーページ
    public function followList(){
        // $followLists = followList::all();
            return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }


    // フォロー・フォロー解除
    // フォロー
    public function follow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if(!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($user->id);
            return back();
        }
    }
    // フォロー解除
    public function unfollow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if($is_following) {
            // フォローしていればフォローを解除する
            $follower->unfollow($user->id);
            return back();
        }
    }

    //
}

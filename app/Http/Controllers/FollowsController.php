<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use Illuminate\Support\Facades\Auth;
use App\Post;

class FollowsController extends Controller
{
    //記載)フォロー・フォロワー数の表示（following_idにある自分のid＝フォロー数）
    public function login($id){
        $user = User::findOrFail($id);
        $followCount = $user->followings()->count();
        return view('auth.login','followCount');

        // $followings = Follow::where('following_id',Auth::id())->get();
        // return view('auth.login',compact('followings'));
    }

    public function followed(){
        $followeds = Follow::where('followed_id',Auth::id())->get();
        return view('auth.login',compact('followerds'));
    }

    // 記載)フォロー・フォロワーリストに戻る
    public function followList(){
        // フォロワーのユーザー情報を取得する
        $followed_users = User::query()->whereIn('id',Auth::user()->follows()->pluck('followed_id'))->get();
        // フォロワーの投稿情報を新しい順で取得
        $posts = Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('followed_id'))->latest()->get();
        return view('follows.followList',compact('posts','followed_users'));
    }

    public function followerList(){
        // フォローしてるユーザー情報を取得するにしたい
        $following_users = User::query()->whereIn('id',Auth::user()->follows()->pluck('following_id'))->get();
        // フォローしてるユーザーの投稿情報を新しい順で取得
        $posts = Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('following_id'))->latest()->get();
        return view('follows.followerList',compact('posts','following_users'));
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

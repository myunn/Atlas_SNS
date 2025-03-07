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
        $posts = Post::query()->whereIn('user_id',Auth::user()->follows()->pluck('following_id'));
        dd($posts);
        return view('follows.followList')->with([
        'posts' => $posts]);
        // $posts = Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('following_id'))->latest()->get();
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

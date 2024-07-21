<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(){
        return view('users.search');
    }
    // 記載：フォロワーとフォローリスト
    public function followerList(){
        return view('follows.followerList');
    }
    public function followList(){
        return view('follows.followList');
    }
    // 記述：下記にユーザー情報を受け取る
    // これじゃない？public function users(Request $request){
        // $username = $request->input('username');
        // Register::create(['username' => $username]);
        // return back();
    public function users(){
        return view('Auth.added');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Follow;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    // searchページへの情報取得
    // 検索ボックスでのキーワード一部でも引っかかれば情報引っ張ってくる
    public function search(Request $request){
        $keyword = $request->input('keyword');

        if(!empty($keyword)){
            $users=User::where('username','like', '%'.$keyword.'%')->get();
        }else{
            $users = User::get();
        }
        return view('users.search',['users'=>$users,'keyword'=>$keyword]);
    }

    // 記載：フォロワーとフォローリスト
    public function followerList(){
        return view('follows.followerList');
    }
    public function followList(){
        return view('follows.followList');
    }
    public function users(){
        return view('Auth.added');
    }

    // 相手のプロフィール
    public function users_profile($id){
    //     // 選択されたユーザーidの取得
        $user = User::findOrFail($id);
    //     // フォローしているユーザーの投稿を取得
        $posts = Post::with('user')->where('user_id',$user->id)->latest()->get();
    //     // フォローしているかどうか確認
        $isFollowing = Auth::user()->isFollowing($user->id);
    //     // 候補①：フォロー・フォロワーからの参考
    // // $posts = Post::with('user')->whereIn('user_id',Auth::user()->follows()->pluck('following_id'))->latest()->get();
        return view('users.users_profile',compact('user','posts','isFollowing'));
    }

    // 候補②:調べたやつ
    // public function users_profile(User $user){
    //     $posts = $user->posts()->latest()->get();
    //     return view('users_profile',compact('user','posts'));
    // }

    // プロフィール編集ページから相手のプロフィールへ
    public function showUserProfile($userId)
    {
    // ユーザー情報を取得
    $user = User::find($userId);

    // ユーザーの投稿を取得
    $posts = Post::where('user_id', $userId)->orderBy('created_at', 'desc')->get();

    // ビューにデータを渡す
    return view('users_profile', compact('user', 'posts'));
    }

    // プロフィール編集
    public function update(Request $request){
        $user = Auth::user();
        dd($user);
    }



    // 候補①：調べたやつ
    // public function update_info (Request $request){
    //     $$id = Auth::id();
    //     $username = $request->input('username');
    //     $mail = $request->input('mail');
    //     $password = $request->input('password');
    //     $bio = $request->input('bio');
    //     $icon_image = $request->file('icon_image');
    //     if ($request->hasFile('image')) {
    //         $path = \Strage::put('/public',$images);
    //         $path = explode('/',$path);
    //     } else {
    //         $path = null;
    //     }
    //     \DB::table('users')
    //         ->where('id',$id)
    //         ->update(
    //             [
    //                 'username' => $username,
    //                 'mail' => $mail,
    //                 'password' => $password,
    //                 'text' => $text,
    //                 'images' => $images
    //             ]
    //             );
    //             return redirect('top');
    // }


    // // プロフィール編集：アイコン画像のアップデート
    // public function storage(Request $request){
    //     $image = $request->image->storage('');
    // }
}

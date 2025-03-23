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
    // 候補②：調べたやつ（下記は情報拾えてるか確認用でddになってる）
    // public function update(Request $request){
    //     $user = Auth::user();
    //     dd($user);
    // }

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

    public function update(Request $request){
    if($request->isMethod('post')){

    // 編集情報のバリデーション機能実装
    $request->validate([
        'username' => 'required|min:2|max:12',
        'mail' => 'required|unique:users|min:5|max:40|email'.Auth::id(),
        'password' => 'required|confirmed|alpha_num|min:8|max:20',
        'password_Confirmation' => 'required|confirmed|alpha_dash|min:8|max:20',
        'bio' => 'nullable|max:150',
        'icon_image' => 'nullable|image|mimes:jpg,png,bmp,gif,svg',
    ]);

    // バリデーション後の処理
        $user = User::find(Auth::id());
        $user->username = $request->input('username');
        $user->mail = $request->input('mail');

    if ($request->filled('password')) {
        $user->password = bcrypt($request->input('password'));
        }

    // 自己紹介は入力されている場合のみ更新
    if ($request->filled('bio')) {
        $user->bio = $request->input('bio');
    }
    // アイコン画像は登録されれば処理
    if ($request->hasFile('icon_image')) {
        $iconImage = $request->file('icon_image');
        $path = $iconImage->store('icons', 'public'); // 'icons'フォルダに保存
        $user->icon_image = $path; // パスを保存
    }
    // ユーザー情報を保存
    $user->save();

    return redirect('/top');
    }
    }
}

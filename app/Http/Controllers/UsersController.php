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
        return view('users.users_profile',compact('user','posts','isFollowing'));
    }


    // フォロー・フォロワーページから相手のプロフィールへ
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
// ユーザー情報の更新
    // 入力されたデータ
    public function update(Request $request){
        if($request->isMethod('post')){
        // 更新情報のバリデーション機能実装
        $request->validate([
            'username' => 'required|min:2|max:12',
            'mail' => ['required','email','min:5','max:40','string','unique:users,mail,'.Auth::user()->mail.',mail'],
            'password' => 'required|confirmed|alpha_num|min:8|max:20',
            'bio' => 'nullable|max:150',
            'images' =>'nullable|image|mimes:jpg,png,bmp,gif,svg',
        ]);
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $bio = $request->input('bio');
        $images = $request->input('images');

        // 実際のアップデート処理
        $user=Auth::user()->update([
            'username' => $username,
            'mail'=> $mail,
            'password'=> bcrypt($password),

        ]);
        Auth::user()->bio = $bio;
        Auth::user()->images = $images;
        Auth::user()->save();
        return redirect('/top');
        }
        }
}

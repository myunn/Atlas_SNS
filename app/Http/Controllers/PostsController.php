<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostsController extends Controller
{
    // 記載：バリデーション機能の実装(つぶやき投稿)
    public function authorCreate(Request $request)
    {
        $request->validate([
            'post' => 'required|min:1|max:150',
            ]);

    }
    public function index(){
         $posts = Post::get();
        return view('posts.index',['posts'=>$posts]);
    }

    // 記述）フォローしているユーザーのみ情報を取得
    // 記述）ユーザーIDの取得
    // public function index(){
    //     $following_id = Auth::user()->follows()->pluck('user_id');
    // // フォローしているユーザーのIDを元に投稿内容を取得
    // $posts = Post::with('user')->whereIn('post',$following_id)->get();
    // return view('posts.index',compact('posts'));
    // }

    public function create(Request $request){
        $post = $request->input('post');
        // Auth::id()はbladeに記載しなくても、controllerのみに記載でOK
        $user_id = Auth::id();
        Post::create(['post' => $post, 'user_id' => $user_id]);
        // use宣言しないとどこのことかわからないから機能しないので注意！また、頭文字は大文字になるのでこそも注意！(Authとpost)
        // redirect:URLで記載する。（web.phpの"/top"表示に入りなおす指示。
        return redirect('/top');

    }

        public function update(Request $request){
        $post = $request->input('post');
        $post_id = $request->input('post_id');
        // Auth::id()はbladeに記載しなくても、controllerのみに記載でOK
        Post::where('id', $post_id)->update([
            'post' => $post
        ]);

        // use宣言しないとどこのことかわからないから機能しないので注意！また、頭文字は大文字になるのでこそも注意！(Authとpost)
        // redirect:URLで記載する。（web.phpの"/top"表示に入りなおす指示。
        return redirect('/top');

    }

        public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('/top');
    }
}

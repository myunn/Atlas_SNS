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
        return view('posts.index');
    }

    public function create(Request $request){
        $post = $request->input('post');
        // Auth::id()はbladeに記載しなくても、controllerのみに記載でOK
        $user_id = Auth::id();
        Post::create(['post' => $post, 'user_id' => $user_id]);
        // use宣言しないとどこのことかわからないから機能しないので注意！また、頭文字は大文字になるのでこそも注意！(Authとpost)
        // redirect:URLで記載する。（web.phpの"/top"表示に入りなおす指示。
        return redirect('/top');

    }

}

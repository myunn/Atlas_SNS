<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $comment = $request->input('comment');
        return view('post.index')->with(["comment" =>$comment,
    ]);
    }
}

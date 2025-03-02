@extends('layouts.login')

@section('content')
<!-- アイコン一覧の表示 -->
<div class=all_users_icon>
  <a>フォロワーリスト</a>
  <img src="http://127.0.0.1:8000/images/{{Auth::user()->images}}">
</div>

<!-- 投稿一覧 -->


<!-- 使用するところは下記 -->
<!-- followsController>followリストメソッド -->
<!-- ユーザー取得とか引っ張ってきたい情報を追記する -->

@endsection

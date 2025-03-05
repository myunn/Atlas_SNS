@extends('layouts.login')

@section('content')
<!DOCTYPE HTML>
<html>
<body>

<!-- アイコン一覧の表示 -->
  <p class="follow-list-title">フォローリスト</p>
  @foreach ($posts as $post)
  <div class=all_follow-users_icon>
  <img src="http://127.0.0.1:8000/images/{{$post->user->images}}" class="follow-List">
  </div>
  @endforeach

  <div id="under-bar"></div>

<!-- 投稿一覧 -->
  @foreach ($posts as $post)
<div class="follow-users-all">
  <div class="follow-users-info">
  <img src="http://127.0.0.1:8000/images/{{$post->user->images}}">
  <p>{{ $post->user->username }}</p>
  <p class="date">{{ $post->updated_at }}</p>
  <p>{{ $post->post }}</p>
  </div>
</div>
<!-- 下線追加 -->
<hr>
  @endforeach
<!-- 使用するところは下記 -->
<!-- followsController>followリストメソッド -->
<!-- ユーザー取得とか引っ張ってきたい情報を追記する -->
</body>
</html>
@endsection

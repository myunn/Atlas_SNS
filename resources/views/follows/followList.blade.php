@extends('layouts.login')

@section('content')
<!-- アイコン一覧の表示 -->
<p class="follow-list-title">フォローリスト</p>
<div class=A>
  @foreach ($followed_users as $followed_user)
  <div class=all_follow-users_icon>
    <img src="images/{{$followed_user->images}}" class="follow-List">
  </div>
  @endforeach

  <div id="under-bar"></div>
</div>

<!-- 投稿一覧 -->
<div>
  @foreach ($posts as $post)
  <div class="follow-users-all">
    <div class="follow-users-info">
      <img src="images/{{$post->user->images}}">
      <p class="username">{{ $post->user->username }}</p>
      <p class="date">{{ $post->updated_at }}</p>
      <p class="post">{{ $post->post }}</p>
    </div>
  </div>
    <!-- 下線追加 -->
  <hr>
  @endforeach
    <!-- 使用するところは下記 -->
    <!-- followsController>followリストメソッド -->
    <!-- ユーザー取得とか引っ張ってきたい情報を追記する -->
</div>
@endsection

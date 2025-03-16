@extends('layouts.login')

@section('content')
<!-- アイコン一覧の表示 -->
<div class=A>
<p class="follower-list-title">フォロワーリスト</p>
  @foreach ($following_users as $following_user)
  <div class=all_follow-users_icon>
    <a href="/users_profile"><img src="images/{{$following_user->images}}" class="follow-List"></a>
  </div>
  @endforeach
</div>

<div id="under-bar"></div>

<!-- 投稿一覧 -->
<div>
  @foreach ($following_posts as $following_post)
  <div class="follow-users-all">
    <div class="follow-users-info">
      <img src="images/{{$following_post->user->images}}">
      <p class="username">{{ $following_post->user->username }}</p>
      <p class="date">{{ $following_post->updated_at }}</p>
      <p class="post">{{ $following_post->post }}</p>
    </div>
  </div>
    <!-- 下線追加 -->
  <hr size="120" noshade>
  @endforeach
    <!-- 使用するところは下記 -->
    <!-- followsController>followリストメソッド -->
    <!-- ユーザー取得とか引っ張ってきたい情報を追記する -->
</div>
@endsection

@extends('layouts.login')

@section('content')
<!-- アイコン一覧の表示 -->
<div class=A>
  <p class="follow-list-title">フォローリスト</p>
  @foreach ($followed_users as $followed_user)
    <div class=all_follow-users_icon>
      <a href="/users_profile/{{$followed_user->id}}"><img src="images/{{$followed_user->images}}" class="follow-List"></a>
    </div>
  @endforeach
</div>

<div id="under-bar"></div>

<!-- 投稿一覧 -->
<div>
  @foreach ($posts as $post)
  <div class="follow-users-all">
    <div class="follow-users-info">
      <div class="followlist_1">
        <img src="images/{{$post->user->images}}">
      </div>
      <div class="followlist_2">
        <p class="username">{{ $post->user->username }}</p>
        <p class="post">{{ $post->post }}</p>
      </div>
      <div class="followlist_3">
        <p class="date">{{ $post->updated_at }}</p>
      </div>
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

@extends('layouts.login')

@section('content')
<!-- 検索用の入力箇所・ボタン設定 -->
<div class="search_area">
  <form action="/search" method="post">
  @csrf
    <div class=becide>
      <input type="text" name="keyword" class="form" placeholder="ユーザー名">
    </div>
    <div class=becide>
      <h1><a href="/user"><img src="http://127.0.0.1:8000/images/search.png"></a></h1>
    </div>
  </form>
</div>

<!-- ユーザー一覧表示 -->
@foreach($users as $user)
<div class="user_list">
  <div class="user_info">
    <img src="http://127.0.0.1:8000/images/{{$user->images}}">
    <p>{{ $user->username }}</p>
  </div>


  <!-- フォロー・フォロー解除ボタン -->
  <button class="follow-button"><a href="/search">フォローする</a></button>
  <button class="unfollow-button"><a href="/search">フォロー解除</a></button>
</div>
@endforeach

@endsection

@extends('layouts.login')

@section('content')
<!-- 検索用の入力箇所・ボタン設定 -->
<form action="/search" method="post">
@csrf
<div class=becide>
  <input type="text" name="keyword" class="form" placeholder="ユーザー名">
</div>
<div class=becide>
  <h1><a href="/user"><img src="http://127.0.0.1:8000/images/search.png"></a></h1>
  </form>
</div>

<!-- ユーザー一覧表示 -->
@foreach($users as $user)
<div class=becide>
  <p>{{ $user->username }}</p>
    <img src="http://127.0.0.1:8000/images/{{$user->images}}">
</div>


  <!-- フォロー・フォロー解除ボタン -->
  <div class=becide>
  <div>
    <button class="follow-button"><a href="/search">フォローする</a></button>
  </div>
  <div>
    <button class="unfollow-button"><a href="/search">フォロー解除</a></button>
  </div>
</div>
@endforeach

@endsection

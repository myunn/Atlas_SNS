@extends('layouts.login')

@section('content')
<!-- 検索用の入力箇所・ボタン設定 -->
<form action="/search" method="post">
@csrf
<input type="text" name="keyword" class="form" placeholder="ユーザー名">
<h1><a href="/user"><img src="http://127.0.0.1:8000/images/search.png"></a></h1>
</form>

<!-- フォロー・フォロー解除ボタン -->
<div class="followbutton">
 <button id="follow-button"><a href="/search">フォローする</a></button>
</div>
<div class="unfollowbtn">
 <button id="unfollow-button"><a href="/search">フォロー解除</a></button>
</div>

@endsection

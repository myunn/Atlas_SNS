@extends('layouts.login')

@section('content')
<!-- 検索用の入力箇所・ボタン設定 -->
<form action="/search" method="post">
@csrf
<input type="text" name="keyword" class="form" placeholder="ユーザー名">
<h1><a href="/user"><img src="http://127.0.0.1:8000/images/search.png"></a></h1>
</form>

@endsection

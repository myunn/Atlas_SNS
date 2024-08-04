@extends('layouts.login')

@section('content')


<!-- 記述： 投稿内容の反映-->
<!DOCTYPE HTML>
<html>
<body>
  <form action="/post" method="POST">
  <h2><a href="/top"><img src="http://127.0.0.1:8000/images/icon1.png"></a></h2>
  <textarea placeholder="投稿内容を入力ください。"></textarea>
  </form>
</body>
</html>

@endsection

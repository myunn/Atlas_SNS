<!-- 下記からデータを引っ張ってくる（フォルダ名.ファイル名） -->
@extends('layouts.login')

@section('content')


<!-- 記述： 投稿内容の入力欄作成-->
<!DOCTYPE HTML>
<html>
<body>
  <form action="/post" method="POST">
  <h2><a href="/top"><img src="http://127.0.0.1:8000/images/icon1.png"></a></h2>
  <textarea placeholder="投稿内容を入力ください。"></textarea>
  {!! Form::open(['url' => '/author/index']) !!}
  {{ Form::input('text','index' null,['required','class' => 'form-control','placeholder' => 'コメント'])}}
  <h2><a href="/post"><img src="http://127.0.0.1:8000/images/post.png"></a></h2>
  </form>
</body>
</html>

@endsection

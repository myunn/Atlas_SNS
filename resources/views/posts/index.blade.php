<!-- 下記からデータを引っ張ってくる（フォルダ名.ファイル名） -->
@extends('layouts.login')

@section('content')


<!-- 記述： 投稿内容の入力欄作成-->
<!DOCTYPE HTML>
<html>
<body>
<h2><a href="/top"><img src="http://127.0.0.1:8000/images/icon1.png"></a></h2>
<form action="/post" method="POST">
  <!-- @csrf:フォームの脆弱性対策コードなので、フォーム使用時に必要（ないとエラー出る） -->
  @csrf
  <input type="text" name="post" placeholder="投稿内容を入力ください。">
  {!! Form::open(['url' => 'post/create']) !!}
  <!--<input type="hidden" name="user_id" value="{{-- Auth::id() --}}">-->
  <input type="submit" value=" " class="submit_btn">
  {!! Form::close() !!}
  </form>

  <!-- 一覧表示 -->
  @foreach ($posts as $post)
  <div>
      <p>{{ $post->post }}</p>
      <p>{{ $post->updated_at }}</p>
  </div>
  @endforeach
</body>
</html>

@endsection

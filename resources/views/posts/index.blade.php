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
  <div class="text-post">>
  <input type="text" name="post" placeholder="投稿内容を入力ください。">
  {!! Form::open(['url' => 'post/create']) !!}
  <!--<input type="hidden" name="user_id" value="{{-- Auth::id() --}}">-->
  </class=>

  <!-- 画像に機能を追加する -->
  <div>
  <input type="image" value="" src="http://127.0.0.1:8000/images/post.png" class="submit_btn">
  {!! Form::close() !!}
  </div>
  </form>

  <!-- 一覧表示 postからとってきた情報の何を表示するか指定-->
  @foreach ($posts as $post)
  <div>
      <img src="http://127.0.0.1:8000/images/{{$post->user->images}}">
      <p>{{ $post->user->username }}</p>
      <p>{{ $post->updated_at }}</p>
      <p>{{ $post->post }}</p>
    </div>
  @endforeach
</body>
</html>

@endsection

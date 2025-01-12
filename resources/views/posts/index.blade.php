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
  <div class="text-post">
  <input type="text" name="post" placeholder="投稿内容を入力ください。">
  {!! Form::open(['url' => 'post/create']) !!}
  <!--<input type="hidden" name="user_id" value="{{-- Auth::id() --}}">-->
</div>

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

<!-- ログインユーザーの記載・削除アイコンの表示指定 -->
  @if ($post->user_id == Auth::id())
  <!-- コメント編集用のモーダル追加 -->
  <button class="modal-open js-modal-open">
      <img src="http://127.0.0.1:8000/images/edit.png">
</button>
<div class="modal js-modal">
  <div class="modal-container">
    <!-- モーダルを閉じるボタン -->
    <div class="modal-close js-modal-close">
      <img src="http://127.0.0.1:8000/images/edit.png">
    </div>
    <!-- モーダル内部のコンテンツ -->
    <div class="modal-content">
      <form action="/post" method="POST">
  <!-- @csrf:フォームの脆弱性対策コードなので、フォーム使用時に必要（ないとエラー出る） -->
  @csrf
  <div class="text-post">
    <input type="text" name="post">
  {!! Form::open(['url' => 'post/create']) !!}
    </div>
  </div>
</div>

<!-- 削除用のモーダル作成 -->
      <button class="modal-open js-modal-open">
<img src="http://127.0.0.1:8000/images/trash.png">
</button>
<div class="modal js-modal">
  <div class="modal-container">
    <!-- モーダルを閉じるボタン -->
    <div class="deletebtn">
 <button id="delete-button"><a href="/top">OK</a></button>
 </div>
 <button id="cxl-button"><a href="/top">キャンセル</a></button>
</div>
    </div>
    <!-- モーダル内部のコンテンツ -->
    <div class="modal-content">
      <form action="/post" method="POST">
  @endif
    </div>
  @endforeach
</body>
</html>

@endsection

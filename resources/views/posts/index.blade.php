<!-- 下記からデータを引っ張ってくる（フォルダ名.ファイル名） -->
@extends('layouts.login')

@section('content')

<!-- 新規投稿エリア -->
<!-- 記述： 投稿内容の入力欄作成-->
<!DOCTYPE HTML>
<html>
<body>
<h2><a href="/top"><img src="http://127.0.0.1:8000/images/icon1.png"></a></h2>
<form action="/post" method="POST">
  <!-- @csrf:フォームの脆弱性対策コードなので、フォーム使用時に必要（ないとエラー出る） -->
  @csrf
  <div class="top_1">
    <div class="text-post">
    <input type="text" name="post" class="form" placeholder="投稿内容を入力ください。">
    {!! Form::open(['url' => 'post/create']) !!}
    <div id="under-bar">
    </div>
    <!--<input type="hidden" name="user_id" value="{{-- Auth::id() --}}">-->
    </div>

<!-- 画像に機能を追加する -->
    <div class="submit">
    <img  src="http://127.0.0.1:8000/images/post.png" class="submit_btn">
    {!! Form::close() !!}
    </div>
    </form>
    <!-- ここまで新規投稿エリア -->

<!-- 投稿一覧エリア -->
    <!-- 一覧表示 postからとってきた情報の何を表示するか指定-->
    @foreach ($posts as $post)
    <div class="user_info">
      <img src="http://127.0.0.1:8000/images/{{$post->user->images}}">
      <p>{{ $post->user->username }}</p>
      <p>{{ $post->updated_at }}</p>
      <p>{{ $post->post }}</p>
      <a?><hr class="dropdown-divider"></a>
    </div>

<!-- ログインユーザーの記載・削除アイコンの表示指定 -->
    @if ($post->user_id == Auth::id())
    <!-- 編集ボタン -->
    <button class="modal-open js-modal-open" post="{{ $post->post }}" post_id="{{ $post->id }}">
    <img src="http://127.0.0.1:8000/images/edit.png">
    </button>
<!-- ここまで編集ボタン -->
<!-- 削除ボタン -->
    <a class="btn btn-danger" href="/post/{{$post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="http://127.0.0.1:8000/images/trash.png"></a>
<!-- ここまで削除ボタン -->
    @endif
    </div>
  </div>
    @endforeach
 <!-- ここまで投稿一覧エリア -->

 <!-- モーダルエリア -->
  <div class="modal js-modal">
    <div class="modal-container">
      <!-- モーダルを閉じるボタン -->
      <div class="modal-close js-modal-close">
        <img src="http://127.0.0.1:8000/images/edit.png">
      </div>
      <!-- モーダル内部のコンテンツ -->
      <div class="modal-content">
        <form action="/update" method="POST">
          @csrf
          <!-- @csrf:フォームの脆弱性対策コードなので、フォーム使用時に必要（ないとエラー出る） -->
          <div class="text-post">
            <input type="text" name="post" value="" class="modal_post">
            <input type="hidden" name="post_id" value="" class="modal_id">
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>

@endsection

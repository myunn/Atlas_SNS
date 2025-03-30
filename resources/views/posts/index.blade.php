<!-- 下記からデータを引っ張ってくる（フォルダ名.ファイル名） -->
@extends('layouts.login')

@section('content')

<!-- 新規投稿エリア -->
<!-- 記述： 投稿内容の入力欄作成-->
<!DOCTYPE HTML>
<html>
<body>
  <div class="top_1">
    <div class="top_2">
      <div class="text-post">
        <form action="/post" method="POST">
        <img src="http://127.0.0.1:8000/images/icon1.png" class="top_icon"></a>

        <!-- @csrf:フォームの脆弱性対策コードなので、フォーム使用時に必要（ないとエラー出る） -->
        @csrf

        <input type="text" name="post" class="top_form" placeholder="投稿内容を入力ください。">
        {!! Form::open(['url' => 'post/create']) !!}



        <!-- 画像に機能を追加する -->
        <div class="submit">
          <img  src="http://127.0.0.1:8000/images/post.png" class="submit_btn">
          {!! Form::close() !!}
        </div>
        </form>
      </div>
    </div>

  <!-- 下線表示 -->
    <div id="under-bar"></div>
  </div>

    <!-- ここまで新規投稿エリア -->

<!-- 投稿一覧エリア -->
    <!-- 一覧表示 postからとってきた情報の何を表示するか指定-->
    @foreach ($posts as $post)
      <div class="user_info">
        <div class="index_1">
          <img src="http://127.0.0.1:8000/images/{{$post->user->images}}" alt="User Image">
        </div>
        <div class="index_2">
          <p class="username">{{ $post->user->username }}</p>
          <p class="post_content">{{ $post->post }}</p>
        </div>
        <div class="index_3">
          <p class="updated_at">{{ $post->updated_at }}</p>
        </div>
      </div>


<!-- ログインユーザーの記載・削除アイコンの表示指定 -->
    <div class="index_button">
        @if ($post->user_id == Auth::id())
        <!-- 編集ボタン -->
        <button class="modal-open js-modal-open custom-button" post="{{ $post->post }}" post_id="{{ $post->id }}">
        <img src="http://127.0.0.1:8000/images/edit.png">
        </button>
        <!-- ここまで編集ボタン -->

<!-- 削除ボタンにカーソルをあわせると背景が赤くなる -->
        <a class="btn btn-danger delete-button" href="/post/{{$post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="http://127.0.0.1:8000/images/trash.png"></a>
    </div>
<!-- ここまで削除ボタン -->
        @endif

        <hr>
        @endforeach
        <!-- ここまで投稿一覧エリア -->

<!-- モーダルエリア -->
      <div class="modal js-modal">
        <div class="modal-container">
          <!-- モーダルを閉じるボタン -->
          <div class="modal-close js-modal-close">
            <img src="http://127.0.0.1:8000/images/edit.png" >
          </div>
            <!-- モーダル内部のコンテンツ -->
          <div class="modal-content">
            <form action="/update" method="POST">
            @csrf
            <!-- @csrf:フォームの脆弱性対策コードなので、フォーム使用時に必要（ないとエラー出る） -->
            <div class="text-post">
              <input type="text" maxlength="150" name="post" value="" class="modal_post">
              <input type="hidden" name="post_id" value="" class="modal_id">
            </div>
            </form>
          </div>
        </div>
      </div>
</body>
</html>

@endsection

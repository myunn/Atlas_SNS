@extends('layouts.login')

@section('content')

<!-- 記述： プロフィール内容-->

<div class="profile">
  <div>
    <h5><a href="/top"><img src="images/{{Auth::user()->images}}"></a></h5>
    {{ Form::label('ユーザー名') }}
    {{ Form::text('username',null,['class' => 'input']) }}
  </div>

  <div>
  {{ Form::label('メールアドレス') }}
  {{ Form::text('mail',null,['class' => 'input']) }}
  </div>

  <div>
  {{ Form::label('パスワード') }}
  {{ Form::text('password',null,['class' => 'input']) }}
  </div>

  <div>
  {{ Form::label('パスワード確認') }}
  {{ Form::text('password_confirmation',null,['class' => 'input']) }}
  </div>

  <div>
  {{ Form::label('自己紹介') }}
  {{ Form::text('text',null,['class' => 'input']) }}
  </div>

  <div>
  {{ Form::label('アイコン画像') }}
  {{ Form::text('picture',null,['class' => 'input','placeholder' => '画像を挿入']) }}
  </div>

  <!-- ボタンに機能を追加する -->
  <div class="updatebtn">
  <button id="update-button"><a href="/top">更新</a></button>
  </div>
</div>

@endsection

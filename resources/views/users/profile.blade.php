@extends('layouts.login')

@section('content')

<!-- 記述： プロフィール内容-->

<div class="profile">
  {!! Form::open(['url' => '/profile']) !!}
  <form action="/update" method="POST">
  @csrf
  <div class="profile_A">
    <a href="/top"><img src="images/{{Auth::user()->images}}"></a>
    {{ Form::label('ユーザー名') }}
    {{ Form::text('username',Auth::user()->username,null,['class' => 'input']) }}
  </div>

  <div>
  {{ Form::label('メールアドレス') }}
  {{ Form::text('mail',Auth::user()->mail,null,['class' => 'input']) }}
  </div>

  <div>
  {{ Form::label('パスワード') }}
  {{ Form::password('password',['class' => 'input']) }}
  </div>

  <div>
  {{ Form::label('パスワード確認') }}
  {{ Form::password('password_confirmation',['class' => 'input']) }}
  </div>

  <div>
  {{ Form::label('自己紹介') }}
  {{ Form::text('bio',Auth::user()->bio,null,['class' => 'input']) }}
  </div>

  <div>
  {{ Form::label('アイコン画像') }}
  {{ Form::file('images',['class' => 'file-input', 'id' =>'images','style'=>'display:none;']) }}
  <label for="images" class="custom-file-input"><div class="frame">ファイルを選択</div></label>
  </div>

  <!-- ボタンに機能を追加する -->
  <div class="updatebtn">
  {{Form::submit('更新',['id' => 'update-button']) }}
    <!-- <button id="update-button">更新</a></button> -->
  </div>
  {{Form::close()}}
</div>

@endsection

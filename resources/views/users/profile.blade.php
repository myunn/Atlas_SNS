@extends('layouts.login')

@section('content')

<!-- 記述： プロフィール内容-->

{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}

{{ Form::label('パスワード確認') }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }}

{{ Form::label('自己紹介') }}
{{ Form::text('text',null,['class' => 'input']) }}

{{ Form::label('アイコン画像') }}
{{ Form::text('picture',null,['class' => 'input']) }}

<!-- 下記ボタンは欲しいがTOPへ遷移したい -->
{{ Form::submit('更新') }}

 <p class="btn"><a href="/top">更新</a></p>


@endsection

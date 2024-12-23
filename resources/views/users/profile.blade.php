@extends('layouts.login')

@section('content')

<!-- 記述： プロフィール内容-->

<div>
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
{{ Form::text('picture',null,['class' => 'input']) }}
</div>

<div class="updatebtn">
<!-- 下記ボタンは欲しいがTOPへ遷移したい -->
{{ Form::submit('更新') }}

 <p class="btn"><a href="/top">更新</a></p>
</div>


@endsection

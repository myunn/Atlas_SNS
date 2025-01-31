@extends('layouts.logout')

@section('content')
<!-- viewファイルにあるフォームファサードで送るデータの記述先の記載。 -->
{!! Form::open(['url' => '/register']) !!}

<div class="wrapper">

<h2>新規ユーザー登録</h2>

{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}
<br>
{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}
<br>
<form>
  <label for="password">パスワード</label>
  <input type="password" id="password" name="password">
</form>
<!-- {{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }} -->
<br>
{{ Form::label('パスワード確認') }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }}
<br>
{{ Form::submit('新規登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

<div class="wrapper">

{!! Form::close() !!}

<!-- 記載：バリデーションエラーチェック -->
@if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
@endif


@endsection

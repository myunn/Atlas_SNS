@extends('layouts.logout')

@section('content')
<!-- viewファイルにあるフォームファサードで送るデータの記述先の記載。 -->
{!! Form::open(['url' => '/register']) !!}

<div class="wrapper">

<h2>新規ユーザー登録</h2>
<form action="profile.blade.php" method="post">
  <!-- <a class="profile">
    <a class=yoko>
      <label>ユーザー名</label>
    </a>
  </a> -->


  {{ Form::label('ユーザー名') }}
  {{ Form::text('username',null,['class' => 'input']) }}

  <br>
  {{ Form::label('メールアドレス') }}
  {{ Form::text('mail',null,['class' => 'input']) }}
  <br>

  <!-- {{ Form::label('パスワード') }}
  {{ Form::text('password',null,['class' => 'input']) }} -->
  <!-- 伏字方法これ？↓ -->
  <form>
    <label for="password">パスワード</label>
    <input type="password" name="password">
  </form>
  <br>

  <!-- {{ Form::label('パスワード確認') }}
  {{ Form::text('password_confirmation',null,['class' => 'input']) }} -->
    <!-- 伏字方法これ？↓ -->
  <form>
    <label for="password_confirmation">パスワード確認</label>
    <input type="password" name="password_confirmation">
  </form>
  <br>
  {{ Form::submit('新規登録') }}
</form>

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

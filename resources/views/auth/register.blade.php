@extends('layouts.logout')

@section('content')
<!-- viewファイルにあるフォームファサードで送るデータの記述先の記載。 -->
{!! Form::open(['url' => '/register']) !!}

<div class="wrapper">

<h2>新規ユーザー登録</h2>
<form action="profile.blade.php" method="post">

  <div class="register">
    {{ Form::label('ユーザー名') }}
    {{ Form::text('username',null,['class' => 'input']) }}
    <br>

    {{ Form::label('メールアドレス') }}
    {{ Form::text('mail',null,['class' => 'input']) }}
    <br>

    {{ Form::label('パスワード') }}
    {{ Form::text('password',null,['class' => 'input']) }}
    <br>

    {{ Form::label('パスワード確認') }}
    {{ Form::text('password_confirmation',null,['class' => 'input']) }}
    <br>
    <div class="new_account">
      {{ Form::submit('新規登録') }}
    </div>
  </div>
</form>

<p><a href="/login" class="back_login">ログイン画面へ戻る</a></p>

  @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
  @endif

</div>
{!! Form::close() !!}
@endsection

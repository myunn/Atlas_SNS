@extends('layouts.logout')

@section('content')
<!-- viewファイルにあるフォームファサードで送るデータの記述先の記載。 -->
{!! Form::open(['url' => '/login']) !!}

<!-- 構成を『div』で3つに分ける -->
<div class="wrapper">

<p class="welcome">AtlasSNSへようこそ</p>

<div>
  <!-- 入力欄ごとにさらに構成を『div』で分ける -->
  <div class="form-input">
    {{ Form::label('メールアドレス') }}
    {{ Form::text('mail',null,['class' => 'input']) }}
  </div>
  <div class="form-input">
    {{ Form::label('パスワード') }}
    {{ Form::password('password',['class' => 'input']) }}
  </div>
</div>
<div class="loginbtn">
  {{ Form::submit('ログイン') }}
  <p class='newuser'><a href="/register">新規ユーザーの方はこちら</a></p>
</div>
{!! Form::close() !!}


</div>
@endsection

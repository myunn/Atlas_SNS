@extends('layouts.logout')

@section('content')
<!-- viewファイルにあるフォームファサードで送るデータの記述先の記載。 -->
{!! Form::open(['url' => '/login']) !!}

<div class="wrapper">

<p class="welcome">AtlasSNSへようこそ</p>

<div>
  <div class="form-input">
    {{ Form::label('メールアドレス') }}
    {{ Form::text('mail',null,['class' => 'input']) }}
  </div>
  <div class="form-input">
    {{ Form::label('パスワード') }}
    {{ Form::password('password',['class' => 'input']) }}
  </div>
</div>
<div>
  {{ Form::submit('ログイン') }}
  <p class='newuser'><a href="/register">新規ユーザーの方はこちら</a></p>
</div>
{!! Form::close() !!}


</div>
@endsection

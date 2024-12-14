@extends('layouts.logout')

@section('content')
<!-- viewファイルにあるフォームファサードで送るデータの記述先の記載。 -->
{!! Form::open(['url' => '/login']) !!}

<p>AtlasSNSへようこそ</p>

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}
<br>
{{ Form::label('パスワード') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('ログイン') }}

<p class='newuser'><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection

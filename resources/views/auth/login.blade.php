@extends('layouts.logout')

@section('content')
<!-- viewファイルにあるフォームファサードで送るデータの記述先の記載。 -->
{!! Form::open(['url' => '/author/create']) !!}

<p>AtlasSNSへようこそ</p>

{{ Form::label('e-mail') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('ログイン') }}

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection

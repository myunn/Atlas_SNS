@extends('layouts.logout')

@section('content')
<!-- viewファイルにあるフォームファサードで送るデータの記述先の記載。 -->
{!! Form::open(['url' => '/login']) !!}

<div class="wrapper">

<p class='welcome'>AtlasSNSへようこそ</p>

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}
<br>
{{ Form::label('パスワード') }}
{{ Form::password('password',['class' => 'input']) }}
<br>
{{ Form::submit('ログイン') }}
<br>
<p class='newuser'><a href="/register">新規ユーザーの方はこちら</a></p>
<br>
{!! Form::close() !!}

</div>
@endsection

@extends('layouts.login')

@section('content')

<!-- 記述： プロフィール内容-->

<div class="profile">
  {!! Form::open(['url' => '/profile', 'enctype' => 'multipart/form-data']) !!}
  <!-- <form action="/update" method="POST"> -->
  @csrf
  <div class="profile_A">
      @if (!empty(Auth::user()->images))
        <img src="{{ Storage::url(Auth::user()->images) }}" alt="User Image" class="profile_A_image">
        @else
        <img src="{{ asset('images/default-icon.png') }}" alt="Default User Image" class="profile_A_image">
      @endif

    {{ Form::label('ユーザー名') }}
    {{ Form::text('username',Auth::user()->username,null,['class' => 'input']) }}
  </div>

  <div>
    {{ Form::label('メールアドレス') }}
    {{ Form::text('mail',Auth::user()->mail,null,['class' => 'input']) }}
  </div>

  <div>
    {{ Form::label('パスワード') }}
    {{ Form::password('password',['class' => 'input']) }}
  </div>

  <div>
    {{ Form::label('パスワード確認') }}
    {{ Form::password('password_confirmation',['class' => 'input']) }}
  </div>

  <div>
    {{ Form::label('自己紹介') }}
    {{ Form::text('bio',Auth::user()->bio,null,['class' => 'input']) }}
  </div>

  <div>
    {{ Form::label('アイコン画像') }}
    {{ Form::file('images',['class' => 'file-input', 'id' =>'images','style'=>'display:none;']) }}
    <label for="images" class="custom-file-input"><div class="frame">ファイルを選択</div></label>
  </div>

  <!-- ボタンに機能を追加する -->
  <div class="updatebtn">
    {{Form::submit('更新',['id' => 'update-button']) }}
  </div>
  {{Form::close()}}

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

@endsection

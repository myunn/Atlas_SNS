@extends('layouts.logout')

@section('content')

<div id="clear">
  <!--　元の記述：<p>〇〇さん</p> -->
  <!-- @ifで表示される設定に変えられる？ -->
  @if
  <p>{{ session('username') }}さん</p>
  @endif
  <p>ようこそ！AtlasSNSへ！</p>
  <p>ユーザー登録が完了しました。</p>
  <p>早速ログインをしてみましょう。</p>

  <p class="btn"><a href="/login">ログイン画面へ</a></p>
</div>

<!-- 記述：値を受け取る -->
public function authorcreate(Request $request)
{ $name = $request->input('username');
Author::create(['name' => $name]);
return back();
}
return view("auth.login");

@endsection

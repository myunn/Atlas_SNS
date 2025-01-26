@extends('layouts.login')

@section('content')
フォローリスト

<p>{{ $posts->count() }}</p>


<!-- 記述）必要情報を引っ張って反映させたい -->
  @foreach ($posts as $post)
  <div>
      <img src="http://127.0.0.1:8000/images/{{$post->user->images}}">
      <p>{{ $post->user->username }}</p>
      <p>{{ $post->updated_at }}</p>
      <p>{{ $post->post }}</p>
</div>
 @endforeach

@endsection

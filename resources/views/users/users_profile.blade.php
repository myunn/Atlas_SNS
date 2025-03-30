@extends('layouts.login')

@section('content')
<div class="user_profile_all">
  <div class="users_profile_1">
  <!-- 相手ユーザーのアイコン・ユーザーネーム・自己紹介文・フォロー・アンフォロー機能 -->
    <img src="http://127.0.0.1:8000/images/{{$user->images}}" alt="User Image">
  </div>
  <div class="users_profile_2">
    <a>ユーザー名</a>
    <p class="username">{{ $user->username }}</p>
  </div>
  <div class="users_profile_3">
    <a>自己紹介</a>
    <p class="self_introduction">{{$user->bio }}</p>
  </div>

  <!-- フォロー・フォロー解除ボタン -->
  <div class="d-flex justify-content-end flex-grow-1">
  @if (auth()->user()->isFollowing($user->id))
    <form action="{{ route('unfollow', $user) }}" class="users_profile_btn" method="POST">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}

      <button type="submit" class="btn btn-danger-profile">フォロー解除</button>
    </form>
  @else
    <form action="{{ route('follow', $user) }}" method="POST">
      {{ csrf_field() }}

      <button type="submit" class="btn btn-primary">フォローする</button>
    </form>
  @endif
  </div>
</div>

<div id="under-bar"></div>

<!-- 投稿内容 -->
<!-- 相手ユーザーの投稿をアイコン・ユーザーネーム・日付・postを最新順で表示させたい -->
  @foreach ($posts as $post)
  <div class="user_info">
    <div class="user_image">
      <img src="http://127.0.0.1:8000/images/{{$post->user->images}}" alt="User Image">
    </div>
    <div class="user_details">
      <p class="username">{{ $post->user->username }}</p>
      <p class="updated_at">{{ $post->updated_at }}</p>
      <p class="post_content">{{ $post->post }}</p>
    </div>
  </div>
  <hr>
  @endforeach



@endsection

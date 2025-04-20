@extends('layouts.login')

@section('content')
<!-- アイコン一覧の表示 -->
<div class=A>
  <p class="follower-list-title">フォロワーリスト</p>
  @foreach ($following_users as $following_user)
    <div class=all_follow-users_icon>
     <a href="/users_profile/{{$following_user->id}}">
          @if ($following_user->images!=="icon1.png")
            <img src="{{ Storage::url($following_user->images) }}" alt="User Image">
          @else
            <img src="{{ asset('/images/icon1.png') }}" alt="Default User Image">
         @endif
      </a>
    </div>
  @endforeach
</div>

<div id="under-bar"></div>

<!-- 投稿一覧 -->
<div>
  @foreach ($following_posts as $following_post)
  <div class="follow-users-all">
    <div class="follow-users-info">
      <div class="followerlist_1">
        @if ($following_post->user->images!=="icon1.png")
          <img src="{{ Storage::url($following_post->user->images) }}" alt="User Image">
          @else
          <img src="{{ asset('/images/icon1.png') }}" alt="Default User Image">
        @endif
      </div>
      <div class="followerlist_2">
        <p class="username">{{ $following_post->user->username }}</p>
        <p class="post">{{ $following_post->post }}</p>
      </div>
      <div class="followerlist_3">
        <p class="date">{{ $following_post->updated_at }}</p>
      </div>
    </div>
  </div>
    <!-- 下線追加 -->
  <hr>
  @endforeach
</div>
@endsection

@extends('layouts.login')

@section('content')
<!-- 検索用の入力箇所・ボタン設定 -->
<div class="search_area">
  <form action="/search" >
  @csrf
    <div class=becide>
      <input type="text" name="keyword" class="form" placeholder="ユーザー名">
      <input type="image" name="submit" imag class="search_image" src="/images/search.png">

      <!-- 検索したワードの表示 -->
      @if (!empty($keyword))
      <h1 class="search_word">
      <a href="UsersController.php">検索ワード：{{$keyword}}</a>
      </h1>
      @endif
    </div>
  </form>

  <div id="under-bar"></div>
</div>

  <!-- ユーザー一覧表示 -->
  @foreach($users as $user)
  <div class="user_list">
      <div class="user_info">
        <img src="/images/{{$user->images}}">
        <p>{{ $user->username }}</p>
      </div>


    <!-- フォロー・フォロー解除ボタン -->
    <div class="d-flex justify-content-end flex-grow-1">
      @if (auth()->user()->isFollowing($user->id))
        <form action="{{ route('unfollow', $user) }}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}

          <button type="submit" class="btn btn-danger">フォロー解除</button>
        </form>
      @else
          <form action="{{ route('follow', $user) }}" method="POST">
            {{ csrf_field() }}

            <button type="submit" class="btn btn-primary">フォローする</button>
          </form>
      @endif
    </div>
  </div>
  @endforeach

@endsection

@extends('layouts.login')

@section('content')
フォローリスト

<!-- 記述）必要情報を引っ張って反映させたい -->
<h2>フォロー数：<%= @user.followings.count %></h2>
    <% @user.followings.each do |u| %>
      <p><a href="/users/<%= u.id %>"><%= u.name %>さん</a></p>
    <% end %>
<h2>フォロワー数：<%= @user.followers.count %></h2>
    <% @user.followers.each do |u| %>
      <p><a href="/users/<%= u.id %>"><%= u.name %>さん</a></p>
    <% end %>

@endsection

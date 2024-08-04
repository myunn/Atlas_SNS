<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//ログアウト中のページ
// ログイン用画面
// アクセス制限の為、ログインしてない場合は『ログインページ』に戻るようにRoute処理『login』と名前を付けた
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

// 新規ユーザー登録画面
Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');
// ユーザー情報追加画面
Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

// 記述：ログインした人だけがアクセス可能なページ
Route::group(['middleware' => 'auth'], function () {
  // 記述：この中にアクセス制限をかけたいルーティングのコードを記載する。
  // 今回アクセス制限かけたいのは右記：トップページ、プロフィール編集ページ、ユーザー検索ページ、フォローリストページ、フォロワーリストページ、相手ユーザーのプロフィールページ
  //ログイン中のページ
// ログイントップ画面(topページ遷移の為にRouteに『top』と名前を付けた)
Route::get('/top','PostsController@index')->name('top');
// ユーザー情報画面
Route::get('/profile','UsersController@profile');
// 検索
Route::get('/search','UsersController@search');
// フォローリスト
Route::get('/follow-list','FollowsController@followList');
// フォロワーリスト
Route::get('/follower-list','FollowsController@followerList');
});

// 記載：ログアウト機能
Route::get('/logout','Auth\LoginController@logout')->name('logout');

// フォーム作成
Route::get('/index','PostsController@index');
Route::post('/index','PostsController@index');

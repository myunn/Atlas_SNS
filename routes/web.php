<?php

use App\Http\Controllers\Controller;
use Illuminate\support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FollowsController;


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
// 投稿内容の新規作成
Route::post('/post','PostsController@create');
// 投稿内容の更新
Route::post('/update','PostsController@update');
// 投稿内容の削除
Route::get('/post/{id}/delete','PostsController@delete');

// ユーザー情報画面
Route::get('/profile','UsersController@profile');
// ユーザー情報の更新
Route::post('/user/update','UsersController@update')->name('user.update');
// ユーザー情報の画像登録
// Route::post('/profile/update','UsersController@storage');


// 相手のプロフィール画面
Route::get('/users_profile/{id}','UsersController@users_profile')->name('users_profile');

// 検索
Route::get('/search','UsersController@search');

// フォローリスト
Route::get('/follow-list','FollowsController@followList');
// フォロワーリスト
Route::get('/follower-list','FollowsController@followerList');
// フォロー・フォロー解除
Route::post('users/{user}/follow', 'FollowsController@follow')->name('follow');
Route::delete('users/{user}/unfollow', 'FollowsController@unfollow')->name('unfollow');
});

// 記載：ログアウト機能
Route::get('/logout','Auth\LoginController@logout')->name('logout');

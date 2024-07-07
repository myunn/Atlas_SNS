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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

// 記述：1つのルートに対してミドルウェアを指定する場合?
Route::get('/',function(){
})->middleware('auth');


//ログアウト中のページ
// ログイン用画面
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

// 新規ユーザー登録画面
Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');
// ユーザー情報追加画面
Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
// ログイントップ画面
Route::get('/top','PostsController@index');
// ユーザー情報画面
Route::get('/profile','UsersController@profile');
// 検索
Route::get('/search','UsersController@index');

// フォローリスト
Route::get('/follow-list','PostsController@index');
// フォロワーリスト
Route::get('/follower-list','PostsController@index');

// 記述：新規登録
// これじゃない？　Route::post('/Users/{id}/added','UsersController@users');
// Route::post('/auth/added','UsersController@users');

// 記載：アクセス制限機能
Route::get('/login','Auth\LoginController@login')-> name('login');

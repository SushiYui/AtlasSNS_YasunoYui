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


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/logout', 'Auth\LoginController@logout');
Route::post('/logout', 'Auth\LoginController@logout');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::get('/top','PostsController@index')->middleware('auth');
Route::post('/top','PostsController@index')->middleware('auth');

Route::get('/index','PostsController@tweet')->middleware('auth');
Route::post('/index','PostsController@tweet')->middleware('auth');

// フォロー数とフォロワー数の表示
// Route::get('/top','FollowsController@show')->middleware('auth');

// 編集画面を表示
Route::get('/post/{id}/edit','PostsController@edit')->name('post.edit')->middleware('auth');
Route::resource('post', 'PostController');
Route::put('/post/{id}/edit','PostsController@update')->name('post.update')->middleware('auth');

// 投稿削除
Route::get('/post/{post}/delete','PostsController@delete')->name('post.delete')->middleware('auth');

// // bladeからbladeのページ遷移もルーティングが必要
// Route::view('/follows/followList', '/follows/followList')->middleware('auth');
Route::get('/follows/followList','FollowsController@show')->middleware('auth');
Route::get('/follows/followerList','FollowsController@friend')->middleware('auth');

// profileの更新
Route::get('/users/profile','UsersController@profile')->middleware('auth')->name('users.profile');
Route::post('/users/profile','UsersController@update')->middleware('auth');

Route::view('/followedList', 'followedList')->middleware('auth');

// 相手のprofileを表示
Route::get('/users/{id}/friendProfile', 'UsersController@show')->middleware('auth');
// 相手のprofileで投稿を一覧で表示
Route::get('/users/{id}/friendProfile', 'FollowsController@tweetList')->middleware('auth');


// 検索フォームを表示
Route::get('/users/search','UsersController@search')->middleware('auth');

Route::get('/follow-list','PostsController@index')->middleware('auth');
Route::get('/follower-list','PostsController@index')->middleware('auth');


// フォロー機能
// ログイン中のユーザーと特定のユーザーの関係性を調べる
Route::get('/users/search/{id}','UsersController@get_user')->middleware('auth');
// フォローの状態を確認
Route::get('/users/search/status/{id}', 'FollowsController@check_following')->middleware('auth');
// フォローする
Route::post('/users/follow', 'FollowsController@following')->middleware('auth');
// フォロー解除
Route::post('/users/unfollow', 'FollowsController@unFollowing')->middleware('auth');

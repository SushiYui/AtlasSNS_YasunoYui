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

// フォロー数とフォロワー数の表示
// Route::get('/top','FollowsController@followList')->middleware('auth');
// Route::get('/top','FollowsController@followerList')->middleware('auth');

// bladeからbladeのページ遷移もルーティングが必要
Route::view('/followList', 'followList')->middleware('auth');
Route::get('/profile','UsersController@profile')->middleware('auth');

Route::view('/followedList', 'followedList')->middleware('auth');

Route::view('/users/search', 'users.search');
Route::get('/search','UsersController@index')->middleware('auth');

Route::get('/follow-list','PostsController@index')->middleware('auth');
Route::get('/follower-list','PostsController@index')->middleware('auth');;

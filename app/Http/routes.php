<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'FirstController@index');
Route::get('/posts', ['middleware' => 'auth' , 'uses' => 'PostsController@index']);
Route::get('/posts/create',['middleware' => 'auth' ,  'uses' => 'PostsController@create']);
Route::get('/posts/{id}',['middleware' => 'auth' ,  'uses' => 'PostsController@show']);
Route::get('/posts/{id}/edit',['middleware' => 'auth' ,  'uses' => 'PostsController@edit']);
Route::post('/posts','PostsController@store');
Route::patch('/posts/{id}','PostsController@update');
Route::delete('/posts/{id}','PostsController@destroy');

Route::post('/posts/{post}/comments','CommentsController@store');//{post}はpostsの{id}という意味だがわかりやすさのためにこうしている
Route::delete('/posts/{post}/comments/{comment}','CommentsController@destroy');//{comment}はcommentsの{id}という意味だがわかりやすさのためにこうしている

/* ログイン画面の表示 */
Route::get('auth/login', 'Auth\AuthController@getLogin');
/* ログイン処理 */
Route::post('auth/login', 'Auth\AuthController@postLogin');
/* ログアウト */
Route::get('auth/logout', 'Auth\AuthController@getLogout');
/* ユーザー登録画面の表示 */
Route::get('auth/register', 'Auth\AuthController@getRegister');
/* ユーザー登録処理 */
Route::post('auth/register', 'Auth\AuthController@postRegister');
/* 管理画面 */
Route::get('/home', ['middleware' => 'auth', 'uses' => 'DashboardController@index']);

//パスワード再設定
Route::controller('password', 'Auth\PasswordController');
Route::get('/complete', 'CompleteController@index');


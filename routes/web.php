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

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', function () {
    return 'hello,welcome to shabi';
});
Route::get('user/{id}', 'UserController@show');
Auth::routes();
Route::get('now', function () {
    return date("Y-m-d H:i:s");
});
Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'HomeController@index');
    Route::resource('articles', 'ArticleController');
});
Route::get('article/{id}', 'ArticleController@show');

Route::post('comment', 'CommentController@store');

Route::get('logout', function(){
    Auth::logout();
    return redirect('/');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index');
    Route::resource('issues', 'IssueController');
    Route::resource('articles', 'ArticleController');
});

Route::get('articles-lists', ['as'=>'articles-lists','uses'=>'ArticleController@search']);

Route::get('issues-deadline', ['as'=>'issues-deadline','uses'=>'IssueController@month']);

Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');

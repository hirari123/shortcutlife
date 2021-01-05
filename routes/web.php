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

// 認証関連のルーティング
Auth::routes();

// "/"のルーティング
Route::get('/', 'ArticleController@index')->name('articles.index');

// 記事投稿画面のルーティング
Route::resource('/articles', 'ArticleController')->except(['index'])->middleware('auth');

// 「いいね」機能のルーティング
Route::prefix('articles')->name('articles.')->group(function() {
  Route::put('/{article}/like', 'ArticleController@like')->name('like')->middleware('auth');
  Route::delete('/{article}/like', 'ArticleController@unlike')->name('unlike')->middleware('auth');
});
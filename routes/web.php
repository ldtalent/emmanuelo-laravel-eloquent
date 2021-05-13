<?php

use Illuminate\Support\Facades\Route;

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

Route::get('fake-posts','PostController@fakePosts')->name('fake-posts');
Route::get('query-posts','PostController@queryPosts')->name('query-posts');
Route::get('delete-posts','PostController@deletePosts')->name('delete-posts');
Route::get('update-posts','PostController@updatePosts')->name('update-posts');

Route::get('view-profile','ProfileController@index')->name('view-profile');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

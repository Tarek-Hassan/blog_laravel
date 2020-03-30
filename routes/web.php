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
Auth::routes();
Route::prefix('/posts')->middleware(['auth',])->group(function(){
Route::get('', 'PostController@index')->name('Posts.index');
Route::get('/create', 'PostController@create')->name("posts.create");
Route::post('', 'PostController@store')->name("posts.store");
Route::get('/{post}', 'PostController@show')->name("posts.show");
Route::get('/{post}/edit', 'PostController@edit')->name("posts.edit");
Route::put('/{post}', 'PostController@update')->name("posts.update");
Route::delete('/{post}', 'PostController@destroy')->name("posts.destroy");
// toStoreComments
Route::post('/{post}/comments', 'CommentController@store')->name("posts.comments.store");
});
Route::get('/home', 'HomeController@index')->name('home');

// github
Route::get('login/{provider}', 'SocialController@redirectToProvider');
Route::get('login/{provider}/callback', 'SocialController@handleProviderCallback');

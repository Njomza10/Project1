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

Route::get('/', 'PagesController@index')->name('pages.index');
Route::get('/about', 'PagesController@about')->name('pages.about');
Route::get('/services', 'PagesController@services')->name('pages.services');
Route::get('/blog', 'PagesController@blog')->name('pages.blog');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('posts', 'PostsController');
Route::get('/blog', 'BlogController@index')->name('blog.index');
Route::get('/blog/{id}','BlogController@show')->name('blog.show');
Route::get('/search','SearchController@index')->name('search.index');
Route::get('/search/post','SearchController@search')->name('search.search');
Route::post('/posts/{post}/comments', 'CommentController@store')->name('comment.store');
Route::get('/like/{comment}/comments', 'LikeController@store')->name('like.store');
Route::get('/unlike/{comment}/comments','LikeController@destroy')->name('like.destroy');



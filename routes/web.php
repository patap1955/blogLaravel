<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\PostsController@index')->name('index');
Route::get('/about', 'App\Http\Controllers\PagesController@about')->name('about');
Route::get('/contacts', 'App\Http\Controllers\PagesController@contacts')->name('contacts');
Route::get('/admin/feedbacks', 'App\Http\Controllers\FeedbacksController@index')->name('admin.feedbacks');
Route::post('/feedbacks', 'App\Http\Controllers\FeedbacksController@store')->name('feedbacks.store');

Route::get('/posts/tags/{tag}', 'App\Http\Controllers\TagsController@index')->name('posts.tags');
Route::resource('/posts', 'App\Http\Controllers\PostsController');

Auth::routes();

Route::get('/user/posts', 'App\Http\Controllers\AdminUsersController@index')->name('user_posts.index');

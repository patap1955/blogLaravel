<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\PostsController@index');
Route::get('/about', 'App\Http\Controllers\PagesController@about');
Route::get('/contacts', 'App\Http\Controllers\PagesController@contacts');
Route::get('/admin/feedbacks', 'App\Http\Controllers\FeedbacksController@index');
Route::post('/feedbacks', 'App\Http\Controllers\FeedbacksController@store');
Route::get('/posts/create', 'App\Http\Controllers\PostsController@create');
Route::post('/posts', 'App\Http\Controllers\PostsController@store');
Route::get('/posts/{post:slug}', 'App\Http\Controllers\PostsController@show')->name('post.show');

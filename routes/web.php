<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\PostsController@index')->name('index');
Route::get('/about', 'App\Http\Controllers\PagesController@about')->name('about');
Route::get('/contacts', 'App\Http\Controllers\PagesController@contacts')->name('contacts');
Route::get('/admin/feedbacks', 'App\Http\Controllers\FeedbacksController@index')->name('admin.feedbacks');
Route::post('/feedbacks', 'App\Http\Controllers\FeedbacksController@store')->name('feedbacks.store');

Route::resource('/posts', 'App\Http\Controllers\PostsController');


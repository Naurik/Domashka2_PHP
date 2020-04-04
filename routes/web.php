<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/')->name('home');
Route::redirect('/', '/posts');

//region POSTS Routes
// CRUD routes
Route::resource('posts', 'PostController');

Route::post('/posts/{post}/likes/count', 'LikeController@count')
    ->name('posts.likes.count');
Route::post('/posts/{post}/is_liked', 'LikeController@isLiked')
    ->name('posts.likes.is_liked');
Route::post('/posts/like/{post}', 'LikeController@like')
    ->name('posts.like')
    ->middleware('auth');

Route::name('comments.')
    ->prefix('comments')
    ->middleware('auth')
    ->group(function () {

        Route::post('/', 'CommentController@store')
            ->name('store');
        Route::delete('/{comment}', 'CommentController@destroy')
            ->name('destroy');

    });
//endregion

Route::get('/profile/{user}', 'ProfileController@show')->name('profile.show');

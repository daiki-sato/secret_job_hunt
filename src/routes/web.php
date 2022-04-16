<?php

use Illuminate\Support\Facades\Route;

// 未ログイン
Route::middleware([])->group(function () {
    Route::namespace('Auth')->group(function () {
        // 登録
        Route::prefix('register')->group(function () {
            Route::get('/top',  'RegisterController@index')->name('register.top');
            Route::get('/',  'RegisterController@showRegistrationForm')->name('register');
            Route::post('/', 'RegisterController@register')->name('register.post');
        });

        // ログイン
        Route::prefix('login')->group(function() {
            Route::get('/',  'LoginController@showLoginForm')->name('login');
            Route::post('/', 'LoginController@login')->name('login.post');
        });

        // ログアウト
        Route::get('/logout', 'LoginController@logout')->name('logout');
    });
    
    // top
    Route::get('/',         'TopController@index')->name('home');
});

// ログイン済
Route::middleware(['auth'])->group(function () {
    // 一般ユーザー
    Route::middleware(['role:user'])->group(function () {
        // 検索
        Route::prefix('search')->group(function () {
            Route::get('/',       'SearchController@index')->name('search');
        });

        // 予約一覧
        Route::prefix('reservation-list')->group(function () {
            Route::get('/', 	    'ReservationListController@index')->name('reservation-list');
        });
        
        Route::prefix('message')->group(function () {
            Route::get('/', 	    'MessageController@index')->name('message');
            Route::post('/', 	    'MessageController@store')->name('message.store');
        });
        
        Route::prefix('my-page')->group(function () {
            Route::get('/', 	    'MyPageController@index')->name('my-page');
        });
    });
});
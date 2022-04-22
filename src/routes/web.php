<?php

use Illuminate\Support\Facades\Route;

// 未ログイン
Route::middleware([])->group(function () {
    Route::namespace ('Auth')->group(function () {
        // 登録
        Route::prefix('register')->group(function () {
            Route::get('/', 'RegisterController@index')->name('register');
            Route::get('/email', 'RegisterController@showRegistrationForm')->name('register.email');
            Route::post('/', 'RegisterController@register')->name('register.post');
            Route::get('/main_register/{token}', 'RegisterController@showForm');
            Route::post('/main_register', 'RegisterController@mainRegister')->name('register.main.registered');
        });

        // パスワードリセット
        Route::get('password/update', 'ForgotPasswordController@showLinkRequestForm')->name('password.update');
        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/update', 'ResetPasswordController@reset');
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/reset', 'ResetPasswordController@reset');

        // ログイン
        Route::prefix('login')->group(function () {
            Route::get('/', 'LoginController@showLoginForm')->name('login');
            Route::post('/', 'LoginController@login')->name('login.post');
        });

        // ログアウト
        Route::get('/logout', 'LoginController@logout')->name('logout');
    });

    // top
    Route::get('/', 'TopController@index')->name('home');
});

// ログイン済
Route::middleware(['auth'])->group(function () {
    // 一般ユーザー
    Route::middleware(['role:user'])->group(function () {
        // 検索
        Route::prefix('search')->group(function () {
            Route::get('/', 'SearchController@index')->name('search');
        });

        // 予約一覧
        Route::prefix('reservation-list')->group(function () {
            Route::get('/', 'ReservationListController@index')->name('reservation-list');
        });

        // メッセージ
        Route::prefix('message')->group(function () {
            Route::get('/', 'MessageController@index')->name('message');
            Route::get('/get', 'Ajax\MessageController@index'); // メッセージ一覧を取得
            Route::post('/post', 'Ajax\MessageController@create'); // チャット登録
        });

        Route::prefix('my-page')->group(function () {
            Route::get('/', 'MyPageController@index')->name('my-page');
        });

        //通話機能
        Route::prefix('call')->group(function () {
            Route::get('/', 'CallController@index')->name('call');
        });

        // ビデオチャット
        Route::get('video_chat', 'VideoChatController@index'); // チャットページ
        Route::post('auth/video_chat', 'VideoChatController@auth'); // 認証ページ

    });
});
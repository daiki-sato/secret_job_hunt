<?php

use Illuminate\Support\Facades\Route;

// 未ログイン
Route::middleware([])->group(function () {
    Route::namespace('Auth')->group(function () {
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
            Route::get('/', 'LoginController@index')->name('login.top');
            Route::get('/email', 'LoginController@showLoginForm')->name('login.email');
            Route::post('/email', 'LoginController@login')->name('login.post');
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
            Route::get('/getUser/{companyKeyword?}/{departmentKeyword?}', 'Ajax\GetUsersController@index')->name('search.getUser');
        });

        // 予約一覧
        Route::prefix('reservation-list')->group(function () {
            Route::get('/', 'ReservationListController@index')->name('reservation-list');
        });

        // スレッド
        Route::prefix('thread')->group(function () {
            Route::get('/', 'ThreadController@index')->name('thread');
            Route::get('/get/{userId}/{roleId}', 'Ajax\GetThreadController@index');
            Route::get('/getNickname/{userId}', 'Ajax\GetThreadController@getNickname');
        });

        // メッセージ
        Route::prefix('message')->group(function () {
            Route::get('/get/{threadId}', 'Ajax\MessageController@get')->name('message.get');
            Route::post('/post', 'Ajax\MessageController@create'); // チャット登録
            Route::post('/delete/{messageId}', 'Ajax\MessageController@delete');
        });

        //マイページ
        Route::prefix('my-page')->group(function () {
            Route::get('/', 'MyPageController@index')->name('my-page');
            Route::get('/edit/{id}', 'MyPageController@edit')->name('user_edit');
            Route::post('/update/{id}', 'MyPageController@update')->name('user_update');
            Route::get('/evaluation', 'MyPageController@show')->name('evaluation-comment');
            Route::post('/add', 'MyPageController@tomoney')->name('tomoney');
        });

        //通話後評価画面
        Route::prefix('evaluation')->group(function () {
            Route::get('/', 'EvaluationController@index')->name('evaluation');
            Route::post('/add', 'EvaluationController@add')->name('evaluation_add');
        });

        //支払い(paypay)
        Route::prefix('paypay')->group(function () {
            //ルーティングで支払いができないように適当な文字列を追加
            Route::get('/afjgn', 'PaymentController@paypay')->name('paypay');
            Route::get('/thanks', 'PaymentController@paypay_thanks')->name('paypay_thanks');
        });

        //お問合せ
        Route::prefix('contact')->group(function () {
            Route::get('/', 'ContactController@index')->name('contact');
            Route::post('/add', 'ContactController@add')->name('contact_add');
        });

        //絞り込み後仮画面
        Route::prefix('review')->group(function () {
            Route::get('/', 'ReviewController@index')->name('review');
            //評価表示画面
            Route::get('/show/{solver_id}', 'ReviewController@show')->name('review-show');
        });

        //承諾画面（仮）
        Route::prefix('consent')->group(function () {
            Route::get('/', 'ConsentController@index')->name('consent');
            Route::post('/add', 'ConsentController@add')->name('consent_add');
        });
    });

    // 管理者
    Route::middleware(['role:admin'])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/', 'AdminController@index')->name('admin');
        });
    });
});

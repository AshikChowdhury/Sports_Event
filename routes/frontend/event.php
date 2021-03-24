<?php

Route::group(['middleware' => ['auth', 'password_expires']], function () {

    Route::get('/event/{event}', 'HomeController@show')->name('event_detail');

    Route::get('/event/{event}/team/{team}', 'HomeController@show_team')->name('team_detail');

    Route::resource('/event/{event}/posts', 'PostController');

    Route::resource('/event/{event}/comments', 'CommentController');

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/pending', 'PendingController@index')->name('pending');

        Route::patch('/pending/post/{id}', 'PendingController@post_status')->name('pending.post_status');

        Route::patch('/pending/comment/{id}', 'PendingController@comment_status')->name('pending.comment_status');
    });

});
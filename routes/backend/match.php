<?php

Route::group([
    'prefix'     => 'setup',
    'as'         => 'setup.',
    'namespace'  => 'Setup',
], function () {
    Route::group([
    ], function () {
        Route::group(['namespace' => 'Match'], function () {

            Route::get('matches/deactivated', 'MatchStatusController@getDeactivated')->name('matches.deactivated');
            Route::get('matches/deleted', 'MatchStatusController@getDeleted')->name('matches.deleted');

            /*
             * Route CRUD
             */
            Route::resource('matches', 'MatchController');

            /*
             * Specific Route
             */
            Route::group(['prefix' => 'matches/{match}'], function () {

                // Status
                Route::get('mark/{status}', 'MatchStatusController@mark')->name('matches.mark')->where(['status' => '[0,1]']);
            });

            /*
             * Deleted Route
             */
            Route::group(['prefix' => 'matches/{deletedMatch}'], function () {
                Route::get('delete', 'MatchStatusController@delete')->name('matches.delete-permanently');
                Route::get('restore', 'MatchStatusController@restore')->name('matches.restore');
            });
        });
    });
});
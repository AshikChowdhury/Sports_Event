<?php

Route::group([
    'prefix'     => 'setup',
    'as'         => 'setup.',
    'namespace'  => 'Setup',
], function () {
    Route::group([
    ], function () {
        Route::group(['namespace' => 'TransEvent'], function () {

            Route::get('events/deactivated', 'TransEventsStatusController@getDeactivated')->name('events.deactivated');
//            Route::get('events/deleted', 'BranchStatusController@getDeleted')->name('branches.deleted');

            /*
             * Route CRUD
             */
            Route::resource('events', 'TransEventsController');

            /*
             * Specific Route
             */
            Route::group(['prefix' => 'events/{event}'], function () {
                Route::get('schedule', 'TransEventsController@schedule')->name('events.schedule.create');

                Route::post('schedule', 'TransEventsController@store_schedule')->name('events.schedule.store');

                Route::get('team_sponsor', 'TransEventsController@team_sponsor')->name('events.team_sponsor.create');

                Route::post('team_sponsor', 'TransEventsController@store_team_sponsor')->name('events.team_sponsor.store');

                // Status
                Route::get('mark/{status}', 'TransEventsStatusController@mark')->name('events.mark')->where(['status' => '[0,1]']);
            });

            /*
             * Deleted Route
             */
//            Route::group(['prefix' => 'branches/{deletedBranch}'], function () {
//                Route::get('delete', 'BranchStatusController@delete')->name('branches.delete-permanently');
//                Route::get('restore', 'BranchStatusController@restore')->name('branches.restore');
//            });

        });
    });
});
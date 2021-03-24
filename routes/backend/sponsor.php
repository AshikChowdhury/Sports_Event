<?php

Route::group([
    'prefix'     => 'setup',
    'as'         => 'setup.',
    'namespace'  => 'Setup',
], function () {
    Route::group([
    ], function () {
        Route::group(['namespace' => 'Sponsor'], function () {

            Route::get('sponsors/deactivated', 'SponsorStatusController@getDeactivated')->name('sponsors.deactivated');
//            Route::get('events/deleted', 'BranchStatusController@getDeleted')->name('branches.deleted');

            /*
             * Route CRUD
             */
            Route::resource('sponsors', 'SponsorController');

            /*
             * Specific Route
             */
            Route::group(['prefix' => 'sponsors/{sponsor}'], function () {

                // Status
                Route::get('mark/{status}', 'SponsorStatusController@mark')->name('sponsors.mark')->where(['status' => '[0,1]']);
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
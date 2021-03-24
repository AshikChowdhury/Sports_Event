<?php

Route::group([
    'prefix'     => 'setup',
    'as'         => 'setup.',
    'namespace'  => 'Setup',
], function () {
    Route::group([
    ], function () {
        Route::group(['namespace' => 'Team'], function () {

            Route::get('teams/deactivated', 'TeamStatusController@getDeactivated')->name('teams.deactivated');
//            Route::get('events/deleted', 'BranchStatusController@getDeleted')->name('branches.deleted');

            /*
             * Route CRUD
             */
            Route::resource('teams', 'TeamController');

            Route::resource('teams/{team}/members', 'MemberController');


            /*
             * Specific Route
             */
            Route::group(['prefix' => 'teams/{team}'], function () {

                // Status
                Route::get('mark/{status}', 'TeamStatusController@mark')->name('teams.mark')->where(['status' => '[0,1]']);
            });

            /*
             * Deleted Route
             */
//            Route::group(['prefix' => 'branches/{deletedBranch}'], function () {
//                Route::get('delete', 'BranchStatusController@delete')->name('branches.delete-permanently');
//                Route::get('restore', 'BranchStatusController@restore')->name('branches.restore');
//            });
        });

        Route::group(['namespace' => 'Member'], function () {

//            Route::get('teams/{team}/members/deactivated', 'TeamStatusController@getDeactivated')->name('teams.deactivated');
//            Route::get('events/deleted', 'BranchStatusController@getDeleted')->name('branches.deleted');

            /*
             * Route CRUD
             */

            Route::resource('teams/{team}/members', 'MemberController');


            /*
             * Specific Route
             */
//            Route::group(['prefix' => 'teams/{team}'], function () {
//
//                // Status
//                Route::get('mark/{status}', 'TeamStatusController@mark')->name('teams.mark')->where(['status' => '[0,1]']);
//            });

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
<?php

Route::group([
    'prefix'     => 'setup',
    'as'         => 'setup.',
    'namespace'  => 'Setup',
], function () {
    Route::group([
    ], function () {
        Route::group(['namespace' => 'Employee'], function () {

//            Route::get('events/deactivated', 'EmployeeStatusController@getDeactivated')->name('events.deactivated');
//            Route::get('events/deleted', 'BranchStatusController@getDeleted')->name('branches.deleted');

            /*
             * Route CRUD
             */
            Route::resource('employees', 'EmployeeController');

            /*
             * Specific Route
             */
            Route::group(['prefix' => 'employees/{employee}'], function () {

                // Status
                //Route::get('mark/{status}', 'EmployeeStatusController@mark')->name('employees.mark')->where(['status' => '[0,1]']);
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
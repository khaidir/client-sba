<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group([
    'namespace' => 'App\Http\Controllers\landing',
], function ($router) {
    Route::group([
    ], function ($router) {
        Route::get('/', 'LandingController@index');
        // Route::get('hubungi', 'LandingController@hubungi');
    });
});

Route::group([
    'namespace' => 'App\Http\Controllers\admin',
], function ($router) {
    $router->get('auth', function() {
        if(auth()->user())
            return redirect('/');

        return view('auth.login-2', ['page_name' => 'auth']);
    })->name('login');
    Route::post('auth/process', 'LoginController@process');
    Route::get('logout', 'LoginController@logout');
});

Route::group([
    'middleware' => ['auth'],
    'namespace' => 'App\Http\Controllers\admin',
], function ($router) {

    Route::group([
        'prefix' => 'profil',
    ], function ($router) {
        Route::get('/', 'ProfilController@index');
        Route::post('store', 'ProfilController@save');
    });

    Route::group([
        'prefix' => 'dashboard',

    ], function ($router) {
        Route::get('/', 'DashboardController@index');
        // Route::get('profil', 'ProfilController@index');
        // Route::post('profil', 'ProfilController@store');
    });



    Route::group([
        'prefix' => 'access',
    ], function ($router) {
        $router->get('/', 'AccessRequestController@index')->name('access.index');
        $router->get('new', 'AccessRequestController@create')->name('access.add');
        $router->get('edit/{id}', 'AccessRequestController@edit')->name('access.edit');
        $router->post('store', 'AccessRequestController@store')->name('access.store');
        $router->get('delete/{id}', 'AccessRequestController@destroy')->name('access.delete');

        Route::group([
            'prefix' => 'visitor',
        ], function ($router) {
            $router->get('/{id}', 'AccessVisitorController@index')->name('visitor.index');
            $router->get('/new/{id}', 'AccessVisitorController@create')->name('visitor.add');
            $router->get('/edit/{id}', 'AccessVisitorController@edit')->name('visitor.edit');
            $router->post('store', 'AccessVisitorController@store')->name('visitor.store');
            $router->get('delete/{doc}', 'AccessVisitorController@edit')->name('visitor.delete');
        });

    });

    Route::group([
        'prefix' => 'worker',
    ], function ($router) {
        $router->get('/', 'NewWorkerController@index')->name('worker.index');
        $router->get('new', 'NewWorkerController@create')->name('worker.add');
        $router->post('store', 'NewWorkerController@store')->name('worker.store');
        $router->get('edit/{id}', 'NewWorkerController@edit')->name('worker.edit');
        $router->get('send/{id}', 'NewWorkerController@send')->name('worker.send');
        $router->get('delete/{id}', 'NewWorkerController@destroy')->name('worker.delete');
    });

    Route::group([
        'prefix' => 'extend',
    ], function ($router) {
        $router->get('/', 'AccessExtendedController@index')->name('extend.index');
        $router->get('new', 'AccessExtendedController@create')->name('extend.add');
        $router->post('store', 'AccessExtendedController@store')->name('extend.store');
        $router->get('edit/{id}', 'AccessExtendedController@edit')->name('extend.edit');
        $router->get('delete/{id}', 'AccessExtendedController@destroy')->name('extend.delete');
    });

    Route::group([
        'prefix' => 'vendor',
    ], function ($router) {
        $router->get('/', 'VendorController@index')->name('vendor.index');
        $router->get('new', 'VendorController@create')->name('vendor.add');
        $router->post('store', 'VendorController@store')->name('vendor.store');
        $router->get('edit/{id}', 'VendorController@edit')->name('vendor.edit');
        $router->get('delete/{id}', 'VendorController@destroy')->name('vendor.delete');
    });

    $router->get('statistic', 'StatisticController@index')->name('statistic.index');
    $router->get('report', 'ReportController@index')->name('report.index');

    Route::group([
        'prefix' => 'users',
    ], function ($router) {
        $router->get('/', 'PenggunaController@index')->name('users.index');
        $router->post('/', 'PenggunaController@index')->name('users.index.post');
        $router->get('new', 'PenggunaController@create')->name('users.add');
        $router->get('edit/{id}', 'PenggunaController@edit')->name('users.edit');
        $router->post('store', 'PenggunaController@store')->name('users.store');
        $router->get('delete/{id}', 'PenggunaController@destroy')->name('users.delete');
    });

    Route::resource('roles', RoleController::class);
    Route::resource('permission', PermissionController::class);

});

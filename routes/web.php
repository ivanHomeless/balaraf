<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['namespace' => 'Cards'], function () {
    Route::get('/', 'CardController@index');
});

Auth::routes();


$groupData = [
    'namespace' => 'Admin',
    'prefix'    => 'admin',
];
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');

    Route::group(['namespace' => 'Cards', 'prefix' => 'cards'], function() {
        Route::resource('cards', 'CardController', [
            'names' => 'admin.cards',
            'except' => 'show',
        ]);
    });

    Route::group(['namespace' => 'Site', 'prefix' => 'site'], function() {

        Route::resource('page', 'PageController', [
            'names' => 'admin.site.pages',
            'except' => 'show',
        ]);

        Route::resource('menu-item', 'MenuItemController', [
            'names' => 'admin.site.menu-items',
            'except' => 'show',
        ]);
    });


    Route::group(['namespace' => 'Setting', 'prefix' => 'setting'], function () {
        Route::resource('password', 'PasswordController', [
            'names' => 'admin.setting.password',
            'only' => ['edit', 'update'],
        ]);
    });

});

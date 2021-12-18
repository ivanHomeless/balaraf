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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');


$groupData = [
    'namespace' => 'Admin',
    'prefix'    => 'admin',
];
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');

    Route::group(['namespace' => 'Cards', 'prefix' => 'cards'], function() {
        Route::resource('card', 'CardController', [
            'names' => 'admin.cards.card',
            'except' => 'show',
        ]);

    });

});

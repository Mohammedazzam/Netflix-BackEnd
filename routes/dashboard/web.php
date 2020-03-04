<?php


Route::prefix('dashboard')
    ->name('dashboard.')
    ->middleware(['auth', 'role:super_admin|admin'])
    ->group(function () {

    //dashboard.welcome
    //welcome route
    Route::get('/','WelcomeController@index')->name('welcome');

    //category routes
    Route::resource('categories','CategoryController');
});
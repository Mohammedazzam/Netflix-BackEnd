<?php


Route::prefix('dashboard')
    ->name('dashboard.')
    ->middleware(['auth', 'role:super_admin|admin'])
    ->group(function () {

    //dashboard.welcome
    //welcome route
    Route::get('/','WelcomeController@index')->name('welcome');

    //category routes
    Route::resource('categories','CategoryController')->except(['show']);

    //movie routes
    Route::resource('movies','MovieController')->except(['show']);

    //role routes
    Route::resource('roles','RoleController')->except(['show']);

    //user routes
    Route::resource('users','UserController')->except(['show']);


        Route::get('/setting_social_login','SettingController@social_login')->name('settings.social_login');
        Route::get('/setting_social_links','SettingController@social_links')->name('settings.social_links');
        Route::post('/settings','SettingController@store')->name('settings.store');

    });
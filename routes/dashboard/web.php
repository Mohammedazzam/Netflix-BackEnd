<?php


Route::prefix('dashboard')->name('dashboard.')->group(function (){

    //dashboard.welcome
    //welcome route
    Route::get('/','WelcomeController@index')->name('welcome');
});